@extends('backend.dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Visi/Misi</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('visi-misi.update', $visiMisi->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-4">
            {{-- Judul --}}
            <div>
                <label class="font-semibold mb-1 block">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $visiMisi->judul) }}" 
                       class="w-full border-b-2 border-gray-300 focus:border-blue-500 focus:outline-none py-2 px-1 rounded transition-all">
            </div>

            {{-- Gambar --}}
            <div>
                <label class="font-semibold mb-1 block">Gambar</label>
                <input type="file" name="image" id="image" accept="image/*" 
                       class="w-full border-b-2 border-gray-300 focus:border-blue-500 focus:outline-none py-2 px-1 rounded transition-all">
                
                {{-- Preview --}}
                <div class="mt-3">
                    @if($visiMisi->image && file_exists(public_path('storage/' . $visiMisi->image)))
                        <img id="preview-image" src="{{ asset('storage/' . $visiMisi->image) }}" class="w-48 h-48 object-cover rounded-md">
                    @else
                        <img id="preview-image" class="w-48 h-48 object-cover rounded-md hidden">
                    @endif
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 mt-4">
                <button type="submit" class="btn btn-primary flex items-center gap-2"><i class="bi bi-save"></i> Update</button>
                <a href="{{ route('visi-misi.index') }}" class="btn btn-secondary flex items-center gap-2"><i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </form>
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
        }
    });
</script>
@endsection
