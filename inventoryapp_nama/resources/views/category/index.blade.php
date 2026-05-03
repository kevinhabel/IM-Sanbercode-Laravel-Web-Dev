@extends('layouts.master')

@section('title')
Daftar Kategori
@endsection

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="d-flex justify-content-between mb-3">
    <a href="/category/create" class="btn btn-primary">+ Tambah</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $i => $cat)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="/category/{{ $cat->id }}" class="btn btn-info btn-sm">Detail</a>
                <a href="/category/{{ $cat->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/category/{{ $cat->id }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data kategori</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection