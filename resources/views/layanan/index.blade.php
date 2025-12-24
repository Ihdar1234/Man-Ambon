@extends('layanan.app')

@section('content')
 @if(session('success'))
    <div class="p-3 mb-4 bg-green-100 text-green-800 rounded-lg shadow-md animate-fadeUp">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="p-3 mb-4 bg-red-100 text-red-800 rounded-lg shadow-md animate-fadeUp">{{ session('error') }}</div>
  @endif

  <!-- FORM PENGAJUAN DINAMIS -->
  <section class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 animate-fadeUp">
    <div class="flex items-start justify-between gap-4">
      <div>
        <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Pengajuan Cepat</h2>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Isi form singkat untuk memulai permohonan.</p>
      </div>
      <span class="badge badge-outline">Proses instan</span>
    </div>

   <div class="max-w-4xl mx-auto mt-32">

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    {{-- Dropdown layanan --}}
    <div class="mb-6">
        <label class="font-semibold">Pilih Jenis Layanan</label>
        <select id="layananSelect" class="select select-bordered w-full mt-2">
            <option value="">-- Pilih Layanan --</option>

            @foreach ($layanans as $l)
                <option value="{{ $l->id }}"
                    data-fields="{{ json_encode($l->fields) }}">
                    {{ $l->nama }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Form Dinamis --}}
    <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data"
          class="p-6 rounded-xl shadow bg-white" id="formDinamis">

        @csrf
        <input type="hidden" name="layanan_id" id="layanan_id">

        <div id="dynamicFields"></div>

      <button class="btn btn-primary w-full mt-4 hidden" id="btnSubmit">
    Kirim Pengajuan
</button>
    </form>
</div>

  </section>

  <!-- SERVICE LIST -->
  <section id="layanan" class="space-y-4 animate-fadeUp">
    <div class="flex flex-wrap justify-between items-center mb-4 gap-4">
      <h3 class="text-2xl font-bold">Layanan Unggulan</h3>
      <div class="flex flex-wrap gap-3 items-center">
        <input id="serviceSearch" type="search" placeholder="Cari layanan..." class="input input-sm input-bordered w-52 md:w-72"/>
        <select id="filterCategory" class="select select-bordered select-sm w-44">
          <option value="">Semua Kategori</option>
          <option value="akademik">Akademik / Pendidikan</option>
          <option value="administratif">Administratif / Legal</option>
          <option value="umum">Umum / Publik</option>
          <option value="khusus">Khusus Madrasah</option>
        </select>
      </div>
    </div>

    <div id="servicesGrid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5"></div>
  </section>

  <!-- INFO -->
  <section id="informasi" class="bg-white dark:bg-gray-800 rounded-xl border p-4 shadow-sm animate-fadeUp">
    <h4 class="font-semibold text-gray-700 dark:text-gray-200">Informasi Penting</h4>
    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Pengumuman dan prosedur layanan dapat dilihat pada detail setiap layanan. Pastikan data yang diinput valid untuk mempercepat proses.</p>
  </section>

@endsection
