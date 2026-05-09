@extends('layouts.utama')

@section('title', 'Beranda')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h5 class="card-title fw-semibold mb-4">Selamat Datang di Toko Buku SANBERCODE</h5>
        <p class="mb-0">Kelola Toko Buku Sanbercode dengan mudah menggunakan sistem yang bagus dan modern.</p>
        <div class="mt-4">
          @guest
          <a href="{{ route('login') }}" class="btn btn-primary me-2">Masuk</a>
          <a href="{{ route('daftar') }}" class="btn btn-outline-primary">Daftar</a>
          @else
          <a href="{{ route('buku.index') }}" class="btn btn-primary">Lihat Koleksi Buku</a>
          @endguest
        </div>
      </div>
      <div class="col-lg-4 text-center">
        <img src="{{ asset('templates/SEODash-1.0.0/src/assets/images/backgrounds/product-tip.png') }}" alt="image" class="img-fluid" width="200">
      </div>
    </div>
  </div>
</div>
@endsection
