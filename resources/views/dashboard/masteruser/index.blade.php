@extends('dashboard.layouts.main')
@section('container')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master User</h3>
                <p class="text-subtitle text-muted">Semua data akun Admin & User</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Master User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Tables start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Akun 
            </div>
            <div class="mx-4 mb-3">
                <a href="/masteruser/create" class="badge bg-primary fs-6"><span data-feather="user-plus"></span> Tambah user</a>
            </div>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
             {{ session('success') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
             {{ session('error') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Last Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ Carbon\Carbon::parse($user->last_login)->diffForHumans()}}</td>
                            
                            <td>
                                <a href="/masteruser/{{ $user->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/masteruser/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                @if ($user->role == 'Admin')
                                    
                                @else
                                    <form action="/masteruser/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Hapus user dengan nama : {{ $user->name }} ?');"><span data-feather="delete"></span></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    </tbody> 
                    @endforeach
                    
                </table>
            </div>
        </div>
    </section>
    <!-- Basic Tables end -->
</div>
    


    
    
@endsection