@extends('dashboard.layouts.main')
@section('container')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master Barang</h3>
                <p class="text-subtitle text-muted">Semua data barang</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    
    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Barang
            </div>
            <div class="mx-4 mb-3">
                <a href="/masterbarang/create" class="badge bg-primary fs-6 "><span data-feather="file-plus"></span> Tambah Barang</a>
                <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#FormModal"></span> 
                Import CSV/Excell
            </button>
            <a href="/exportbarang" class="badge bg-danger fs-6"><span data-feather="printer"></span> Data Barang</a>
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
             {{ session('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
             @endif
            @if ($master_barang->count())
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($master_barang as $mb)
                    <tbody>
                        <tr>
                            <td>{{ $mb->kode_barang }}</td>
                            <td>{{ $mb->nama_barang }}</td>
                            <td>{{ $mb->satuan }}</td>
                            <td>{{ $mb->qty}}</td>
                            @if (strlen($mb->harga) === 5)
                            <td>Rp. {{ substr($mb->harga,0,2).".".substr($mb->harga,2,5)}},-</td>
                            @elseif (strlen($mb->harga) === 6)
                            <td>Rp. {{ substr($mb->harga,0,3).".".substr($mb->harga,3,6)}},-</td>
                            @elseif (strlen($mb->harga) === 4)
                            <td>Rp. {{ substr($mb->harga,0,1).".".substr($mb->harga,1,4)}},-</td>
                            @endif
                            <td>
                                <a href="/masterbarang/{{ $mb->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/masterbarang/{{ $mb->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Hapus data barang : {{ $mb->nama_barang }} ?');"><span data-feather="delete"></span></button>
                                    </form>
                            </td>
                        </tr>
                    </tbody> 
                    @endforeach
                    
                </table>
            </div>
            <div class="d-flex justify-content-center">
                    {{ $master_barang->links() }}
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div> 

<!-- Modal -->
<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Import Data Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/importbarang" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Masukan File (.csv / .xlsx / .xls)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required> 
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
  {{-- end modal --}}
@else
<div class="alert alert-danger alert-dismissible fade show mx-4 fs-3 text-center" role="alert">
    Data Barang Not Found.
</div>
@endif
    
@endsection