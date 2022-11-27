@extends('dashboard.layouts.main')
@section('container')
    

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Data Barang</h3>
                <p class="text-subtitle text-muted">Masukan Data Barang sesuai form</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/masterbarang">Master Barang</a></li>
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
                    <h4 class="card-title">Form Tambah Barang</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="/masterbarang" method="post" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    {{-- <div class="col-md-4">
                                        <label>Kode Barang</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror" kode_barang="kode_barang"
                                            placeholder="Kode Barang" autocomplete="off" value="{{ old('kode_barang') }}" required>
                                            @error('kode_barang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div> --}}
                                    <div class="col-md-4">
                                        <label>Nama Barang</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang"
                                            placeholder="Nama Barang" autocomplete="off" value="{{ old('nama_barang') }}" required>
                                            @error('nama_barang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label>Satuan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="satuan" name="satuan" required>
                                                <option value="PC">PC</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Qty</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="number" id="qty" class="form-control @error('qty') is-invalid @enderror" name="qty"
                                            placeholder="Jumlah" autocomplete="off" value="{{ old('qty') }}" required>
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
                                        <input type="number" id="harga" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                            placeholder="Harga" autocomplete="off" value="{{ old('harga') }}" required>
                                            <small>Contoh: Rp.100.000 penulisan = 100000</small>
                                            @error('harga')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
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

@endsection