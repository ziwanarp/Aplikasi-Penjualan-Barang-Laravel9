@extends('dashboard.layouts.main')
@section('container')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Penjualan Barang</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/penjualanbarang">Penjualan Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Detail Penjualan Barang
            </div>
            <div class="mx-4 ">
                <P class=" fs-6 mb-0">Nomor Penjualan : <strong>{{ $nomor_penjualan[0]->nomor_penjualan }}</strong></P>
                <P class=" fs-6 mt-0">Tanggal Penjualan : <strong> {{date('d F Y', strtotime($nomor_penjualan[0]->tanggal))}}</strong></P>
            </div>
               <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
    
                        @foreach ($nomor_penjualan as $np )  
    
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>                                
                                <td>{{$np->kode_barang}}</td>                  
                                <td>{{$np->nama_barang}}</td>                
                                <td>{{$np->satuan}}</td>                
                                <td>{{$np->qty}}</td>                
                                @if (strlen($np->harga) === 5)
                                <td>Rp. {{ substr($np->harga,0,2).".".substr($np->harga,2,5)}},-</td>
                                @elseif (strlen($np->harga) === 6)
                                <td>Rp. {{ substr($np->harga,0,3).".".substr($np->harga,3,6)}},-</td>
                                @elseif (strlen($np->harga) === 7)
                                <td>Rp. {{ substr($np->harga,0,1).".".substr($np->harga,1,3).".".substr($np->harga,4,7)}},-</td>
                                @elseif (strlen($np->harga) === 4)
                                <td>Rp. {{ substr($np->harga,0,1).".".substr($np->harga,1,4)}}</td>
                                @endif                   
                                <td>{{$np->diskon}}%</td>                
                                              
                                @if (strlen($np->subtotal) === 5)
                                <td>Rp. {{ substr($np->subtotal,0,2).".".substr($np->subtotal,2,5)}},-</td>
                                @elseif (strlen($np->subtotal) === 6)
                                <td>Rp. {{ substr($np->subtotal,0,3).".".substr($np->subtotal,3,6)}},-</td>
                                @elseif (strlen($np->subtotal) === 7)
                                <td>Rp. {{ substr($np->subtotal,0,1).".".substr($np->subtotal,1,3).".".substr($np->subtotal,4,7)}},-</td>
                                @elseif (strlen($np->subtotal) === 4)
                                <td>Rp. {{ substr($np->subtotal,0,1).".".substr($np->subtotal,1,4)}}</td>
                                @endif                 
                            </tr>
                        </tbody> 
                        @endforeach
                    </table>
                            <p class="text-center">Total Harga : <strong>Rp. {{ substr(collect($nomor_penjualan)->sum('subtotal'),0,1).".".substr(collect($nomor_penjualan)->sum('subtotal'),1,3).".".substr(collect($nomor_penjualan)->sum('subtotal'),4,7)}}</strong> </p>
                    <div class=" mt-3">
                        <a href="/penjualanbarang" class="badge bg-primary fs-6"><span data-feather="arrow-left"></span> Kembali</a>
                        <a href="/getpdf/{{ $nomor_penjualan[0]->nomor_penjualan }}" class="badge bg-danger fs-6"><span data-feather="printer"></span> Cetak PDF</a>
                        
                    </form>
                    </div>
                    
                </div> 
            
@endsection