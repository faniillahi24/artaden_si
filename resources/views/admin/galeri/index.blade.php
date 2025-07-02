@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 fw-bold">Manajemen Galeri</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <p class="text-muted mb-0">Total: {{ $galeri->count() }} foto</p>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Foto
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th>Judul</th>
                        <th>Gambar</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galeri as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->judul ?: '-' }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Foto" class="img-thumbnail" style="height: 120px; width: auto; object-fit: cover;">
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-warning">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash-alt me-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data galeri.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection