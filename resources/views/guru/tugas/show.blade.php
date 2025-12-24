@extends('dashboard')
@section('content')
<div class="max-w-5xl mx-auto p-6">
  <h2 class="text-2xl font-bold mb-4">📄 {{ $tugas->judul }}</h2>
  <p class="text-gray-600">{{ $tugas->deskripsi }}</p>

  <hr class="my-4">

  <h3 class="text-lg font-semibold mb-2">📥 Jawaban Siswa</h3>

  <table class="min-w-full bg-white border rounded">
    <thead class="bg-gray-100">
      <tr>
        <th class="py-2 px-3 text-left">Nama Siswa</th>
        <th class="py-2 px-3 text-left">File Jawaban</th>
        <th class="py-2 px-3 text-left">Nilai</th>
        <th class="py-2 px-3 text-left">Feedback</th>
        <th class="py-2 px-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tugas->pengumpulan as $p)
      <tr class="border-t">
        <td class="py-2 px-3">{{ $p->siswa->nama }}</td>
        <td class="py-2 px-3">
          <a href="{{ asset('storage/'.$p->file_jawaban) }}" class="text-blue-600 underline">Unduh</a>
        </td>
        <td class="py-2 px-3">{{ $p->nilai ?? '-' }}</td>
        <td class="py-2 px-3">{{ $p->feedback ?? '-' }}</td>
        <td class="py-2 px-3">
          <form action="{{ route('guru.tugas.nilai', $tugas->slug) }}" method="POST" class="flex gap-2">
            @csrf
            <input type="hidden" name="id" value="{{ $p->id }}">
            <input type="number" name="nilai" class="border rounded px-2 w-16" placeholder="0-100" required>
            <input type="text" name="feedback" class="border rounded px-2 w-40" placeholder="Feedback">
            <button class="bg-blue-600 text-white px-3 py-1 rounded">Simpan</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection