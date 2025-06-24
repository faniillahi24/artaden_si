@extends('layouts.admin')
@section('content')
<h2>Daftar Fasilitas</h2>
<a href="{{ route('fasilitas.create') }}" class="btn btn-primary mb-3">+ Tambah Fasilitas</a>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<table class="table">
    <thead><tr><th>Nama</th><th>Tipe</th><th>Harga</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($fasilitas as $item)
        <tr>
            <td>{{ $item->nama_fasilitas }}</td>
            <td>{{ ucfirst($item->tipe_fasilitas) }}</td>
            <td>{{ $item->harga ?? '-' }}</td>
            <td>
                <a href="{{ route('fasilitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('fasilitas.destroy', $item->id) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection