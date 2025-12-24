@extends('siswa.layouts.siswa')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 p-4 sm:p-6">
  <div class="max-w-7xl mx-auto space-y-8">

    {{-- 🎓 Header --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-3">
      <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-indigo-700 flex items-center gap-2">
          <i data-lucide="graduation-cap" class="w-6 h-6 sm:w-7 sm:h-7"></i>
          Dashboard Siswa
        </h1>
        <p class="text-gray-500 text-sm sm:text-base mt-1">
          Selamat datang kembali, <strong>{{ Auth::user()->name }}</strong> 👋
        </p>
      </div>

      <a href="{{ route('siswa.dokumen.index') }}"
         class="btn btn-primary shadow-md w-full sm:w-auto flex justify-center gap-2">
        <i data-lucide="folder-open" class="w-4 h-4"></i>
        Kelola Dokumen
      </a>
    </div>

    {{-- 🧭 Statistik Card --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
      @php
        $cards = [
          ['icon' => 'file-text', 'label' => 'Jumlah Dokumen', 'value' => $totalDokumen ?? 0, 'color' => 'indigo'],
          ['icon' => 'check-circle-2', 'label' => 'Status Verifikasi', 'value' => ucfirst($status ?? 'menunggu'), 'color' => 'green'],
          ['icon' => 'bell', 'label' => 'Notifikasi Baru', 'value' => $notifikasiBaru ?? 0, 'color' => 'yellow'],
          ['icon' => 'book-open', 'label' => 'Mapel Terdaftar', 'value' => $totalMapel ?? 0, 'color' => 'blue']
        ];
      @endphp

      @foreach ($cards as $card)
      <div class="card bg-white shadow-lg border border-gray-100 hover:-translate-y-1 transition-all duration-300">
        <div class="card-body flex items-center gap-4">
          <div class="p-3 bg-{{ $card['color'] }}-100 rounded-xl">
            <i data-lucide="{{ $card['icon'] }}" class="w-6 h-6 text-{{ $card['color'] }}-600"></i>
          </div>
          <div>
            <h3 class="text-gray-600 text-sm sm:text-base">{{ $card['label'] }}</h3>
            <p class="text-xl sm:text-2xl font-semibold text-{{ $card['color'] }}-700">{{ $card['value'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    {{-- 📊 Grafik Data --}}
    <div class="card bg-white shadow-xl border border-gray-100">
      <div class="card-body">
        <h2 class="card-title text-indigo-700 flex items-center gap-2">
          <i data-lucide="bar-chart-3" class="w-5 h-5"></i> Statistik Aktivitas
        </h2>
        <div class="mt-4 overflow-x-auto">
          <canvas id="activityChart" class="w-full max-w-full"></canvas>
        </div>
      </div>
    </div>

    {{-- 📨 Notifikasi Terbaru --}}
    <div class="card bg-white shadow-xl border border-gray-100">
      <div class="card-body">
        <h2 class="card-title text-indigo-700 flex items-center gap-2">
          <i data-lucide="bell-ring" class="w-5 h-5"></i> Notifikasi Terbaru
        </h2>

        <ul class="divide-y mt-4">
          @forelse ($notifikasis ?? [] as $notif)
            <li class="py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 sm:gap-3">
              <div class="flex items-center gap-3">
                <i data-lucide="info" class="w-5 h-5 text-indigo-500"></i>
                <span class="text-gray-700 text-sm sm:text-base">{{ $notif->pesan }}</span>
              </div>
              <span class="text-xs text-gray-400">{{ $notif->created_at->diffForHumans() }}</span>
            </li>
          @empty
            <p class="text-gray-500 text-sm">Belum ada notifikasi terbaru.</p>
          @endforelse
        </ul>
      </div>
    </div>

  </div>
</div>

{{-- 📈 ChartJS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('activityChart');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
      datasets: [{
        label: 'Aktivitas Siswa',
        data: [10, 25, 18, 30, 20, 35],
        borderColor: '#4f46e5',
        backgroundColor: 'rgba(79,70,229,0.1)',
        fill: true,
        tension: 0.4,
        pointRadius: 4,
        pointHoverRadius: 6
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: { ticks: { color: '#4b5563' } },
        y: { beginAtZero: true, ticks: { color: '#4b5563' } }
      },
      plugins: {
        legend: { labels: { color: '#374151' } }
      }
    }
  });

  lucide.createIcons();
</script>
@endsection
