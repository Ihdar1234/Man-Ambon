

@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Guru</h3>
    <a href="{{ route('guru.create') }}" class="btn btn-primary btn-sm float-right">
      <i class="fas fa-plus"></i> Tambah
    </a>
  </div>
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIP</th>
          <th>Mapel</th>
          <th>Alamat</th>
          <th>No HP</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($gurus as $guru)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->mapel }}</td>
            <td>{{ $guru->alamat }}</td>
            <td>{{ $guru->no_hp }}</td>
            <td>
              <a href="{{ route('guru.edit', $guru->slug) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
              <form action="{{ route('guru.destroy',$guru->slug) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center">Belum ada data guru</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
