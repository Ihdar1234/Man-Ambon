@extends('backend.dashboard')

@section('content')
<div class="space-y-6">
    @if(session('success'))
    <div class="p-3 bg-green-100 text-green-800 rounded-lg">{{ session('success') }}</div>
    @endif

    <!-- Judul -->
    <div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Data Siswa</h2>
    </div>

    <!-- 🔎 Tambah + Search + PerPage -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
        <!-- Kiri: Tambah + Search -->
        <div class="flex flex-col sm:flex-row sm:items-center gap-2 flex-1">
            <a href="{{ route('siswa.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 text-center w-full sm:w-auto">
                Tambah Siswa
            </a>

            <form method="GET" action="{{ route('siswa.index') }}" class="flex gap-2 flex-1">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari nama / NISN..."
                       class="flex-1 sm:w-72 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200">
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 w-full sm:w-auto">
                    Cari
                </button>
            </form>
        </div>

        <!-- Kanan: Per Page -->
        <form method="GET" action="{{ route('siswa.index') }}" class="flex-shrink-0 w-full sm:w-auto">
            <select name="per_page" onchange="this.form.submit()"
                    class="w-full sm:w-auto px-3 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5 / Halaman</option>
                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 / Halaman</option>
                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 / Halaman</option>
                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 / Halaman</option>
            </select>
        </form>
    </div>

    <!-- 📊 Tabel (Desktop) -->
    <div class="overflow-x-auto hidden md:block">
        <table class="min-w-full border-collapse bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden text-sm sm:text-base">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Mapel</th>
                    <th class="px-4 py-2 text-left">Hobi</th>
                    <th class="px-4 py-2 text-left">JK</th>
                    <th class="px-4 py-2 text-left">NISN</th>
                    <th class="px-4 py-2 text-left">NO HP</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siswas as $siswa)
                <tr class="border-t border-gray-200 dark:border-gray-700">
                    <td class="px-4 py-2">{{ $siswa->nama }}</td>
                    <td class="px-4 py-2">{{ $siswa->mapel }}</td>
                    <td class="px-4 py-2">{{ $siswa->hoby }}</td>
                    <td class="px-4 py-2">{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    <td class="px-4 py-2">{{ $siswa->nisn }}</td>
                    <td class="px-4 py-2">{{ $siswa->no_hp }}</td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="{{ route('siswa.edit', $siswa->slug) }}" class="inline-block text-yellow-600 hover:text-yellow-800">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('siswa.destroy', $siswa->slug) }}" method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center py-4">Belum ada data siswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- 📱 Card View (Mobile) -->
    <div class="grid gap-4 md:hidden">
        @forelse ($siswas as $siswa)
        <div class="border rounded-lg p-4 bg-white dark:bg-gray-800 shadow">
            <div class="font-semibold text-lg text-gray-800 dark:text-gray-200">{{ $siswa->nama }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300">Mapel: {{ $siswa->mapel }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300">Hobi: {{ $siswa->hoby }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300">JK: {{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300">NISN: {{ $siswa->nisn }}</div>
            <div class="text-sm text-gray-600 dark:text-gray-300">No HP: {{ $siswa->no_hp }}</div>
            <div class="mt-2 flex gap-2">
                <a href="{{ route('siswa.edit', $siswa->slug) }}" class="text-yellow-600 hover:text-yellow-800">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <form action="{{ route('siswa.destroy', $siswa->slug) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <p class="text-center text-gray-600 dark:text-gray-300">Belum ada data siswa</p>
        @endforelse
    </div>

    <!-- 📌 Pagination -->
    <div class="mt-4 flex flex-col md:flex-row justify-between items-center gap-3">
        <div class="text-sm text-gray-600 dark:text-gray-300 text-center md:text-left">
            Menampilkan <span class="font-semibold">{{ $siswas->firstItem() }}</span>
            sampai <span class="font-semibold">{{ $siswas->lastItem() }}</span>
            dari <span class="font-semibold">{{ $siswas->total() }}</span> data
        </div>
        <div class="flex justify-center w-full md:w-auto">
           {{ $siswas->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
