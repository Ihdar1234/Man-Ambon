@extends('siswa.layouts.siswa')

@section('content')
<div class="p-6">
  <h2 class="text-xl font-semibold mb-4">Upload Dokumen Wajib</h2>

  <form action="{{ route('siswa.dokumen.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- Ijazah --}}
    <div>
      <label class="label font-semibold">Ijazah (PDF)</label>
      <input type="file" name="ijazah" accept="application/pdf" class="file-input file-input-bordered w-full" onchange="previewFile(this, 'ijazah-preview')">
      <div id="ijazah-preview" class="mt-3"></div>
    </div>

    {{-- Kartu Keluarga --}}
    <div>
      <label class="label font-semibold">Kartu Keluarga (JPG/JPEG/PNG)</label>
      <input type="file" name="kk" accept="image/*" class="file-input file-input-bordered w-full" onchange="previewFile(this, 'kk-preview')">
      <div id="kk-preview" class="mt-3"></div>
    </div>

    {{-- Foto --}}
    <div>
      <label class="label font-semibold">Pas Foto (JPG/JPEG/PNG)</label>
      <input type="file" name="foto" accept="image/*" class="file-input file-input-bordered w-full" onchange="previewFile(this, 'foto-preview')">
      <div id="foto-preview" class="mt-3"></div>
    </div>

    {{-- Raport --}}
    <div>
      <label class="label font-semibold">Raport (PDF)</label>
      <input type="file" name="raport" accept="application/pdf" class="file-input file-input-bordered w-full" onchange="previewFile(this, 'raport-preview')">
      <div id="raport-preview" class="mt-3"></div>
    </div>

    <button class="btn btn-primary mt-4">Simpan Dokumen</button>
  </form>
</div>

<script>
  function previewFile(input, previewId) {
    const file = input.files[0];
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';

    if (!file) return;

    const reader = new FileReader();
    reader.onload = e => {
      if (file.type.includes('image')) {
        preview.innerHTML = `<img src="${e.target.result}" class="w-40 h-40 object-cover rounded-md shadow">`;
      } else if (file.type.includes('pdf')) {
        preview.innerHTML = `<div class="p-4 bg-gray-100 rounded-md shadow text-sm text-center">
            <i class="fa-solid fa-file-pdf text-red-500 text-3xl mb-2"></i><br>${file.name}
        </div>`;
      }
    };
    reader.readAsDataURL(file);
  }
</script>
@endsection
