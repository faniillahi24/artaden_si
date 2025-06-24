@extends('layouts.admin')
@section('content')
<h2>Edit Status Reservasi</h2>
<form method="POST" action="{{ route('reservasi.update', $reservasi->id) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="disetujui" {{ $reservasi->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="ditolak" {{ $reservasi->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
            <option value="selesai" {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>
@endsection
