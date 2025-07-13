@extends('layouts.admin')

@section('content')
<div class="container mt-4">
  <h2 class="mb-4">Dashboard Admin</h2>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow border-0">
        <div class="card-body text-center">
          <i class="fas fa-file-alt fa-2x text-primary mb-2"></i>
          <h5 class="card-title">Total Reservasi</h5>
          <h3 class="fw-bold">{{ $jumlahReservasi }}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow border-0">
        <div class="card-body text-center">
          <i class="fas fa-user-check fa-2x text-success mb-2"></i>
          <h5 class="card-title">Pengunjung Hari Ini</h5>
          <h3 class="fw-bold">{{ $pengunjungHariIni }}</h3>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow border-0">
        <div class="card-body text-center">
          <i class="fas fa-campground fa-2x text-warning mb-2"></i>
          <h5 class="card-title">Tenda Disewa</h5>
          <h3 class="fw-bold">{{ $tendaDisewa }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection