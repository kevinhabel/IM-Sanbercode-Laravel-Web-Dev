@extends('layouts.utama')

@section('title', 'Detail Buku')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ $book->image ? asset('storage/'.$book->image) : asset('templates/SEODash-1.0.0/src/assets/images/blog/blog-img1.jpg') }}" class="img-fluid rounded" alt="{{ $book->title }}">
      </div>
      <div class="col-md-8">
        <h3 class="fw-semibold">{{ $book->title }}</h3>
        <p class="text-muted">Kategori: {{ $book->category->name }}</p>
        <p class="mt-3"><strong>Ringkasan:</strong></p>
        <p>{{ $book->summary }}</p>
        <p><strong>Stok:</strong> {{ $book->stock }}</p>

        @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isStaff()))
        <div class="mt-4">
          <h5 class="fw-semibold">Buat Transaksi Stok</h5>
          <form action="{{ route('transaksi.store') }}" method="POST" class="row g-3">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <div class="col-auto">
              <select name="type" class="form-select" required>
                <option value="in">Masuk</option>
                <option value="out">Keluar</option>
              </select>
            </div>
            <div class="col-auto">
              <input type="number" name="quantity" class="form-control" placeholder="Jumlah" required min="1">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </div>
          </form>
        </div>
        @endif

        <div class="mt-5">
          <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
