@extends('layouts.admin')

@section('title', 'Daftar Pengguna')

@section('content')
<div class="container">
    <h1 class="mt-4">Daftar Pengguna</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-3">+ Tambah User</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Peran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($users as $i => $user)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>
            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a>
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" style="display:inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Hapus user ini?')" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach
 
        </tbody>
    </table>
</div>
@endsection
