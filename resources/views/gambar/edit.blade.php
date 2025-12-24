@extends('backend.dashboard')

@section('content')
<div class="max-w-full sm:max-w-3xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden mt-8">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6">
        <h1 class="text-2xl font-extrabold text-white text-center sm:text-left">✏️ Edit Gambar</h1>
    </div>

    <div class="p-6 sm:p-8 space-y-6">
        {{-- Error --}}
        @if ($errors->any())
            <div class="p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('gambar.update', $galeri->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" 
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-sm">
            </div>

            {{-- Deskripsi --}}
            <div>
                <label class="font-semibold mb-1 block text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" 
                          class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-sm resize-none">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>

            {{-- Gambar --}}
            <div>
                <label class="font-semibold mb-2 block text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all shadow-sm">

                {{-- Preview --}}
                <div class="mt-4 flex justify-center">
                    @if($galeri->gambar && file_exists(public_path($galeri->gambar)))
                        <img id="preview-gambar" src="{{ asset($galeri->gambar) }}" 
                             class="w-48 h-48 object-cover rounded-2xl shadow-lg border border-gray-200 transition-all hover:scale-105">
                    @else
                        <img id="preview-gambar" class="w-48 h-48 object-cover rounded-2xl shadow-lg border border-gray-200 hidden">
                    @endif
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                <button type="submit" 
                        class="flex-1 py-3 px-6 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-lg hover:scale-105 transition-all flex items-center justify-center gap-2">
                    <i class="bi bi-save"></i> Update
                </button>
                <a href="{{ route('gambar.index') }}" 
                   class="flex-1 py-3 px-6 rounded-xl bg-gray-100 text-gray-700 font-semibold shadow hover:bg-gray-200 transition-all flex items-center justify-center gap-2">
                   <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>

{{-- Optional: Preview script --}}
<script>
document.getElementById('gambar').addEventListener('change', function(e){
    const [file] = this.files;
    if(file){
        const preview = document.getElementById('preview-gambar');
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    }
});
</script>
@endsection
