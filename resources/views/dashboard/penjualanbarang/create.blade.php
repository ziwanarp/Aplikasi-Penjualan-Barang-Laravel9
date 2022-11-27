@extends('dashboard.layouts.main')
@section('container')


<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Penjualan</h3>
                <p class="text-subtitle text-muted">Masukan Data penjualan sesuai form.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/penjualanbarang">Penjualan Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-7 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Data Penjualan</h4>
                    </div>
                    @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
                     {{ session('error') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                     @endif
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/penjualanbarang" method="post" class="form form-horizontal">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Kode Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="kode_barang" onchange="showBrg(this.value)" required >
                                            @foreach ($master_barang as $mb)
                                               <option value="{{ $mb->kode_barang }}">{{ $mb->kode_barang }} | {{ $mb->nama_barang }}</option>
                                           @endforeach
                                        </select>
                                    </fieldset>
                                        </div>
                                        {{-- ID_barang --}}
                                        <input type="hidden" id="id_barang" class="form-control" name="id_barang">

                                        <div class="col-md-4">
                                            <label>Nama Barang</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" autocomplete="off" readonly required>
                                                @error('nama_barang')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Tanggal Penjualan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="tanggal" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" autocomplete="off" value="{{ date_create()->format('Y-m-d') }}" required readonly>
                                                @error('tanggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Satuan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="satuan" class="form-control @error('satuan') is-invalid @enderror" name="satuan" autocomplete="off" readonly required>
                                                @error('satuan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Qty Tersedia:</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number"  class="form-control" id="qty_show" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Qty</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" min="1" id="qty" class="form-control @error('qty') is-invalid @enderror" name="qty" autocomplete="off" value="{{ old('qty') }}" required>
                                            <small>Tidak boleh lebih banyak dari Qty Tersedia!!</small>
                                                @error('qty')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Harga</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="harga" class="form-control @error('harga') is-invalid @enderror" name="harga" autocomplete="off" value="{{ old('harga') }}" readonly required>
                                            <small>Harga per 1 Qty</small>
                                                @error('harga')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Diskon</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" min="0" max="100" id="diskon" class="form-control @error('diskon') is-invalid @enderror" name="diskon" autocomplete="off" value="{{ old('diskon') }}"  required>
                                            <small>Masukan dalam Hitungan % (0-100)</small>
                                                @error('diskon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label>Subtotal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text"  class="form-control"  value="Dihtung Otomatis oleh Sistem" disabled>
                                        </div>

                                    
                                        

                                        

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="/penjualanbarang" class="btn btn-primary me-1 mb-1"> Cancel</a>
                                            <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
    <script>
        function showBrg(value) {
            $.ajax({
                url: 'http://127.0.0.1:8000/masterbarang/get/'+value,
                data: {value},
                method: 'get',
                dataType: 'json',
                success: function(data){
                    $('#nama_barang').val(data[0].nama_barang);
                    $('#satuan').val(data[0].satuan);
                    $('#id_barang').val(data[0].id);
                    $('#harga').val(data[0].harga);
                    $('#qty_show').val(data[0].qty);
                }
                });
            }
        </script>
 
    @endsection