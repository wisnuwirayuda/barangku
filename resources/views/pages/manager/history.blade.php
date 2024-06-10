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
                  <tr>
                    <td>1</td>
                    <td>Komputer</td>
                    <td>5</td>
                    <td>5</td>
                    <td>
                        <div class="btn btn-success" style="cursor: default;">
                            Sudah Disetujui
                        </div>
                    </td>
                    <td>
                        2024-06-15 14:00
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection