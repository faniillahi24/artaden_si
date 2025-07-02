@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Galeri Lengkap</h2>
    <div class="row g-4">
        @foreach($galeri as $item)
        <div class="col-md-4 col-lg-3">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                <div class="card-body text-center">
                    <h6 class="mb-0">{{ $item->judul }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $galeri->links() }}
    </div>
</div>
@endsection
