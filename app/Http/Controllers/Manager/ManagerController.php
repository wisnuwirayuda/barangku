<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function show() {
        $dataBarang = Barang::whereNull('manager_id')->get();

        return view('pages.manager.home', compact('dataBarang'));
    }

    public function history() {
        $dataBarang = Barang::whereNotNull('manager_id')->get();

        return view('pages.manager.history', compact('dataBarang'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required|string',
            'alasan' => 'nullable|string'
        ]);

        $barang = Barang::findOrFail($id);
        $user = Auth::user();

        $barang->status     = $request->status;
        $barang->manager_id = $user->id;

        if ($request->status == 'Ditolak') {
            $barang->alasan = $request->alasan;
        } else {
            $barang->alasan = null;
        }

        $barang->save();

        return redirect()->back()->with('success', 'Status barang berhasil diubah.');
    }
}
