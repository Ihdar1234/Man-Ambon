@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-100 py-16 px-6">

  {{-- Header --}}
  <div class="text-center mb-12">
    <h1 class="text-4xl font-bold text-blue-700 mb-2">📊 Survei Kepuasan Layanan Sekolah</h1>
    <p class="text-gray-600 max-w-2xl mx-auto">
      Pilih layanan yang ingin Anda nilai dan bantu kami meningkatkan kualitas pelayanan sekolah.
    </p>
  </div>

  {{-- Pilihan Layanan --}}
  <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 w-full max-w-5xl">
    @php
      $layanan = [
          'Administrasi' => '💼',
          'Fasilitas' => '🏫',
          'Kebersihan' => '🧹',
          'Guru dan Pengajaran' => '👩‍🏫',
      ];
    @endphp

    @foreach ($layanan as $nama => $icon)
      <button onclick="openSurvey('{{ $nama }}')"
        class="group card bg-white/90 backdrop-blur p-8 rounded-2xl shadow-lg border hover:shadow-2xl hover:scale-[1.03] transition-all duration-300 text-center">
        <div class="text-5xl mb-3">{{ $icon }}</div>
        <h2 class="font-bold text-lg text-gray-800 group-hover:text-blue-700 transition">{{ $nama }}</h2>
        <p class="text-sm text-gray-500 mt-1">Klik untuk isi survei</p>
      </button>
    @endforeach
  </div>

{{-- Modal Form --}}
<dialog id="survey_modal" class="modal">
  <div class="modal-box w-full max-w-3xl bg-white/90 backdrop-blur-lg rounded-3xl shadow-2xl p-8 md:p-10 border border-gray-100 relative overflow-hidden">
    
    {{-- Header --}}
    <div class="text-center mb-6">
      <h2 id="modalTitle" class="text-3xl md:text-4xl font-extrabold text-blue-700 flex items-center justify-center gap-2">
        📝 Survei Layanan
      </h2>
      <p class="text-gray-500 text-sm md:text-base mt-2">Isi setiap pertanyaan dengan jujur untuk membantu kami meningkatkan layanan.</p>
    </div>

    {{-- Form --}}
    <form id="surveyForm" method="POST" action="{{ route('survei.store') }}" class="space-y-6" onsubmit="submitSurvey(event)">
      @csrf
      <input type="hidden" name="layanan" id="layananInput">

      {{-- Nama & Email --}}
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="label font-semibold text-gray-700">Nama <span class="text-red-500">*</span></label>
          <input type="text" name="nama" class="input input-bordered w-full focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" placeholder="Nama lengkap" required>
        </div>
        <div>
          <label class="label font-semibold text-gray-700">Email (opsional)</label>
          <input type="email" name="email" class="input input-bordered w-full focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" placeholder="email@example.com">
        </div>
      </div>

      {{-- Pertanyaan --}}
      <div id="pertanyaanContainer" class="space-y-4 max-h-64 md:max-h-72 overflow-y-auto pr-2 custom-scroll border rounded-lg p-4 bg-gray-50">
        {{-- Pertanyaan akan dimasukkan secara dinamis --}}
      </div>

      {{-- Saran --}}
      <div>
        <label class="label font-semibold text-gray-700">Saran / Masukan</label>
        <textarea name="saran" class="textarea textarea-bordered w-full resize-none focus:ring-2 focus:ring-blue-300 focus:border-transparent transition" rows="3" placeholder="Tulis saran Anda di sini..."></textarea>
      </div>

      {{-- Tombol Aksi --}}
<div class="sticky bottom-0 left-0 bg-white pt-4 border-t border-gray-200 flex flex-col md:flex-row justify-end gap-3 md:gap-4 mt-6 z-10 px-2 md:px-0">
  {{-- Batal --}}
  <button type="button" 
          class="btn btn-ghost text-gray-700 bg-gray-100/50 hover:bg-gray-200 transition transform hover:scale-105 shadow-sm rounded-lg px-4 py-2 md:px-6 md:py-2.5"
          onclick="document.getElementById('survey_modal').close()">
    ❌ Batal
  </button>

  {{-- Kirim Survei --}}
  <button type="submit" 
          class="btn btn-primary text-white bg-blue-600 hover:bg-blue-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 hover:scale-105 rounded-lg px-4 py-2 md:px-6 md:py-2.5">
    🚀 Kirim Survei
  </button>
</div>

    </form>
  </div>

  {{-- Backdrop --}}
  <form method="dialog" class="modal-backdrop bg-black/40 backdrop-blur-sm">
    {{-- Klik area gelap untuk menutup --}}
  </form>
</dialog>

{{-- Custom Scrollbar --}}




</div>

<style>
.custom-scroll::-webkit-scrollbar {
  width: 8px;
}
.custom-scroll::-webkit-scrollbar-thumb {
  background: rgba(37, 99, 235, 0.4);
  border-radius: 6px;
}
.custom-scroll::-webkit-scrollbar-thumb:hover {
  background: rgba(37, 99, 235, 0.6);
}
</style>

<script>
const pertanyaanMap = {
  'Administrasi': [
    'Kecepatan pelayanan administrasi',
    'Kejelasan informasi dan prosedur',
    'Keramahan staf administrasi',
    'Kemudahan akses layanan administrasi',
  ],
  'Fasilitas': [
    'Kebersihan ruang kelas dan lingkungan',
    'Kenyamanan ruang belajar',
    'Kelengkapan sarana dan prasarana',
    'Kondisi toilet dan area umum',
  ],
  'Kebersihan': [
    'Kebersihan lingkungan sekolah secara umum',
    'Ketersediaan tempat sampah dan pengelolaannya',
    'Kebersihan ruang kelas',
    'Perawatan taman dan halaman sekolah',
  ],
  'Guru dan Pengajaran': [
    'Kemampuan guru dalam menjelaskan materi',
    'Kedisiplinan guru dalam mengajar',
    'Interaksi guru dengan siswa',
    'Kesesuaian materi dengan kurikulum',
  ],
};

function openSurvey(layanan) {
  document.getElementById('modalTitle').innerText = `📝 Survei Layanan ${layanan}`;
  document.getElementById('layananInput').value = layanan;
  const container = document.getElementById('pertanyaanContainer');
  container.innerHTML = '';

  pertanyaanMap[layanan].forEach((p, i) => {
    container.innerHTML += `
      <div class="p-4 border rounded-xl bg-gray-50 hover:bg-blue-50 transition">
        <label class="block font-semibold text-gray-700 mb-2">${i + 1}. ${p}</label>
        <div class="flex justify-between">
          ${[1,2,3,4,5].map(n => `
            <label class="flex flex-col items-center cursor-pointer">
              <input type="radio" name="jawaban[${i}]" value="${n}" class="radio checked:bg-blue-500" required>
              <span class="text-sm mt-1">${n}</span>
            </label>
          `).join('')}
        </div>
      </div>
    `;
  });

  survey_modal.showModal();
}

function submitSurvey(event) {
  event.preventDefault();
  const form = document.getElementById('surveyForm');
  const data = new FormData(form);

  fetch("{{ route('survei.store') }}", {
    method: "POST",
    headers: { "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content },
    body: data,
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      alert('✅ Terima kasih! Survei Anda telah dikirim.');
      survey_modal.close();
      form.reset();
    } else {
      alert('❌ Gagal mengirim survei, coba lagi.');
    }
  })
  .catch(err => {
    console.error(err);
    alert('Terjadi kesalahan saat mengirim survei.');
  });
}
</script>
@endsection
