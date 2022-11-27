@extends('dashboard.layouts.main')
@section('container')
    

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Akun Baru</h3>
                <p class="text-subtitle text-muted">Masukan Data User sesuai form</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/masteruser">Master User</a></li>
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
                    <h4 class="card-title">Form Tambah Akun</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="/masteruser" method="post" class="form form-horizontal">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" autocomplete="off" value="{{ old('name') }}">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="Email" autocomplete="off" value="{{ old('email') }}">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="role">Role</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="role" id="role" class="form-control " name="role"
                                             autocomplete="off" value="User" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Password" value="{{ old('password') }}">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <a href="/masteruser" class="btn btn-primary me-1 mb-1" > Cancel</a>
                                        <button type="submit" class="btn btn-success me-1 mb-1">Submit</button>
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