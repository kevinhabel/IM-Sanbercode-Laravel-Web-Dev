@extends('layouts.utama')

@section('title', 'Daftar Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h5 class="card-title fw-semibold">Koleksi Buku</h5>
  @if(auth()->check() && auth()->user()->isAdmin())
  <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
  @endif
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
  @foreach($books as $book)
  <div class="col-sm-6 col-xl-4">
    <div class="card overflow-hidden rounded-2">
      <div class="position-relative">
        <img src="{{ $book->image ? asset('storage/'.$book->image) : asset('templates/SEODash-1.0.0/src/assets/images/blog/blog-img1.jpg') }}" class="card-img-top rounded-0" alt="{{ $book->title }}" style="height: 250px; object-fit: cover;">

      </div>
      <div class="card-body pt-3 p-4">
        <h6 class="fw-semibold fs-4 text-truncate">{{ $book->title }}</h6>
        <div class="d-flex align-items-center justify-content-between">
          <div class="d-flex align-items-center">
            <span class="badge bg-light-primary text-primary fw-semibold fs-2">{{ $book->category->name }}</span>
          </div>
          <div class="d-flex align-items-center">
            <h6 class="fw-semibold mb-0 fs-3">Stok: {{ $book->stock }}</h6>
          </div>
        </div>
        <p class="mt-3 mb-0 text-muted fs-3 text-truncate-2" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; height: 40px;">
          {{ $book->summary }}
        </p>
        
        @if(auth()->check() && auth()->user()->isAdmin())
        <div class="mt-4 d-flex gap-2">
          <a href="{{ route('buku.edit', ['buku' => $book->id]) }}" class="btn btn-warning btn-sm flex-grow-1">Ubah</a>
          <form action="{{ route('buku.destroy', ['buku' => $book->id]) }}" method="POST" class="flex-grow-1" onsubmit="return confirm('Yakin ingin menghapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm w-100">Hapus</button>
          </form>
        </div>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
