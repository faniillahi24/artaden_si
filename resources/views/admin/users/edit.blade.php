@extends('layouts.admin')

@section('content')
<h2>Edit User</h2>

{{-- Tampilkan error validasi jika ada --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Form Edit User --}}
<form method="POST" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="password">Password <small>(Biarkan kosong jika tidak ingin diubah)</small></label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group mb-3">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Update</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</form>
@endsection
