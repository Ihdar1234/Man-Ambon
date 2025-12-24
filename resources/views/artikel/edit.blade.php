@extends('backend.dashboard')

@section('content')
<div class="p-6 md:p-10">
    <div class="max-w-3xl mx-auto card-premium p-8">

        <h2 class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-6">
            Edit Artikel
        </h2>

        {{-- ERROR --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded-xl shadow-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('artikel.update', $artikel->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6 w-full">
            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $artikel->judul) }}" class="input-premium w-full" required>
            </div>

            {{-- PENULIS --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis', $artikel->penulis) }}" class="input-premium w-full" required>
            </div>

            {{-- TRIX --}}
            <div>
                <label class="block mb-1 font-semibold text-gray-700">Isi Artikel</label>
                <input id="isi" type="hidden" name="isi" value="{{ old('isi', $artikel->isi) }}">
                <trix-editor input="isi" class="trix-content border border-gray-300 rounded-xl p-2 shadow-sm bg-white w-full"></trix-editor>
            </div>

            {{-- GAMBAR --}}
            <div>
                <label class="block mb-2 font-semibold text-gray-700">Gambar</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" class="input-premium w-full">
                <div class="mt-3">
                    @if($artikel->gambar && file_exists(public_path($artikel->gambar)))
                        <img id="preview-gambar" src="{{ asset($artikel->gambar) }}" class="w-full max-w-xs h-auto object-cover rounded-xl shadow">
                    @else
                        <img id="preview-gambar" class="w-full max-w-xs h-auto object-cover rounded-xl shadow hidden">
                    @endif
                </div>
            </div>

            {{-- BUTTON --}}
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="btn-premium px-6 py-2">Update Artikel</button>
                <a href="{{ route('artikel.index') }}" class="btn-premium bg-gray-400 hover:bg-gray-500 px-6 py-2">Batal</a>
            </div>

        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/2.1.0/trix.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/2.1.0/trix.umd.min.js"></script>
<script>
    const gambarInput = document.getElementById('gambar');
    const preview = document.getElementById('preview-gambar');

    gambarInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            preview.classList.remove('hidden');
            reader.onload = () => preview.src = reader.result;
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
