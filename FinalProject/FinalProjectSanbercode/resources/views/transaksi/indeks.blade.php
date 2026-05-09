@extends('layouts.utama')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="card-title fw-semibold">Transaction</h5>
      <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Input Transaction</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive">
      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">#</h6></th>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Nama</h6></th>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Buku</h6></th>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Status Buku</h6></th>
            <th class="border-bottom-0"><h6 class="fw-semibold mb-0">Jumlah</h6></th>
          </tr>
        </thead>
        <tbody>
          @foreach($transactions as $index => $transaction)
          <tr>
            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6></td>
            <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $transaction->user->name }}</p></td>
            <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $transaction->book->title }}</p></td>
            <td class="border-bottom-0">
              <span class="badge {{ $transaction->type == 'in' ? 'bg-primary' : 'bg-danger' }}">
                {{ $transaction->type }}
              </span>
            </td>
            <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $transaction->amount }}</p></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
