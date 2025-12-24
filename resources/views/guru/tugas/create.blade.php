@extends('dashboard')
@section('content')
<div class="max-w-3xl mx-auto p-6">
  <h2 class="text-xl font-bold mb-4">📝 Tambah Tugas Baru</h2>

  <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
      <label class="block font-semibold">Pilih Group</label>
      <select name="group_id" class="border rounded w-full p-2">
        @foreach($groups as $g)
          <option value="{{ $g->id }}">{{ $g->nama_group }}</option>
        @endforeach
      </select>
    </div>

    <div>
      <label class="block font-semibold">Judul Tugas</label>
      <input type="text" name="judul" class="border rounded w-full p-2" required>
    </div>

    <div>
      <label class="block font-semibold">Deskripsi</label>
      <textarea name="deskripsi" class="border rounded w-full p-2"></textarea>
    </div>

    <div>
      <label class="block font-semibold">Deadline</label>
      <input type="date" name="deadline" class="border rounded w-full p-2">
    </div>

    <div>
      <label class="block font-semibold">File Tugas (opsional)</label>
      <input type="file" name="file_tugas" class="border rounded w-full p-2">
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
      Simpan Tugas
    </button>
  </form>
</div>
@endsection
