@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
  <div class="flex items-center justify-between mb-4">
    <h1 class="text-xl font-semibold text-sky-700">Edit Mata Pelajaran</h1>
    <a href="{{ route('mapel.index') }}" class="text-sm text-sky-600">← Kembali</a>
  </div>

  <div class="bg-white shadow rounded p-6">
    <form action="{{ route('mapel.update', $mapel) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Mapel</label>
        <input type="text" name="nama" value="{{ old('nama', $mapel->nama) }}" required
               class="mt-1 block w-full rounded border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-sky-500" />
        @error('nama')
          <span class="text-sm text-red-600">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex items-center space-x-2">
        <button type="submit" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded">Simpan Perubahan</button>
        <a href="{{ route('mapel.index') }}" class="px-4 py-2 border rounded text-gray-700">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection
