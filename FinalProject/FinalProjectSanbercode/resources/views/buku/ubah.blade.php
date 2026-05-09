@extends('layouts.utama')

@section('title', 'Ubah Buku')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Ubah Buku</h5>
    <form action="{{ route('buku.update', ['buku' => $book->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" class="form-select" id="category_id" required>
          @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Judul Buku</label>
        <input type="text" name="title" class="form-control" id="title" value="{{ $book->title }}" required>
      </div>
      <div class="mb-3">
        <label for="summary" class="form-label">Ringkasan</label>
        <textarea name="summary" class="form-control" id="summary" rows="4" required>{{ $book->summary }}</textarea>
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" class="form-control" id="stock" value="{{ $book->stock }}" required min="0">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Gambar (Kosongkan jika tidak ingin mengubah)</label>
        <input type="file" name="image" class="form-control" id="image">
        @if($book->image)
        <div class="mt-2">
          <img src="{{ asset('storage/'.$book->image) }}" alt="" width="100">
        </div>
        @endif
      </div>
      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
