@extends('backend.dashboard')

@section('content')
<div class="container mx-auto p-6 max-w-2xl bg-white rounded-2xl shadow-md">
  <h1 class="text-2xl font-bold text-emerald-700 mb-6">Edit Kalender</h1>

  <form action="{{ route('kalender.update', $kalender->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
      <label class="font-semibold">Judul</label>
      <input type="text" name="judul" value="{{ $kalender->judul }}" class="input input-bordered w-full" required>
    </div>

    <div>
      <label class="font-semibold">Gambar</label>
      <input type="file" name="gambar" class="file-input file-input-bordered w-full">
      @if($kalender->gambar)
        <img src="{{ asset('storage/'.$kalender->gambar) }}" class="w-full mt-4 rounded-lg shadow">
      @endif
    </div>

    <div class="flex justify-end">
      <a href="{{ route('kalender.index') }}" class="btn btn-ghost mr-2">Batal</a>
      <button class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
@endsection
