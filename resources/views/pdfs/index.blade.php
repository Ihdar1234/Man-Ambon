@extends('backend.dashboard')

@section('content')
<section class="pt-24 pb-20 bg-gray-50 dark:bg-gray-900 min-h-screen">
  <div class="max-w-6xl mx-auto px-6">
    <div class="text-center mb-12">
      <h1 class="text-4xl font-extrabold text-emerald-600 dark:text-emerald-400 drop-shadow-md">
        📄 Daftar File PDF
      </h1>
      <p class="text-gray-500 dark:text-gray-300 mt-2">Klik tombol untuk membuka file di Google Drive</p>
      <div class="w-28 h-1.5 bg-emerald-500 mx-auto mt-3 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      @forelse ($pdfs as $pdf)
        <div class="card bg-white dark:bg-gray-800 shadow-md hover:shadow-xl transition-all duration-500 rounded-2xl overflow-hidden">
          <div class="card-body">
            <h2 class="card-title text-lg font-semibold text-emerald-700 dark:text-emerald-300">
              {{ $pdf->judul }}
            </h2>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
              Slug: {{ $pdf->slug }}
            </p>

            <a href="{{ route('pdfs.drive', $pdf->slug) }}" target="_blank"
               class="btn bg-emerald-600 hover:bg-emerald-700 text-white w-full">
               👁️ Buka di Google Drive
            </a>
          </div>
        </div>
      @empty
        <p class="text-center text-gray-500 dark:text-gray-300 col-span-3">Belum ada file PDF.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
