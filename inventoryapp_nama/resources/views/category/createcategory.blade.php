@extends('layouts.master')

@section('title')
Tambah Kategori
@endsection

@section('content')
   
<form action = "/category" method="POST">
    @csrf 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <div class="mb-3">
    <label class="form-label">Nama Kategori</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
  </div> 
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="/category/create" class="btn btn-secondary">Batal</a>
</form>
@endsection
