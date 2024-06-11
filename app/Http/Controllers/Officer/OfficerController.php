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

    public function delete($id) {
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()->route('officer.home');
    }
}
