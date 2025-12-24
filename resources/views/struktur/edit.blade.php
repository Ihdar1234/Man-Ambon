@extends('backend.dashboard')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">✏️ Edit Struktur</h1>

    <form action="{{ route('struktur.update', $struktur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-control mb-4">
            <label class="label">Judul</label>
            <input type="text" name="judul" class="input input-bordered w-full" value="{{ old('judul', $struktur->judul) }}" required>
        </div>

        <div class="form-control mb-4">
            <label class="label">Gambar Saat Ini</label>
            @if($struktur->image)
            <img src="{{ asset('storage/'.$struktur->image) }}" class="w-full h-64 object-contain rounded mb-3">
            @endif
            <input type="file" name="image" class="file-input file-input-bordered w-full">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('struktur.index') }}" class="btn btn-ghost">Batal</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
    </form>
</div>
@endsection
