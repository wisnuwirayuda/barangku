@extends('layouts.app')

@section('body')
    <section>
        <div class="container my-4">
            <div class="d-flex justify-content-end">
                <a href="{{ route('officer.form') }}" class="btn btn-primary rounded-2 text-white">Tambah Pengajuan Barang</a>
            </div>
            
            <div class="mt-3">
                <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Quantity</th>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                        <th>Action</th>
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
                            <a href="{{ route('officer.form') }}" class="btn btn-warning">Edit</a>
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Hapus</a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus Komputer?
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary text-white">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection