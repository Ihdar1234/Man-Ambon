@extends('backend.dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-emerald-500 to-teal-600 bg-clip-text text-transparent">
            📅 Kalender Pendidikan
        </h1>
        <a href="{{ route('kalender.create') }}" 
           class="px-6 py-3 rounded-xl bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold shadow-lg hover:scale-105 transition-all flex items-center gap-2">
           + Tambah Kalender
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="p-4 mb-6 bg-green-100 border border-green-300 text-green-700 rounded-xl shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- GRID --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($kalenders as $item)
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col transition-transform hover:scale-105 hover:shadow-2xl">
            
            {{-- Gambar --}}
            @if($item->gambar && file_exists(public_path('storage/'.$item->gambar)))
            <div class="w-full h-64 overflow-hidden">
                <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            </div>
            @else
            <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                No Image
            </div>
            @endif

            {{-- Body --}}
            <div class="p-5 flex flex-col gap-4 flex-1">
                <h3 class="font-bold text-lg text-gray-800 line-clamp-2">{{ $item->judul }}</h3>

                <div class="flex gap-2 flex-wrap mt-auto">
                    <a href="{{ route('kalender.show', $item->slug) }}" class="flex-1 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-center font-semibold shadow hover:scale-105 transition-all">Lihat</a>
                    <a href="{{ route('kalender.edit', $item->id) }}" class="flex-1 py-2 rounded-xl bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-center font-semibold shadow hover:scale-105 transition-all">Edit</a>
                    <form action="{{ route('kalender.destroy', $item->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2 rounded-xl bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold shadow hover:scale-105 transition-all">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        {{-- PLACEHOLDER CARD --}}
        @for($i = 0; $i < 3; $i++)
        <div class="bg-white shadow-xl rounded-2xl flex flex-col items-center justify-center h-64 text-gray-400 text-center p-4">
            Belum ada data kalender
        </div>
        @endfor
        @endforelse
    </div>
</div>
@endsection
