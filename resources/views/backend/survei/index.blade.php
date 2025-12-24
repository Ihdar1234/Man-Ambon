@extends('backend.dashboard')

@section('content')
<div class="container mx-auto p-8">
  {{-- Header --}}
  <div class="text-center mb-8">
    <h1 class="text-3xl font-bold text-primary mb-2">📊 Dashboard Survei Kepuasan Publik</h1>
    <p class="text-gray-600">Rekap hasil survei berdasarkan jenis layanan</p>
  </div>

  {{-- Grafik --}}
  <div class="card bg-base-200 shadow-md p-8 rounded-2xl mb-10">
    <canvas id="surveiChart" height="120"></canvas>
  </div>

  {{-- Tabel Ringkasan --}}
  <div class="overflow-x-auto">
    <table class="table table-zebra w-full">
      <thead class="bg-primary text-white">
        <tr>
          <th>No</th>
          <th>Layanan</th>
          <th>Jumlah Responden</th>
          <th>Rata-rata Kepuasan (%)</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($layanan as $index => $item)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->survei->count() }}</td>
            <td>{{ $item->rata_kepuasan }}%</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- SCRIPT GRAFIK --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
async function loadChart() {
  const response = await fetch('{{ route('admin.survei.grafik') }}');
  const data = await response.json();

  const ctx = document.getElementById('surveiChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: data.map(d => d.nama),
      datasets: [{
        label: 'Rata-rata Skor (1–5)',
        data: data.map(d => d.avg_skor),
        borderWidth: 1,
        backgroundColor: 'rgba(59,130,246,0.7)',
        borderColor: 'rgba(37,99,235,1)',
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true, max: 5 }
      }
    }
  });
}
loadChart();
</script>
@endsection
