@extends('layouts.app')

@section('body')
    <section>
        <div class="container my-4">
            <div class="mt-3">
                <form 
                    @if (isset($dataBarang))
                        action="{{ route('officer.update', $dataBarang->id) }}" 
                        method="POST"
                    @else
                        action="{{ route('officer.create.form') }}" 
                        method="POST"
                    @endif
                >
                    @csrf
                    @if(isset($dataBarang))
                        @method('PUT')
                    @endif
                    <p class="fs-4 fw-semibold">Form Barang</p>
                    <div class="mb-3 row">
                        <label for="nama-barang" class="col-sm-2 col-form-label">Nama Barang<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama-barang') is-invalid @enderror" id="nama-barang" name="nama-barang" placeholder="Masukkan Nama Barang" value="{{ $dataBarang->nama_barang ?? old('nama-barang') }}" autocomplete="off" autofocus>
                            @error('nama-barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Masukkan Quantity" value="{{ $dataBarang->quantity ?? old('quantity') }}">
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat Pembelian Barang<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat">{{ $dataBarang->alamat ?? old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <p class="fs-4 fw-semibold">Form Rekening</p>
                    <div class="mb-3 row">
                        <label for="nama-bank" class="col-sm-2 col-form-label">Nama Bank<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nama-bank') is-invalid @enderror" id="nama-bank" name="nama-bank" placeholder="Masukkan Nama Bank" value="{{ $dataBarang->nama_bank ?? old('nama-bank') }}">
                            @error('nama-bank')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nomor-rekening" class="col-sm-2 col-form-label">Nomor Rekening<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('nomor-rekening') is-invalid @enderror" id="nomor-rekening" name="nomor-rekening" placeholder="Masukkan Nomor Rekening" value="{{ $dataBarang->nomor_rekening ?? old('nomor-rekening') }}">
                            @error('nomor-rekening')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-1">
                            <a href="{{ route('officer.home') }}" class="btn btn-secondary rounded-2 text-white">Cancel</a>
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-primary rounded-2 text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection