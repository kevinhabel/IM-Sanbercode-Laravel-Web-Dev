@extends('layouts.utama')

@section('title', 'Daftar Kategori')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="card-title fw-semibold">Daftar Kategori</h5>
      @if(auth()->check() && auth()->user()->isAdmin())
      <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
      @endif
    </div>
    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">No</h6></th>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Nama Kategori</h6></th>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Aksi</h6></th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
            <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $category->name }}</p></td>
            <td class="border-bottom-0">
              <div class="d-flex align-items-center gap-2">
                <a href="{{ route('kategori.show', ['kategori' => $category->id]) }}" class="btn btn-info btn-sm">Detail</a>
                @if(auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('kategori.edit', ['kategori' => $category->id]) }}" class="btn btn-warning btn-sm">Ubah</a>
                <form action="{{ route('kategori.destroy', ['kategori' => $category->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
