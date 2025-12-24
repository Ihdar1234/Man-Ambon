@extends('backend.dashboard')

@section('content')
<div class="max-w-3xl mx-auto card-premium mt-6 p-6 md:p-8">
    <h1 class="text-2xl md:text-3xl font-bold mb-6 text-gray-800 dark:text-white text-center md:text-left">📸 Tambah Gambar</h1>

    {{-- Notifikasi error --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-300 text-red-700 rounded-xl shadow-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('gambar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6">

            {{-- Judul --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700 dark:text-gray-200">Judul</label>
                <input type="text" name="judul" id="judul"
                       class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700 dark:text-gray-200">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition resize-none"></textarea>
            </div>

            {{-- Gambar --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700 dark:text-gray-200">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*"
                       class="w-full border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200 rounded-xl px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                <div class="mt-4 flex justify-center">
                    <img id="preview-gambar" class="w-48 h-48 md:w-60 md:h-60 object-cover rounded-xl shadow-md hidden">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col md:flex-row gap-3 mt-6 justify-center md:justify-start">
                <button type="submit" class="btn-premium flex items-center justify-center gap-2 px-6 py-3 w-full md:w-auto">
                    <i class="bi bi-save"></i> Simpan
                </button>
                <a href="{{ route('gambar.index') }}" class="btn-premium bg-gray-400 hover:bg-gray-500 flex items-center justify-center gap-2 px-6 py-3 w-full md:w-auto">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

        </div>
    </form>
</div>

<script>
    // Preview gambar sebelum upload
    const gambarInput = document.getElementById('gambar');
    const preview = document.getElementById('preview-gambar');

    gambarInput.addEventListener('change', function() {
        const file = this.files[0];
        if(file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        } else {
            preview.classList.add('hidden');
        }
    });
</script>
@endsection
