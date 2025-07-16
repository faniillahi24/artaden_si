@extends('layouts.app')

@section('title', 'Detail Pengguna')

@section('content')
<div class="container">
    <h1 class="mt-4">Detail Pengguna</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }}</h5>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Peran:</strong> {{ $user->role }}</p>
        </div>
    </div>

    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Pengguna</a>
</div>
@endsection