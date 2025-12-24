@extends('dashboard.operator.app')

@section('content')
<div class="bg-white shadow-xl rounded-3xl border border-gray-100 p-1 sm:p-2 md:p-8 overflow-x-auto max-w-sm sm:max-w-sm md:max-w-full mx-auto md:mx-0">
        <h2 class="text-xs sm:text-sm md:text-xl font-semibold text-gray-800 mb-2 md:mb-6 text-center">
            Pengajuan Terbaru
        </h2>

        <table class="table table-zebra w-full min-w-[300px] text-xs sm:text-xs md:text-base">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>Layanan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $item)
                <tr class="hover:bg-gray-50 transition-colors text-xs sm:text-xs md:text-base">
                    <td>{{ $i + 1 }}</td>
                    <td class="font-medium truncate">{{ $item->data['nama'] ?? 'Tanpa Nama' }}</td>
                    <td class="truncate">{{ $item->layanan->nama }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                    <td>
                        <span class="badge @if($item->status=='baru') badge-info @elseif($item->status=='proses') badge-warning @elseif($item->status=='selesai') badge-success @else badge-error @endif text-xs sm:text-xs md:text-base">
                            {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="flex flex-wrap gap-1 sm:gap-1 justify-start">
                        <a href="{{ route('dashboard.operator.pengajuan.show', $item->id) }}" class="btn btn-xs sm:btn-xs md:btn-sm bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-600 hover:to-indigo-600 text-white rounded px-1 sm:px-2 md:px-4 flex items-center justify-center">
                            Detail
                        </a>
                        <form action="{{ route('operator.pengajuan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
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
    </div>
@endsection
