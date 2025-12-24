@extends('backend.dashboard')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-8 mt-10">
  <h2 class="text-2xl font-bold text-emerald-600 mb-6">✏️ Edit File PDF</h2>

  <form action="{{ route('pdf.update', $pdf->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-control mb-4">
      <label class="label font-semibold">Judul PDF</label>
      <input type="text" name="judul" value="{{ old('judul', $pdf->judul) }}" class="input input-bordered w-full" required>
    </div>

    <div class="form-control mb-4">
      <label class="label font-semibold">Link Google Drive</label>
      <input type="url" name="drive_link" value="{{ old('drive_link', $pdf->drive_link) }}" class="input input-bordered w-full" required>
    </div>

    <div class="flex justify-between">
      <a href="{{ route('pdf.index') }}" class="btn btn-outline">← Kembali</a>
      <button type="submit" class="btn btn-success">💾 Update</button>
    </div>
  </form>
</div>
@endsection
