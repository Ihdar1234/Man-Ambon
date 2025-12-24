@extends('backend.dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            🏛️ Data Struktur
        </h1>
        <a href="{{ route('struktur.create') }}" 
           class="px-6 py-3 rounded-xl bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold shadow-lg hover:scale-105 transition-all flex items-center gap-2">
           + Tambah Struktur
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="p-4 mb-4 bg-green-100 border border-green-300 text-green-700 rounded-xl shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- GRID STRUKTUR --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($strukturs as $struktur)
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden flex flex-col transition-transform hover:scale-105 hover:shadow-2xl">
            
            @if($struktur->image && file_exists(public_path('storage/'.$struktur->image)))
            <div class="w-full h-56 bg-gray-100 flex justify-center items-center overflow-hidden">
                <img src="{{ asset('storage/'.$struktur->image) }}" alt="{{ $struktur->judul }}" class="w-full h-full object-contain transition-transform hover:scale-105">
            </div>
            @else
            <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">
                No Image
            </div>
            @endif

            <div class="p-6 flex flex-col gap-4 flex-1">
                <h2 class="text-lg font-semibold text-gray-800 line-clamp-2">{{ $struktur->judul }}</h2>

                <div class="flex gap-2 flex-wrap mt-auto">
                    <a href="{{ route('struktur.show', $struktur->id) }}" class="flex-1 py-2 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-center font-semibold shadow hover:scale-105 transition-all">Lihat</a>
                    <a href="{{ route('struktur.edit', $struktur->id) }}" class="flex-1 py-2 rounded-xl bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-center font-semibold shadow hover:scale-105 transition-all">Edit</a>
                    <form action="{{ route('struktur.destroy', $struktur->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Yakin hapus?')">
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
        <div class="bg-white shadow-xl rounded-2xl flex flex-col items-center justify-center h-56 text-gray-400 text-center p-4">
            Belum ada data struktur
        </div>
        @endfor
        @endforelse
    </div>

</div>
@endsection
