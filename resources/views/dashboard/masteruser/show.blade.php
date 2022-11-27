@extends('dashboard.layouts.main')
@section('container')
    

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Akun</h3>
                <p class="text-subtitle text-muted">Detai akun user/admin (Read Only)</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/masteruser">Master User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Detail Akun</h4>
                </div>
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
                 {{ session('success') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 @endif
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
                                        <input type="text" class="form-control" value="{{ $user->name}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" value="{{ $user->email}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Role</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" value="{{ $user->role}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Last Login</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" value="{{ $user->last_login}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Akun Dibuat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" value="{{ $user->created_at}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Password (encrypt)</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" value="{{ $user->password}}" disabled>
                                    </div>
                                    
                                    <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="/masteruser" class="btn btn-primary me-1 mb-1" > Kembali</a>
                                            <a href="/masteruser/{{ $user->id }}/edit" class="btn btn-warning me-1 mb-1" ><span data-feather="edit"></span> Edit</a>
                                            @if ($user->role == 'Admin')
                                    
                                            @else
                                                <form action="/masteruser/{{ $user->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger me-1 mb-1" onclick="return confirm('Hapus user dengan nama : {{ $user->name }} ?');"><span data-feather="delete"></span> Hapus</button>
                                                </form>
                                            @endif
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