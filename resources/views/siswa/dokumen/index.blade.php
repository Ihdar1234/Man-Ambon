@extends('siswa.layouts.siswa')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">📁 Dokumen Saya</h1>
            <p class="text-gray-500 text-sm">Kelola dan unggah dokumenmu di sini.</p>
        </div>
        <a href="{{ route('siswa.dokumen.create') }}" 
           class="btn bg-gradient-to-r from-indigo-500 to-blue-600 text-white border-none shadow-md hover:shadow-xl hover:scale-105 transition-all duration-300">
            <i class="fa-solid fa-upload mr-2"></i> Upload Baru
        </a>
    </div>

    <!-- Jika belum ada dokumen -->
    @if($dokumens->isEmpty())
        <div class="text-center py-10 bg-base-200 rounded-xl shadow-inner">
            <i class="fa-regular fa-folder-open text-5xl text-gray-400 mb-3"></i>
            <p class="text-gray-500 text-lg">Belum ada dokumen diunggah.</p>
            <a href="{{ route('siswa.dokumen.create') }}" 
               class="btn bg-gradient-to-r from-indigo-500 to-blue-600 text-white mt-4 border-none hover:shadow-lg hover:scale-105 transition-all duration-300">
                <i class="fa-solid fa-upload mr-2"></i> Unggah Sekarang
            </a>
        </div>
    @else
        <!-- Grid dokumen -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($dokumens as $dokumen)
                <div class="card bg-base-100 shadow-md hover:shadow-2xl transition-all duration-300 border border-base-200 group overflow-hidden">
                    <div class="p-4">
                        <!-- Preview Dokumen -->
                        @if(in_array($dokumen->file_type, ['jpg','jpeg','png']))
                            <img src="{{ asset('storage/'.$dokumen->file_path) }}" 
                                 class="rounded-md h-48 w-full object-cover mb-3 transition-transform duration-500 group-hover:scale-105" 
                                 alt="Dokumen Gambar">
                        @elseif($dokumen->file_type === 'pdf')
                            <iframe 
                                src="{{ asset('storage/'.$dokumen->file_path) }}" 
                                class="w-full h-48 rounded-md mb-3 border border-base-300 transition-transform duration-500 group-hover:scale-105"
                                frameborder="0">
                            </iframe>
                        @else
                            <div class="flex flex-col items-center justify-center h-48 w-full bg-base-200 rounded-md mb-3 text-center p-3">
                                <i class="fa-solid fa-file text-blue-500 text-4xl mb-2"></i>
                                <p class="text-sm font-medium truncate w-full">
                                    {{ basename($dokumen->file_path) }}
                                </p>
                            </div>
                        @endif

                        <!-- Tombol Aksi -->
                        <div class="flex justify-between gap-3 mt-4">
                            <!-- Tombol Lihat -->
                            <a href="{{ asset('storage/'.$dokumen->file_path) }}" target="_blank"
                               class="flex-1 text-center py-2 rounded-lg font-semibold text-white 
                               bg-gradient-to-r from-emerald-500 to-cyan-500 shadow-md 
                               hover:shadow-lg hover:from-emerald-600 hover:to-cyan-600 
                               transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fa-solid fa-eye"></i> Lihat
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('siswa.dokumen.destroy', $dokumen->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus dokumen ini?');" 
                                  class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button 
                                    class="w-full py-2 rounded-lg font-semibold text-white 
                                    bg-gradient-to-r from-rose-500 to-red-500 shadow-md 
                                    hover:shadow-lg hover:from-rose-600 hover:to-red-600 
                                    transform hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
