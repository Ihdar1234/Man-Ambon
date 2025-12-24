@extends('backend.dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Detail Gambar</h1>

    <div class="grid grid-cols-1 gap-4">
        {{-- Gambar --}}
        <div>
            <label class="font-semibold mb-1 block">Gambar</label>
            @if($galeri->gambar && file_exists(public_path($galeri->gambar)))
                <img src="{{ asset($galeri->gambar) }}" class="w-full h-64 object-cover rounded-md">
            @else
                <div class="text-gray-400 italic">Tidak ada gambar</div>
            @endif
        </div>

        {{-- Judul --}}
        <div>
            <label class="font-semibold mb-1 block">Judul</label>
            <div class="px-3 py-2 border rounded bg-gray-50">{{ $galeri->judul }}</div>
        </div>

        {{-- Deskripsi --}}
        <div>
            <label class="font-semibold mb-1 block">Deskripsi</label>
            <div class="px-3 py-2 border rounded bg-gray-50">{{ $galeri->deskripsi ?? '-' }}</div>
        </div>

        {{-- Slug --}}
        <div>
            <label class="font-semibold mb-1 block">Slug</label>
            <div class="px-3 py-2 border rounded bg-gray-50">{{ $galeri->slug }}</div>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-4">
            <a href="{{ route('gambar.index') }}" class="btn btn-secondary flex items-center gap-2"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
@endsection
