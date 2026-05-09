@extends('layouts.utama')

@section('title', 'Tambah Buku')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Tambah Buku Baru</h5>
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" class="form-select" id="category_id" required>
          <option value="">Pilih Kategori</option>
          @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Judul Buku</label>
        <input type="text" name="title" class="form-control" id="title" required>
      </div>
      <div class="mb-3">
        <label for="summary" class="form-label">Ringkasan</label>
        <textarea name="summary" class="form-control" id="summary" rows="4" required></textarea>
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" id="stock" value="0" required min="0">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Gambar</label>
        <input type="file" name="image" class="form-control" id="image">
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
