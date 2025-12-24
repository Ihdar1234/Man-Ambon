@extends('backend.dashboard')

@section('content')

<div class="w-full flex justify-center">
    <div class="max-w-3xl w-full card-premium p-6 mt-10 ml-50">

        <h2 class="text-2xl font-extrabold text-indigo-600 mb-4 text-center md:text-left">
            Tambah Artikel
        </h2>

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- Judul & Penulis --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Judul</label>
                    <input type="text" name="judul"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                           required>
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-700">Penulis</label>
                    <input type="text" name="penulis"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 transition"
                           required>
                </div>
            </div>

            {{-- Isi Artikel (no scroll) --}}
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Isi</label>
                <input id="isi" type="hidden" name="isi" value="{{ old('isi', $artikels->isi ?? '') }}">
                <trix-editor input="isi" class="border border-gray-300 rounded-lg p-2 shadow-sm focus:ring-1 focus:ring-indigo-500 transition w-full"></trix-editor>
            </div>

            {{-- Gambar --}}
            <div class="md:flex md:items-center md:gap-4">
                <div class="flex-1">
                    <label class="block mb-2 font-semibold text-gray-700">Gambar</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-1 focus:ring-indigo-500">
                </div>
                <div>
                    <img id="preview-gambar" class="w-32 h-32 object-cover rounded-lg hidden shadow-md mt-2 md:mt-0">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 justify-start">
                <button type="submit" class="btn-premium px-6 py-2">Simpan</button>
                <a href="{{ route('artikel.index') }}" class="btn-premium bg-gray-400 hover:bg-gray-500 px-6 py-2">Batal</a>
            </div>

        </form>
    </div>
</div>


<script>
const gambarInput = document.getElementById('gambar');
const preview = document.getElementById('preview-gambar');

gambarInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        preview.classList.remove('hidden');
        reader.onload = () => preview.src = reader.result;
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
        preview.src = "";
    }
});
</script>

@endsection
