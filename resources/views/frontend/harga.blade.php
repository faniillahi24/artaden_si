@extends('layouts.app') {{-- Ganti sesuai layout Anda --}}

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Harga Fasilitas</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Fasilitas</th>
                <th>Harga</th>
                <th>Tipe Fasilitas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fasilitas as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_fasilitas }}</td>
                    <td>
                        @if ($item->harga)
                            Rp{{ number_format($item->harga, 0, ',', '.') }}
                        @else
                            Gratis
                        @endif
                    </td>
                    <td>{{ ucfirst($item->tipe_fasilitas) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data harga fasilitas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection