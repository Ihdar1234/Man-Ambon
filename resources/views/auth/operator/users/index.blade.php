@extends('dashboard.operator.app')

@section('content')
<div class="space-y-4 md:space-y-10 p-2 md:p-6 max-w-full">

    {{-- TITLE --}}
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-1 md:gap-0">
        <h1 class="text-sm sm:text-base md:text-3xl lg:text-4xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Daftar User
        </h1>
        <span class="text-xs sm:text-sm md:text-base text-gray-400 mt-1 md:mt-0">
            Total: {{ $users->count() }}
        </span>
    </div>

    {{-- FILTER --}}
    <form method="GET" class="flex flex-col sm:flex-row gap-2 items-stretch mb-4 md:mb-6 max-w-sm sm:max-w-sm md:max-w-full mx-auto md:mx-0">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email"
               class="input input-bordered rounded-xl shadow-sm border-gray-300 flex-1 text-xs sm:text-sm md:text-base" />

        <select name="role" class="select select-bordered rounded-xl shadow-sm border-gray-300 text-xs sm:text-sm md:text-base">
            <option value="">Semua Role</option>
            <option value="siswa" @selected(request('role')=='siswa')>Siswa</option>
            <option value="masyarakat" @selected(request('role')=='masyarakat')>Masyarakat</option>
        </select>

        <button class="btn btn-primary rounded-xl px-2 sm:px-4 md:px-6 shadow-sm bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-500 hover:to-indigo-500 transition-all text-xs sm:text-sm md:text-base flex-1 sm:flex-none mt-1 sm:mt-0">
            Filter
        </button>
    </form>

    {{-- TABEL USER --}}
    <div class="bg-white shadow-xl rounded-3xl border border-gray-100 p-1 sm:p-2 md:p-8 overflow-x-auto max-w-sm sm:max-w-sm md:max-w-full mx-auto md:mx-0">
        <h2 class="text-xs sm:text-sm md:text-xl font-semibold text-gray-800 mb-2 md:mb-6 text-center">
            Daftar User
        </h2>

        <table class="table table-zebra w-full min-w-[320px] text-xs sm:text-xs md:text-base">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i => $user)
                <tr class="hover:bg-gray-50 transition-colors text-xs sm:text-xs md:text-base">
                    <td>{{ $i + 1 }}</td>
                    <td class="font-medium truncate">{{ $user->name }}</td>
                    <td class="truncate">{{ $user->email }}</td>
                    <td>
                        <span class="badge @if($user->role=='siswa') badge-info @elseif($user->role=='masyarakat') badge-success @else badge-warning @endif text-xs sm:text-xs md:text-base">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="flex flex-wrap gap-1 sm:gap-1 justify-start">
                        <a href="{{ route('dashboard.operator.users.show', $user->id) }}" class="btn btn-xs sm:btn-xs md:btn-sm bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-600 hover:to-indigo-600 text-white rounded px-1 sm:px-2 md:px-4 flex items-center justify-center">
                            Detail
                        </a>
                        <form action="{{ route('dashboard.operator.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs sm:btn-xs md:btn-sm btn-error text-white rounded px-1 sm:px-2 md:px-4 flex items-center justify-center">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- PAGINASI --}}
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>

</div>
@endsection
