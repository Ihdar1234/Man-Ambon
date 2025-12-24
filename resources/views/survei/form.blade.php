@extends('layouts.app')

@section('content')
<div class="mt-24 min-h-screen bg-gray-50 dark:bg-gray-900 pb-20">
  <div class="max-w-3xl mx-auto px-4 md:px-6">
    {{-- HEADER --}}
    <div class="text-center mb-8">
      <h1 class="text-3xl md:text-4xl font-bold text-primary mb-2">📝 Survei Kepuasan Layanan Publik</h1>
      <p class="text-gray-500 dark:text-gray-300">Silakan isi survei berikut untuk membantu kami meningkatkan kualitas pelayanan.</p>
    </div>

    {{-- FORM --}}
    <div class="card bg-base-200 shadow-md p-8 rounded-2xl">
      <form id="surveiForm" action="{{ route('survei.store') }}" method="POST">
        @csrf

        {{-- Pilihan Layanan --}}
        <div class="mb-6">
          <label class="block text-lg font-semibold mb-2">Pilih Jenis Layanan</label>
          <select name="layanan_id" class="select select-bordered w-full" required>
            <option value="">-- Pilih Layanan --</option>
            @foreach ($layanan as $item)
              <option value="{{ $item->id }}">{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>

        {{-- Penilaian --}}
        @php
          $kategori = ['kecepatan' => 'Kecepatan Layanan', 'keramahan' => 'Keramahan Petugas', 'kejelasan' => 'Kejelasan Informasi', 'kepuasan' => 'Kepuasan Umum'];
        @endphp
        @foreach ($kategori as $key => $label)
          <div class="mb-6">
            <label class="block font-semibold mb-2">{{ $label }}</label>
            <div class="rating">
              @for ($i = 1; $i <= 5; $i++)
                <input type="radio" name="{{ $key }}" value="{{ $i }}" class="mask mask-star-2 bg-yellow-400" required />
              @endfor
            </div>
          </div>
        @endforeach

        {{-- Saran --}}
        <div class="mb-6">
          <label class="block font-semibold mb-2">Saran dan Masukan</label>
          <textarea name="saran" class="textarea textarea-bordered w-full" rows="4" placeholder="Tuliskan saran Anda..."></textarea>
        </div>

        {{-- Tombol --}}
        <div class="text-center">
          <button type="submit" class="btn btn-primary px-8">Kirim Survei</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- SCRIPT --}}
<script>
document.getElementById('surveiForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  const response = await fetch(this.action, {
    method: 'POST',
    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
    body: formData
  });
  const result = await response.json();
  if (result.success) {
    alert('Terima kasih atas partisipasi Anda!');
    this.reset();
  }
});
</script>
@endsection
