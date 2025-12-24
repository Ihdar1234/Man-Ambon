@extends('siswa.layouts.siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 p-6">
  <div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
      <h2 class="text-3xl font-bold text-primary flex items-center gap-2">
        📋 Daftar Siswa
      </h2>
      <a href="{{ route('siswa.daftar.create') }}" 
         class="btn btn-primary btn-sm mt-3 md:mt-0 shadow-md">
        ➕ Tambah Siswa
      </a>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
      <div class="alert alert-success shadow-md mb-5 flex items-center gap-2">
        <i data-lucide="check-circle-2" class="w-5 h-5"></i>
        {{ session('success') }}
      </div>
    @endif

    {{-- ========================= --}}
    {{-- 📱 Tampilan Mobile: Card --}}
    {{-- ========================= --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:hidden">
      @forelse ($siswas as $siswa)
        <div class="card relative bg-gradient-to-br from-white via-blue-50 to-indigo-100 border border-gray-200 shadow-xl rounded-2xl overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
          <div class="card-body p-5">

            {{-- Header Foto --}}
            <div class="flex flex-col items-center">
              <div class="relative">
                @if ($siswa->foto)
                  <img src="{{ asset('storage/' . $siswa->foto) }}" 
                       alt="Foto Siswa" 
                       class="w-28 h-28 object-cover rounded-full shadow-md ring-4 ring-primary/20">
                @else
                  <div class="w-28 h-28 flex items-center justify-center bg-gray-100 rounded-full text-gray-400 text-xs shadow-inner">
                    Tidak ada foto
                  </div>
                @endif
                {{-- Efek ring glow --}}
                <div class="absolute inset-0 rounded-full ring-2 ring-primary/40 animate-pulse"></div>
              </div>

              <h3 class="text-lg font-semibold text-gray-800 mt-4">{{ $siswa->nama_lengkap }}</h3>
              <p class="text-sm text-gray-500 mb-2">{{ $siswa->nisn }}</p>

              {{-- Badge Status --}}
              <span class="badge px-3 py-2 mt-1 text-sm
                @if ($siswa->status === 'verifikasi') badge-success 
                @elseif ($siswa->status === 'ditolak') badge-error 
                @else badge-warning 
                @endif flex items-center gap-1">
                @if ($siswa->status === 'verifikasi')
                  ✅
                @elseif ($siswa->status === 'ditolak')
                  ❌
                @else
                  ⏳
                @endif
                {{ ucfirst($siswa->status) }}
              </span>
            </div>

            {{-- Garis pemisah --}}
            <div class="divider my-5"></div>

            {{-- Info Siswa --}}
            <div class="text-sm text-gray-700 space-y-2">
              <p><strong>🏫 Asal Sekolah:</strong> {{ $siswa->asal_sekolah ?? '-' }}</p>
              <p><strong>👤 Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
              <p><strong>📍 Alamat:</strong> {{ $siswa->alamat ?? '-' }}</p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-center gap-2 border-t pt-4 mt-5">
              <a href="{{ route('siswa.daftar.show', $siswa->id) }}" 
                 class="btn btn-sm btn-info text-white shadow-md flex items-center gap-1">
                👁️ <span>Lihat</span>
              </a>
              <a href="{{ route('siswa.daftar.edit', $siswa->id) }}" 
                 class="btn btn-sm btn-warning text-white shadow-md flex items-center gap-1">
                ✏️ <span>Edit</span>
              </a>
              <form action="{{ route('siswa.daftar.destroy', $siswa->id) }}" 
                    method="POST" 
                    onsubmit="return confirm('Yakin ingin menghapus data ini?')" 
                    class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-error text-white shadow-md flex items-center gap-1">
                  🗑️ <span>Hapus</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-500 py-4 col-span-full">Belum ada data siswa.</p>
      @endforelse
    </div>

    {{-- ========================= --}}
    {{-- 💻 Tampilan Desktop: Table --}}
    {{-- ========================= --}}
    <div class="hidden md:block">
      <div class="card bg-base-100 shadow-xl border border-gray-100 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
          <table class="table w-full">
            <thead class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white text-sm">
              <tr>
                <th class="text-center w-12">#</th>
                <th>Nama Lengkap</th>
                <th>NISN</th>
                <th>Asal Sekolah</th>
                <th>Status</th>
                <th class="text-center w-40">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($siswas as $siswa)
                <tr class="hover:bg-blue-50 transition duration-200">
                  <td class="text-center font-semibold text-gray-600">{{ $loop->iteration }}</td>
                  <td class="font-medium text-gray-800">{{ $siswa->nama_lengkap }}</td>
                  <td class="text-gray-700">{{ $siswa->nisn }}</td>
                  <td class="text-gray-700">{{ $siswa->asal_sekolah ?? '-' }}</td>
                  <td>
                    <span class="badge 
                      @if ($siswa->status === 'verifikasi') badge-success 
                      @elseif ($siswa->status === 'ditolak') badge-error 
                      @else badge-warning 
                      @endif">
                      {{ ucfirst($siswa->status) }}
                    </span>
                  </td>
                  <td class="flex justify-center gap-2">
                    <a href="{{ route('siswa.daftar.show', $siswa->id) }}" class="btn btn-sm btn-info text-white">👁️</a>
                    <a href="{{ route('siswa.daftar.edit', $siswa->id) }}" class="btn btn-sm btn-warning text-white">✏️</a>
                    <form action="{{ route('siswa.daftar.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" class="inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-error text-white">🗑️</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="text-center text-gray-500 py-6">Belum ada data siswa.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="mt-4 p-4">
          {{ $siswas->links('pagination::tailwind') }}
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    lucide.createIcons();
  });
</script>
@endsection
