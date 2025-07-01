@extends('layouts.admin')

@section('content')
<h2>Daftar Fasilitas</h2>
@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<a href="{{ route('admin.fasilitas.create') }}" class="btn btn-primary mb-3">+ Tambah Fasilitas</a>
<table class="table">
    <thead><tr><th>Foto</th><th>Nama</th><th>Tipe</th><th>Harga</th><th>Aksi</th></tr></thead>
    <tbody>
        @forelse($fasilitas as $item)
    <tr>
        <td>
             @if($item->foto)
                    <img src="{{ asset('storage/fasilitas/' . $item->foto) }}" alt="Foto {{ $item->nama_fasilitas }}" width="100">
                @else
                    <span class="text-muted">-</span>
                @endif
        </td>
        <td>{{ $item->nama_fasilitas }}</td>
        <td>{{ ucfirst($item->tipe_fasilitas) }}</td>
        <td>{{ $item->harga !== null ? 'Rp '.number_format($item->harga,0,',','.') : '-' }}</td>
        <td>
            <a href="{{ route('admin.fasilitas.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST" style="display:inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
@empty
    <tr><td colspan="4" class="text-center">Belum ada fasilitas.</td></tr>
@endforelse
</tbody>
</table>
@endsection