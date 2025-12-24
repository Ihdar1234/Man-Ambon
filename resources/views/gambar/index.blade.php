@extends('backend.dashboard')

@section('content')
<div class="space-y-6 p-6 md:p-10 max-w-7xl mx-auto">

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="p-4 bg-green-100 border border-green-300 text-green-700 rounded-xl shadow-sm text-center">
            <span class="font-semibold">✓</span> {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <h1 class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent text-center md:text-left">
            📸 Data Gambar
        </h1>
        <a href="{{ route('gambar.create') }}" class="btn-premium inline-flex items-center gap-2 px-4 py-2">
            <i class="bi bi-plus-lg text-lg"></i> Tambah Gambar
        </a>
    </div>

    {{-- Card Wrapper --}}
    <div class="card-premium p-6 md:p-8 space-y-6">

{{-- Mobile Card List Modern --}}
<div class="grid gap-4 md:hidden">
    @forelse($galeris as $item)
    <div class="bg-white rounded-2xl shadow-md overflow-hidden flex flex-col">
        {{-- Gambar full-width --}}
        @if($item->gambar && file_exists(public_path($item->gambar)))
            <img src="{{ asset($item->gambar) }}" class="w-full h-48 object-cover">
        @else
            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400 text-sm">No Image</div>
        @endif

        {{-- Info --}}
        <div class="p-4 flex flex-col gap-2">
            <h3 class="font-semibold text-gray-800 text-lg line-clamp-1">{{ $item->judul }}</h3>
            <p class="text-sm text-gray-500 line-clamp-3">{{ $item->deskripsi }}</p>
            <p class="text-xs text-gray-400 truncate">{{ $item->slug }}</p>
        </div>

        {{-- Tombol aksi --}}
        <div class="flex gap-3 p-4 border-t border-gray-100">
            <a href="{{ route('gambar.show', $item->slug) }}" 
               class="flex-1 flex items-center justify-center py-2 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 shadow text-white text-sm md:text-base">
               <i class="bi bi-eye me-2"></i> Lihat
            </a>
            <a href="{{ route('gambar.edit', $item->slug) }}" 
               class="flex-1 flex items-center justify-center py-2 rounded-xl bg-gradient-to-r from-yellow-400 to-orange-500 shadow text-white text-sm md:text-base">
               <i class="bi bi-pencil-square me-2"></i> Edit
            </a>
            <form action="{{ route('gambar.destroy', $item->slug) }}" method="POST" onsubmit="return confirm('Yakin hapus gambar ini?')" class="flex-1">
                @csrf @method('DELETE')
                <button type="submit" 
                        class="w-full flex items-center justify-center py-2 rounded-xl bg-gradient-to-r from-red-500 to-red-600 shadow text-white text-sm md:text-base">
                    <i class="bi bi-trash me-2"></i> Hapus
                </button>
            </form>
        </div>
    </div>
    @empty
    <p class="text-center text-gray-500">Belum ada data</p>
    @endforelse
</div>


{{-- Desktop Table --}}
<div class="overflow-x-auto hidden md:block">
    <table class="w-full border-collapse bg-white rounded-2xl shadow-md text-sm min-w-[700px]">
        <thead>
            <tr class="bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-700">
                <th class="px-4 py-3 text-left w-8">No</th>
                <th class="px-4 py-3 text-left w-24">Gambar</th>
                <th class="px-4 py-3 text-left w-48">Judul</th>
                <th class="px-4 py-3 text-center w-96">Deskripsi</th>
                <th class="px-4 py-3 text-left w-48">Slug</th>
                <th class="px-4 py-3 text-center w-44">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse($galeris as $i => $item)
            <tr class="hover:bg-indigo-50/50 transition-all duration-200">
                <td class="px-4 py-4 text-gray-700 align-middle">{{ $i + 1 + ($galeris->currentPage()-1)*$galeris->perPage() }}</td>
                <td class="px-4 py-4 align-middle">
                    @if($item->gambar && file_exists(public_path($item->gambar)))
                        <img src="{{ asset($item->gambar) }}" class="w-16 h-16 rounded-xl object-cover shadow-md">
                    @else
                        <span class="text-gray-400 italic">-</span>
                    @endif
                </td>
                <td class="px-4 py-4 font-semibold text-gray-800 align-middle">{{ $item->judul }}</td>
                
                {{-- Deskripsi center --}}
                <td class="px-4 py-4 text-center align-middle max-w-[24rem]">
                    <div class="flex items-center justify-center h-full overflow-hidden text-gray-600">
                        {{ Str::limit($item->deskripsi, 120) }}
                    </div>
                </td>

                <td class="px-4 py-4 text-gray-500 align-middle">{{ $item->slug }}</td>
              <td class="px-4 py-4 text-center align-middle">
    <div class="flex justify-center gap-3">
        {{-- Show --}}
        <a href="{{ route('gambar.show', $item->slug) }}" 
           class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 shadow-md hover:shadow-lg hover:scale-105 transition text-white text-lg">
           <i class="bi bi-eye"></i>
        </a>

        {{-- Edit --}}
        <a href="{{ route('gambar.edit', $item->slug) }}" 
           class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-yellow-400 to-orange-500 shadow-md hover:shadow-lg hover:scale-105 transition text-white text-lg">
           <i class="bi bi-pencil-square"></i>
        </a>

        {{-- Delete --}}
        <form action="{{ route('gambar.destroy', $item->slug) }}" method="POST" onsubmit="return confirm('Yakin hapus gambar ini?')">
            @csrf @method('DELETE')
            <button type="submit" 
                    class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-red-500 to-red-600 shadow-md hover:shadow-lg hover:scale-105 transition text-white text-lg">
                <i class="bi bi-trash"></i>
            </button>
        </form>
    </div>
</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-6 text-gray-500">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

        {{-- Pagination --}}
        <div class="pt-4">
            {{ $galeris->links() }}
        </div>

    </div>
</div>
@endsection
