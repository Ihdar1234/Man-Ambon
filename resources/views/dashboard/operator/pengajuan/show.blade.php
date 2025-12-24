@extends('dashboard.operator.app')

@section('content')

<div class="space-y-10">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <h1 class="text-3xl md:text-4xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Detail Pengajuan
        </h1>
        <span class="text-sm text-gray-400">Tanggal: {{ $pengajuan->created_at->format('d M Y, H:i') }}</span>
    </div>

    {{-- INFO PENGAJUAN --}}
    <div class="bg-white/70 backdrop-blur-xl shadow-xl rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow">
        <h2 class="text-2xl font-semibold mb-6">Informasi Pemohon</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="font-medium text-gray-500">Nama</p>
                <p class="text-gray-800 text-lg font-medium">{{ $pengajuan->data['nama'] ?? '-' }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-500">Email</p>
                <p class="text-gray-800 text-lg font-medium">{{ $pengajuan->data['email'] ?? '-' }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-500">Layanan</p>
                <p class="text-gray-800 text-lg font-medium">{{ $pengajuan->layanan->nama }}</p>
            </div>
            <div>
                <p class="font-medium text-gray-500">Status</p>
                <span class="badge 
                    @if($pengajuan->status=='baru') badge-info
                    @elseif($pengajuan->status=='proses') badge-warning
                    @elseif($pengajuan->status=='selesai') badge-success
                    @else badge-error @endif
                    text-lg px-4 py-2 rounded-2xl font-semibold">
                    {{ ucfirst($pengajuan->status) }}
                </span>
            </div>
        </div>
    </div>

    {{-- UPDATE STATUS --}}
    <div class="bg-white/70 backdrop-blur-xl shadow-xl rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow">
        <h2 class="text-2xl font-semibold mb-6">Update Status Pengajuan</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-2xl shadow-md animate-fadeUp">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-2xl shadow-md animate-fadeUp">
                {{ session('error') }}
            </div>
        @endif

       <form action="{{ route('operator.pengajuan.status', $pengajuan->id) }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center">
    @csrf
    <select name="status" class="select select-bordered rounded-xl w-full md:w-64" required>
        <option value="baru" @selected($pengajuan->status=='baru')>Baru</option>
        <option value="proses" @selected($pengajuan->status=='proses')>Diproses</option>
        <option value="selesai" @selected($pengajuan->status=='selesai')>Selesai</option>
        <option value="ditolak" @selected($pengajuan->status=='ditolak')>Ditolak</option>
    </select>

    <button type="submit" class="btn btn-primary rounded-xl px-6 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-600 hover:to-indigo-600 flex items-center gap-2">
        Update Status
    </button>
</form>

    </div>

    {{-- DATA PENGAJUAN NESTED + FILE --}}
    <div class="bg-white/80 backdrop-blur-xl shadow-xl rounded-3xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow">
        <h2 class="text-2xl font-semibold mb-6">Data Pengajuan</h2>

        @if(!empty($pengajuan->data) && is_array($pengajuan->data))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($pengajuan->data as $key => $value)
                    <div class="bg-gray-50/70 p-4 rounded-2xl border border-gray-200 hover:shadow-md transition-shadow flex flex-col gap-2">
                        <p class="text-gray-500 font-medium capitalize">{{ str_replace('_',' ', $key) }}</p>

                        @if(is_array($value))
                            {{-- Nested array --}}
                            <div class="ml-4 grid grid-cols-1 gap-2">
                                @foreach($value as $k => $v)
                                    <div class="p-2 border rounded-lg">
                                        <p class="font-medium text-gray-500">{{ str_replace('_',' ', $k) }}</p>
                                        @if(str_contains(strtolower($k), 'file') || str_contains(strtolower($k), 'lampiran'))
                                            <a href="{{ asset('storage/' . $v) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">{{ $v }}</a>
                                        @else
                                            <p class="text-gray-800">{{ $v }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @elseif(str_contains(strtolower($key), 'file') || str_contains(strtolower($key), 'lampiran'))
                            {{-- File --}}
                            <a href="{{ asset('storage/' . $value) }}" target="_blank" class="text-blue-600 underline hover:text-blue-800">{{ $value }}</a>
                        @else
                            <p class="text-gray-800">{{ $value }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-400">Tidak ada data pengajuan.</p>
        @endif
    </div>

</div>

@endsection
