@extends('backend.dashboard')

@section('content')
<div class="space-y-6">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="p-4 bg-green-100 border border-green-300 text-green-700 rounded-xl shadow-sm">
            <span class="font-semibold">✓</span> {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mt-10">
        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Daftar Artikel
        </h2>
        <a href="{{ route('artikel.create') }}" class="btn-premium inline-flex items-center px-5 py-2">
            <i class="bi bi-plus-lg mr-2 text-lg"></i> Tambah Artikel
        </a>
    </div>

    {{-- Card Wrapper --}}
    <div class="card-premium space-y-6 p-6 md:p-8">

       {{-- Desktop Table Ramping --}}
<div class="overflow-x-auto hidden md:block">
    <table class="w-full border-collapse bg-white rounded-2xl shadow-md overflow-hidden text-sm">
        <thead>
            <tr class="bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700">
                <th class="px-4 py-3 text-left font-semibold w-8">No</th>
                <th class="px-4 py-3 text-left font-semibold w-48">Judul</th>
                <th class="px-4 py-3 text-left font-semibold w-36">Penulis</th>
                <th class="px-4 py-3 text-left font-semibold w-96">Isi</th>
                <th class="px-4 py-3 text-left font-semibold w-24">Gambar</th>
                <th class="px-4 py-3 text-center font-semibold w-36">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($artikels as $i => $artikel)
            <tr class="hover:bg-indigo-50/50 transition-all">
                <td class="px-4 py-3 text-gray-700">{{ $i + 1 }}</td>
                <td class="px-4 py-3 font-semibold text-gray-800 truncate">{{ $artikel->judul }}</td>
                <td class="px-4 py-3 text-gray-600 truncate">{{ $artikel->penulis }}</td>
                <td class="px-4 py-3 text-gray-600 max-w-[24rem] truncate">
                    {{ Str::limit(strip_tags($artikel->isi), 120) }}
                </td>
                <td class="px-4 py-3">
                    @if ($artikel->gambar)
                        <img src="{{ asset($artikel->gambar) }}" class="w-16 h-16 rounded-xl object-cover shadow">
                    @else
                        <span class="text-gray-400 italic">-</span>
                    @endif
                </td>
               <td class="px-4 py-3 text-center">
 <div class="flex justify-center gap-4">
   <a href="{{ route('artikel.show', $artikel->slug) }}" 
   class="flex items-center justify-center w-10 h-10 bg-green-500 hover:bg-green-700 text-white text-lg rounded-xl shadow-md transition transform hover:scale-105">
    <i class="bi bi-eye"></i>
</a>

    <a href="{{ route('artikel.edit', $artikel->slug) }}" 
       class="flex items-center justify-center w-10 h-10 bg-yellow-500 hover:bg-yellow-700 text-white text-lg rounded-xl shadow-md transition transform hover:scale-105">
        <i class="bi bi-pencil-square"></i>
    </a>

    <form action="{{ route('artikel.destroy', $artikel->slug) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?')">
        @csrf @method('DELETE')
        <button type="submit" 
          class="flex items-center justify-center w-10 h-10 bg-red-500 hover:bg-red-700 text-white text-lg rounded-xl shadow-md transition transform hover:scale-105">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</div>

</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-6 text-gray-500">Belum ada artikel</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


        {{-- Mobile Card List --}}
        <div class="grid gap-4 md:hidden">
            @forelse($artikels as $artikel)
            <div class="card-premium p-4">
                <div class="flex items-center gap-4">
                    @if($artikel->gambar)
                        <img src="{{ asset($artikel->gambar) }}" class="w-20 h-20 rounded-xl object-cover shadow">
                    @else
                        <div class="w-20 h-20 bg-gray-200 rounded-xl flex items-center justify-center text-gray-400">No Img</div>
                    @endif
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-800">{{ $artikel->judul }}</h3>
                        <p class="text-sm text-gray-500">{{ $artikel->penulis }}</p>
                        <p class="text-xs text-gray-400 mt-1">{{ Str::limit(strip_tags($artikel->isi), 100) }}</p>
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="action-btn bg-blue-600 hover:bg-blue-700"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('artikel.edit', $artikel->slug) }}" class="action-btn bg-yellow-500 hover:bg-yellow-600"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('artikel.destroy', $artikel->slug) }}" method="POST" onsubmit="return confirm('Yakin hapus artikel ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="action-btn bg-red-600 hover:bg-red-700"><i class="bi bi-trash"></i></button>
                    </form>
                </div>
            </div>
            @empty
                <p class="text-center text-gray-500">Belum ada artikel</p>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="pt-4">
            {{ $artikels->links() }}
        </div>
    </div>
</div>
@endsection
