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
                                <a href="{{ route('officer.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                                
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