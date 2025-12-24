@extends('backend.dashboard')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-8 mt-10">
  <h2 class="text-2xl font-bold text-emerald-600 mb-6">➕ Tambah File PDF</h2>

  <form action="{{ route('pdf.store') }}" method="POST">
    @csrf

    <div class="form-control mb-4">
      <label class="label font-semibold">Judul PDF</label>
      <input type="text" name="judul" class="input input-bordered w-full" placeholder="Masukkan judul PDF" required>
    </div>

    <div class="form-control mb-4">
      <label class="label font-semibold">Link Google Drive</label>
      <input type="url" name="drive_link" class="input input-bordered w-full" placeholder="https://drive.google.com/file/d/..." required>
    </div>

    <div class="flex justify-between">
      <a href="{{ route('pdf.index') }}" class="btn btn-outline">← Kembali</a>
      <button type="submit" class="btn btn-success">💾 Simpan</button>
    </div>
  </form>
</div>
@endsection
