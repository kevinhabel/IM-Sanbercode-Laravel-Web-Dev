@extends('layouts.utama')

@section('title', 'Profil Saya')

@section('content')
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Profil Saya</h5>
    <div class="row">
      <div class="col-md-6">
        <form action="{{ route('profil.simpan') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label">Peran</label>
            <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" disabled>
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Usia</label>
            <input type="number" name="age" class="form-control" id="age" value="{{ $profile->age ?? '' }}">
          </div>
          <div class="mb-3">
            <label for="bio" class="form-label">Bio</label>
            <textarea name="bio" class="form-control" id="bio" rows="3">{{ $profile->bio ?? '' }}</textarea>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea name="address" class="form-control" id="address" rows="3">{{ $profile->address ?? '' }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
