<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanBarang;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OfficerController extends Controller
{
    public function show() {
        $dataBarang = Barang::all();

        return view('pages.officer.home', compact('dataBarang'));
    }

    public function showForm() {
        return view('pages.officer.form');
    }

    public function create(PengajuanBarang $request) {
        $credentials = $request->validated();
        $user = Auth::user();

        Barang::create([
            'nama_barang' => $credentials['nama-barang'],
            'quantity' => $credentials['quantity'],
            'alamat' => $credentials['alamat'],
            'nama_bank' => $credentials['nama-bank'],
            'nomor_rekening' => $credentials['nomor-rekening'],
            'user_id' => $user->id,
            'slug' => Str::slug($credentials['nama-barang'], '-')
        ]);

        return redirect()->route('officer.home')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id) {
        $dataBarang = Barang::findOrFail($id);
    
        return view('pages.officer.form')->with('dataBarang', $dataBarang);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'nama_barang'       => 'required|string|max:255',
            'quantity'          => 'required|integer',
            'alamat'            => 'required|string',
            'nama_bank'         => 'required|string|max:255',
            'nomor_rekening'    => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($id);

        $barang->nama_barang = $request->nama_barang;
        $barang->quantity = $request->quantity;
        $barang->alamat = $request->alamat;
        $barang->nama_bank = $request->nama_bank;
        $barang->nomor_rekening = $request->nomor_rekening;
    
        $barang->save();
    
        return redirect()->route('officer.home');
    }

    public function delete($id) {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()->route('officer.home');
    }
}
