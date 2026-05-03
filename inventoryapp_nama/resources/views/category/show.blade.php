@extends('layouts.master')

@section('title')
Detail Kategori
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $category->name }}</h5>
        <p class="card-text">{{ $category->description }}</p>
        <a href="/category/{{ $category->id }}/edit" class="btn btn-warning">Edit</a>
        <a href="/category" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection