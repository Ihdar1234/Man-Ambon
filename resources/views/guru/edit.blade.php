@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">Edit Guru</div>
  <div class="card-body">
    <form action="{{ route('guru.update', $guru->slug) }}" method="POST">
      @csrf @method('PUT')
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $guru->nama }}" required>
      </div>
      <div class="form-group">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ $guru->nip }}" required>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required>{{ $guru->alamat }}</textarea>
      </div>
      <div class="form-group">
        <label>No HP</label>
        <input type="text" name="no_hp" class="form-control" value="{{ $guru->no_hp }}" required>
      </div>
      <div class="form-group">
        <label>Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control" value="{{ $guru->mapel }}" required>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
      <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
