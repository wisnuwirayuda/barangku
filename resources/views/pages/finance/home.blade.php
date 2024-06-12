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
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Action</th>
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
                                <a class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $barang->id }}">Ubah Status</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $barang->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Status {{ $barang->nama_barang }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('finance.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3 row">
                                                            <label for="status{{ $barang->id }}" class="col-sm-2 col-form-label">Status</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-select" aria-label="Default select example" id="status{{ $barang->id }}" name="status" onchange="toggleTextarea(this)">
                                                                    <option selected>Pilih Status</option>
                                                                    <option value="Disetujui">Approve</option>
                                                                    <option value="Ditolak">Reject</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div id="container-bukti-transfer{{ $barang->id }}" class="mb-3 row" style="display: none;">
                                                            <label for="bukti_transfer" class="col-sm-2 col-form-label">Bukti Transfer</label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control" type="file" id="bukti_transfer" name="bukti_transfer">
                                                            </div>
                                                        </div>
                                                        <div id="container-alasan{{ $barang->id }}" class="mb-3 row" style="display: none;">
                                                            <label for="alasan" class="col-sm-2 col-form-label">Alasan</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="alasan" rows="3" name="alasan" placeholder="Masukkan Alasan"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
    </section>
@endsection

@section('before-script')
    <script>
        function toggleTextarea(selectElement) {
            const id = selectElement.id.replace('status', '');
            const textareaElement = document.getElementById(`container-alasan${id}`);
            const fileElement = document.getElementById(`container-bukti-transfer${id}`);

            if (selectElement.value === 'Ditolak') {
                textareaElement.style.display = 'flex';
            } else {
                textareaElement.style.display = 'none';
            }
            
            if (selectElement.value === 'Disetujui') {
                fileElement.style.display = 'flex';
            } else {
                fileElement.style.display = 'none';
            }
        }
    </script>
@endsection