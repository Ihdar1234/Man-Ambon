@extends('dashboard')
@section('content')
<div class="max-w-3xl mx-auto p-6">
  <h2 class="text-xl font-bold mb-4">➕ Buat Group Kelas</h2>

  <form action="{{ route('group.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block font-semibold">Nama Group</label>
      <input type="text" name="nama_group" class="border rounded w-full p-2" required>
    </div>

    <div>
      <label class="block font-semibold">Pilih Kelas</label>
      <select name="kelas_id" class="border rounded w-full p-2">
        @foreach($kelas as $k)
          <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="block font-semibold">Pilih Mapel</label>
      <select name="mapel_id" class="border rounded w-full p-2">
        @foreach($mapel as $m)
          <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
        @endforeach
      </select>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      Simpan Group
    </button>
  </form>
</div>
@endsection
