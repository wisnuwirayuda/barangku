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
                                    <div class="btn btn-success" style="cursor: default;">Sudah Disetujui</div>
                                @else
                                    <div class="btn btn-danger" style="cursor: default;">Belum Disetujui</div>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $barang->id }}">Detail</a>
                                <!-- Modal -->
                                <div class="modal modal-lg fade" id="modalDetail{{ $barang->id }}" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalDetailLabel">Detail {{ $barang->nama_barang }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="mb-3 row">
                                                            <div class="col">
                                                                <div class="fs-6">Nama Barang</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->nama_barang }}</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="fs-6">Quantity</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->quantity }}</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="fs-6">Alamat</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->alamat }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <div class="col">
                                                                <div class="fs-6">Nama Bank</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->nama_bank }}</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="fs-6">Nomor Rekening</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->nomor_rekening }}</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="fs-6">Bukti Transfer</div>
                                                                <img src="{{ asset('uploads/' . $barang->bukti_transfer) }}" class="rounded float-start" alt="bukti_transfer" width="200">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <div class="col">
                                                                <div class="fs-6">Status</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->status }}</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="fs-6">Alasan</div>
                                                                <div class="fs-5 fw-medium">{{ $barang->alasan ?? '-' }}</div>
                                                            </div>
                                                            <div class="col" style="visibility: hidden;">
                                                                <div class="fs-6"></div>
                                                                <div class="fs-5 fw-medium"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdate{{ $barang->id }}">Edit</a>
                                <!-- Modal -->
                                <div class="modal modal-lg fade" id="modalUpdate{{ $barang->id }}" tabindex="-1" aria-labelledby="modalUpdateLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="modalUpdateLabel">Edit {{ $barang->nama_barang }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('officer.update', $barang->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="mb-3 row">
                                                                <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang<span style="color: red">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang" value="{{ $barang->nama_barang }}" autocomplete="off" autofocus>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="quantity" class="col-sm-3 col-form-label">Quantity<span style="color: red">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Masukkan Quantity" value="{{ $barang->quantity }}">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat Pembelian Barang<span style="color: red">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat">{{ $barang->alamat }}</textarea>
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="mb-3 row">
                                                                <label for="nama_bank" class="col-sm-3 col-form-label">Nama Bank<span style="color: red">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank" value="{{ $barang->nama_bank }}">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label for="nomor_rekening" class="col-sm-3 col-form-label">Nomor Rekening<span style="color: red">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Masukkan Nomor Rekening" value="{{ $barang->nomor_rekening }}">
                                                                </div>
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
                                
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $barang->id }}">Hapus</a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $barang->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus {{ $barang->nama_barang }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('officer.delete', $barang->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                                    </form>
                                                </div>
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