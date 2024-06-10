@extends('layouts.app')

@section('body')
    <section>
        <div class="container my-4">
            {{-- <div class="d-flex justify-content-end">
                <a href="{{ route('officer.form') }}" class="btn btn-primary rounded-2 text-white">Tambah Pengajuan Barang</a>
            </div> --}}
            
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
                            <a class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah Status</a>
                            <a class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload Bukti Transfer</a>
                        </td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row">
                                <label for="nama-barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" id="nama-barang" name="nama-barang" onchange="toggleTextarea()">
                                        <option selected>Pilih Status</option>
                                        <option value="APPROVE">Approve</option>
                                        <option value="REJECT">Reject</option>
                                    </select>
                                </div>
                            </div>
                            <div id="container-alasan" class="mb-3 row" style="display: none;">
                                <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="alasan" rows="3" name="alasan" placeholder="Masukkan Alasan"></textarea>
                                </div>
                            </div>
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

@section('before-script')
    <script>
        function toggleTextarea() {
            const selectElement = document.getElementById('nama-barang');
            const textareaElement = document.getElementById('container-alasan');

            if (selectElement.value === 'REJECT') {
                textareaElement.style.display = 'flex';
            } 
        }
    </script>
@endsection