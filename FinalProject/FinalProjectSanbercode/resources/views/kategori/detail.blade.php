@extends('layouts.utama')

@section('title', 'Detail Kategori')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Kategori: {{ $category->name }}</h5>
    <h6 class="fw-semibold mb-3">Daftar Buku dalam Kategori ini:</h6>
    
    <div class="row">
      @forelse($books as $book)
      <div class="col-md-4">
        <div class="card overflow-hidden hover-img">
          <div class="position-relative">
            <a href="{{ route('buku.show', $book->id) }}">
              <img src="{{ $book->image ? asset('storage/'.$book->image) : asset('templates/SEODash-1.0.0/src/assets/images/blog/blog-img1.jpg') }}" class="card-img-top" alt="{{ $book->title }}" style="height: 200px; object-fit: cover;">
            </a>
          </div>
          <div class="card-body p-4">
            <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="{{ route('buku.show', $book->id) }}">{{ $book->title }}</a>
            <div class="d-flex align-items-center gap-4">
              <div class="d-flex align-items-center gap-2">
                <i class="ti ti-package text-dark fs-5"></i>Stok: {{ $book->stock }}
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <p class="text-center">Belum ada buku dalam kategori ini.</p>
      </div>
      @endforelse
    </div>
    
    <div class="mt-4">
      <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</div>
@endsection
