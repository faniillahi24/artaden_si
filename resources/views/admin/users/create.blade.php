@extends('layouts.admin')

@section('content')
<h2>Tambah User</h2>

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

{{-- Form Tambah User --}}
<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf

    <div class="form-group mb-3">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
            <option value="">-- Pilih Role --</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="staff" {{ old('role') == 'staff' ? 'selected' : '' }}>Staff</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
</form>
@endsection
