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
                    <th>Tanggal</th>
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
                      {{ $barang->updated_at }}
                    </td>
                    <td>
                      @if($barang->status == 'Disetujui')
                        <div class="btn btn-success" style="cursor: default;">{{ $barang->status }}</div>
                      @else
                        <div class="btn btn-danger" style="cursor: default;">{{ $barang->status }}</div>
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
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection