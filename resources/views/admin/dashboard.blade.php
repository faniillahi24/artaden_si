@extends('layouts.admin')
@section('content')
<h1>Dashboard Admin</h1>
<p>Total Reservasi: {{ $jumlahReservasi }}</p>
<p>Pengunjung Hari Ini: {{ $pengunjungHariIni }}</p>
<p>Tenda Disewa: {{ $tendaDisewa }}</p>
@endsection