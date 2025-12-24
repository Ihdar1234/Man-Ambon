@extends('siswa.layouts.siswa')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-6 mt-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Edit Dokumen</h2>

    <form action="{{ route('siswa.dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="font-semibold">Judul Dokumen</label>
            <input type="text" name="judul" value="{{ old('judul', $dokumen->judul) }}" class="input input-bordered w-full" required>
        </div>

        <div>
            <label class="font-semibold">Keterangan (Opsional)</label>
            <textarea name="keterangan" class="textarea textarea-bordered w-full">{{ old('keterangan', $dokumen->keterangan) }}</textarea>
        </div>

        <div>
            <label class="font-semibold">File Lama</label>
            <div class="flex flex-wrap gap-3 mt-2">
                @foreach (json_decode($dokumen->files ?? '[]', true) as $file)
                    @php $ext = pathinfo($file, PATHINFO_EXTENSION); @endphp
                    @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                        <img src="{{ asset('storage/' . $file) }}" class="w-32 h-32 object-cover rounded-lg shadow" />
                    @elseif ($ext === 'pdf')
                        <embed src="{{ asset('storage/' . $file) }}" class="w-32 h-32 border rounded-lg" />
                    @endif
                @endforeach
            </div>
        </div>

        <div>
            <label class="font-semibold">Upload File Baru (Opsional)</label>
            <input type="file" name="files[]" id="fileInput" class="file-input file-input-bordered w-full" multiple>
        </div>

        <div id="preview" class="flex flex-wrap gap-4 mt-4"></div>

        <div class="text-center">
            <button class="btn btn-primary">Perbarui</button>
            <a href="{{ route('siswa.dokumen.index') }}" class="btn btn-ghost">Batal</a>
        </div>
    </form>
</div>

<script>
const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('preview');

fileInput.addEventListener('change', function() {
    preview.innerHTML = '';
    Array.from(this.files).forEach(file => {
        const reader = new FileReader();
        reader.onload = e => {
            let element;
            if (file.type.includes('image')) {
                element = document.createElement('img');
                element.src = e.target.result;
                element.className = "w-32 h-32 object-cover rounded-lg shadow";
            } else if (file.type.includes('pdf')) {
                element = document.createElement('embed');
                element.src = e.target.result;
                element.className = "w-32 h-32 border rounded-lg";
            }
            preview.appendChild(element);
        };
        reader.readAsDataURL(file);
    });
});
</script>
@endsection
