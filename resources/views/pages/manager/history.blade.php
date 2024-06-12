@extends('layouts.app')

@section('body')
<section>
    <div class="container my-4">
        <div class="mt-3">
            <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Quantity</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataBarang as $barang)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->quantity }}</td>
                    <td>{{ $barang->alamat }}</td>
                    <td>
                      @if($barang->status == 'Disetujui')
                        <div class="btn btn-success" style="cursor: default;">{{ $barang->status }}</div>
                      @else
                        <div class="btn btn-danger" style="cursor: default;">{{ $barang->status }}</div>
                      @endif
                    </td>
                    <td>
                      {{ $barang->updated_at }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection