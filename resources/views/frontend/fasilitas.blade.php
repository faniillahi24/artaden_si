@extends('layouts.app') {{-- Ubah sesuai layout Anda --}}

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Fasilitas</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Harga</th>
                <th>Tipe Fasilitas</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fasilitas as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_fasilitas }}</td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ asset('storage/fasilitas/' . $item->foto) }}" alt="Foto" width="100">
                        @else
                            Tidak Ada
                        @endif
                    </td>
                    <td>Rp{{ number_format($item->harga ?? 0, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($item->tipe_fasilitas) }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data fasilitas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
