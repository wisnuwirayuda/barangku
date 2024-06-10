@extends('layouts.app')

@section('body')
    <section>
        <div class="container my-4">
            <div class="d-flex justify-content-end">
                <a href="{{ route('officer.home') }}" class="btn btn-secondary rounded-2 text-white">Kembali</a>
            </div>
            
            <div class="mt-3">
                <form action="#" method="POST">
                    <div class="mb-3 row">
                        <label for="nama-barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama-barang" name="nama-barang" placeholder="Masukkan Nama Barang" value="{{ old('nama-barang') }}" autocomplete="off" autofocus>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Quantity" value="{{ old('quantity') }}">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary rounded-2 text-white">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection