<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class ManagerController extends Controller
{
    public function show() {
        $dataBarang = Barang::all();

        return view('pages.manager.home', compact('dataBarang'));
    }

    public function history() {
        return view('pages.manager.history');
    }

    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required|string',
            'alasan' => 'nullable|string'
        ]);

        $barang = Barang::findOrFail($id);

        $barang->status = $request->status;

        if ($request->status == 'Ditolak') {
            $barang->alasan = $request->alasan;
        } else {
            $barang->alasan = null;
        }

        $barang->save();

        return redirect()->back()->with('success', 'Status barang berhasil diubah.');
    }
}
