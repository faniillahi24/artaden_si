@extends('layouts.admin')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container">
    <h1 class="mt-4">Edit Pengguna</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Gunakan PUT untuk update --}}

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Password (biarkan kosong jika tidak ingin diubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
