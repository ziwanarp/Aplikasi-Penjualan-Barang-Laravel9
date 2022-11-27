@extends('dashboard.layouts.main')
@section('container')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Penjualan Barang</h3>
                <p class="text-subtitle text-muted">Laporan Penjualan Barang</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Laporan Penjualan
            </div>
                @if($penjualan_barang->count())
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Penjualan</th>
                                <th>Nomor Penjualan</th>
                                <th>Total Harga</th>
                                <th>Cetak Laporan</th>
                            </tr>
                        </thead>
    
                        @foreach ($penjualan_barang->groupBy('nomor_penjualan') as $pb )  
    
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>   
                                <td>{{date('d-M-y', strtotime($pb->first()->tanggal))}}</td>                  
                                <td>{{$pb->first()->nomor_penjualan}}</td>            
                                @if (strlen(collect($pb)->sum('subtotal')) === 5)
                                <td>Rp. {{ substr(collect($pb)->sum('subtotal'),0,2).".".substr(collect($pb)->sum('subtotal'),2,5)}},-</td>
                                @elseif (strlen(collect($pb)->sum('subtotal')) === 6)
                                <td>Rp. {{ substr(collect($pb)->sum('subtotal'),0,3).".".substr(collect($pb)->sum('subtotal'),3,6)}},-</td>
                                @elseif (strlen(collect($pb)->sum('subtotal')) === 7)
                                <td>Rp. {{ substr(collect($pb)->sum('subtotal'),0,1).".".substr(collect($pb)->sum('subtotal'),1,3).".".substr(collect($pb)->sum('subtotal'),4,7)}},-</td>
                                @endif                 
                                <td> 
                                    <a href="/getpdf/{{ $pb->first()->nomor_penjualan }}" class="badge bg-danger fs-6"><span data-feather="printer"></span> PDF</a>
                                </td>
                            </tr>
                        </tbody> 
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </section>
    </div>
    @else
<div class="alert alert-danger alert-dismissible fade show mx-4 fs-3 text-center" role="alert">
    Data Penjualan Not Found.
</div>
@endif 
@endsection