@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto p-6">
  <h2 class="text-2xl font-bold mb-4">{{ $tugas->judul }}</h2>
  <p class="text-gray-700 mb-2">{{ $tugas->group->mapel->nama_mapel }} - {{ $tugas->group->kelas->nama_kelas }}</p>
  <p class="text-gray-600">{{ $tugas->deskripsi }}</p>

  @if($tugas->file_tugas)
    <div class="mt-4">
      <a href="{{ asset('storage/'.$tugas->file_tugas) }}" class="text-blue-600 underline">
        📎 Unduh file tugas
      </a>
    </div>
  @endif

  <div class="mt-6">
    @if($pengumpulan)
      <div class="p-4 bg-green-50 border border-green-200 rounded">
        <p class="text-green-700">✅ Kamu sudah mengumpulkan tugas ini.</p>
        <p class="text-sm text-gray-600 mt-2">Nilai: {{ $pengumpulan->nilai ?? '-' }}</p>
        <p class="text-sm text-gray-600">Feedback: {{ $pengumpulan->feedback ?? '-' }}</p>
      </div>
    @else
      <form action="{{ route('siswa.tugas.kumpul', $tugas->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-4 mt-4">
        @csrf
        <div>
          <label class="block font-semibold">Upload Jawaban</label>
          <input type="file" name="file_jawaban" class="border rounded w-full p-2" required>
        </div>
        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
          📤 Kumpulkan Tugas
        </button>
      </form>
    @endif
  </div>
</div>
@endsection