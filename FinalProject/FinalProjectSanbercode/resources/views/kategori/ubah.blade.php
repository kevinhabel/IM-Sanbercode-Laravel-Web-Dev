@extends('layouts.utama')

@section('title', 'Ubah Kategori')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Ubah Kategori</h5>
    <form action="{{ route('kategori.update', ['kategori' => $category->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="name" class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Perbarui</button>
      <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</div>
@endsection
