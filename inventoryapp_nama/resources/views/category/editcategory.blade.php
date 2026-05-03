@extends('layouts.master')

@section('title')
Edit Kategori
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/category/{{ $category->id }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $category->name) }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description', $category->description) }}</textarea>
    </div>
    <button type="submit" class="btn btn-warning">Update</button>
    <a href="/category" class="btn btn-secondary">Batal</a>
</form>

@endsection