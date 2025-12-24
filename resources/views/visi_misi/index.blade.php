@extends('backend.dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            📌 Visi & Misi Sekolah
        </h1>
        <a href="{{ route('visi-misi.create') }}" 
           class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold shadow-lg hover:scale-105 transition-all flex items-center gap-2">
           <i class="bi bi-plus-lg"></i> Tambah
        </a>
    </div>

    @if($data->count() == 0)
        {{-- TABEL PLACEHOLDER --}}
        <div class="overflow-x-auto bg-white shadow-xl rounded-2xl">
            <table class="w-full text-left border-collapse min-w-[600px]">
                <thead class="bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data Visi & Misi.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @else
        {{-- GRID CARDS --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($data as $i => $item)
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden transition-transform transform hover:scale-105 hover:shadow-3xl w-full">

                {{-- GAMBAR FULL --}}
                @if($item->image && file_exists(public_path('storage/' . $item->image)))
                <div class="w-full bg-gray-100 flex justify-center items-center">
                    <img 
                        src="{{ asset('storage/' . $item->image) }}" 
                        alt="{{ $item->judul }}" 
                        class="max-h-[400px] w-full object-contain transition-transform duration-500 hover:scale-105">
                </div>
                @endif

                {{-- BODY --}}
                <div class="p-6 flex flex-col gap-4">
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800">{{ $item->judul }}</h2>

                    {{-- TOMBOL --}}
                    <div class="flex flex-wrap gap-3 mt-4">
                        <a href="{{ route('visi-misi.edit', $item->slug) }}" 
                           class="px-5 py-2 rounded-xl bg-gradient-to-r from-yellow-400 to-orange-500 text-white font-semibold shadow-lg hover:scale-105 transition-all flex items-center gap-2">
                           <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('visi-misi.destroy', $item->slug) }}" method="POST" 
                              onsubmit="return confirm('Yakin hapus Visi/Misi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-5 py-2 rounded-xl bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold shadow-lg hover:scale-105 transition-all flex items-center gap-2">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="mt-8 flex justify-center">
            {{ $data->links('pagination::tailwind') }}
        </div>
    @endif

</div>
@endsection
