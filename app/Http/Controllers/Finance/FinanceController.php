<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function show() {
        $dataBarang = Barang::whereNotNull('manager_id')->get();

        return view('pages.finance.home', compact('dataBarang'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'status'         => 'required|string',
            'bukti_transfer' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf',
            'alasan'         => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($id);
        $user = Auth::user();

        $barang->status     = $request->status;
        $barang->finance_id = $user->id;

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $barang->bukti_transfer = $fileName;
        }

        if ($request->input('status') == 'Ditolak') {
            $barang->alasan = $request->alasan;
        }

        $barang->save();

        return redirect()->back()->with('success', 'Status barang berhasil diubah.');
    }
}
