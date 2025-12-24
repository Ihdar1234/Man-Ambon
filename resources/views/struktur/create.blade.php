@extends('backend.dashboard')

@section('content')
<div class="max-w-full sm:max-w-2xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden mt-8">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-green-500 to-teal-500 p-6">
        <h1 class="text-2xl font-extrabold text-white text-center sm:text-left">➕ Tambah Struktur</h1>
    </div>

    <div class="p-6 sm:p-8 space-y-6">

        {{-- Error --}}
        @if ($errors->any())
            <div class="p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl shadow-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('struktur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Judul --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700">Judul</label>
                <input type="text" name="judul" 
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm"
                       required>
            </div>

            {{-- Gambar --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700">Gambar</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-sm">

                {{-- Preview --}}
                <div class="mt-4 flex justify-center">
                    <img id="preview-image" class="w-48 h-48 object-cover rounded-2xl shadow-lg border border-gray-200 hidden transition-transform hover:scale-105">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                <a href="{{ route('struktur.index') }}" 
                   class="flex-1 py-3 px-6 rounded-xl bg-gray-100 text-gray-700 font-semibold shadow hover:bg-gray-200 transition-all text-center">
                   Batal
                </a>
                <button type="submit" 
                        class="flex-1 py-3 px-6 rounded-xl bg-gradient-to-r from-green-500 to-teal-500 text-white font-semibold shadow-lg hover:scale-105 transition-all">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Preview Image Script --}}
<script>
const imageInput = document.getElementById('image');
const preview = document.getElementById('preview-image');

imageInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        preview.classList.remove('hidden');
        reader.addEventListener("load", function() {
            preview.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
        preview.setAttribute("src", "");
    }
});
</script>
@endsection
