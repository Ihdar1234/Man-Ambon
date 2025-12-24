@extends('dashboard.operator.app')

@section('content')
<div class="space-y-4 md:space-y-10 p-2 md:p-6 max-w-full">

    {{-- TITLE --}}
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-1 md:gap-0 max-w-full md:max-w-full mx-0">
        <h1 class="text-sm sm:text-base md:text-3xl lg:text-4xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
            Dashboard Operator PTSP
        </h1>
        <span class="text-xs sm:text-sm md:text-base text-gray-400 mt-1 md:mt-0">
            Terakhir diperbarui: {{ now()->format('d M Y, H:i') }}
        </span>
    </div>

    {{-- FILTER --}}
    <form method="GET" class="flex flex-col sm:flex-row gap-2 items-stretch mb-4 md:mb-6 max-w-sm sm:max-w-sm md:max-w-full mx-auto md:mx-0">
        <select name="layanan_id" class="select select-bordered rounded-xl shadow-sm border-gray-300 flex-1 text-xs sm:text-sm md:text-base">
            <option value="">Semua Layanan</option>
            @foreach ($layanans as $l)
                <option value="{{ $l->id }}" @selected($selected == $l->id)>{{ $l->nama }}</option>
            @endforeach
        </select>

        <button class="btn btn-primary rounded-xl px-2 sm:px-4 md:px-6 shadow-sm bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-500 hover:to-indigo-500 transition-all text-xs sm:text-sm md:text-base flex-1 sm:flex-none mt-1 sm:mt-0">
            Filter
        </button>
    </form>

    {{-- STATISTIK --}}
{{-- STATISTIK --}}
<div class="flex flex-col sm:flex-col md:flex-row md:flex-nowrap gap-2 sm:max-w-sm sm:mx-auto md:max-w-full md:mx-0">
    @foreach ([['label'=>'Baru','value'=>$baru,'from'=>'blue-500','to'=>'blue-600'],
               ['label'=>'Proses','value'=>$proses,'from'=>'amber-400','to'=>'amber-500'],
               ['label'=>'Selesai','value'=>$selesai,'from'=>'emerald-400','to'=>'emerald-500'],
               ['label'=>'Ditolak','value'=>$ditolak,'from'=>'red-400','to'=>'red-500']] as $stat)
    <div class="w-full sm:w-full md:w-1/4 p-2 sm:p-3 md:p-6 rounded-3xl shadow text-white bg-gradient-to-br from-{{$stat['from']}} to-{{$stat['to']}} hover:scale-105 transition-transform text-center min-w-0">
        <p class="opacity-90 text-xs sm:text-sm md:text-base">{{ $stat['label'] }}</p>
        <h2 class="font-extrabold mt-1 text-sm sm:text-sm md:text-2xl">{{ $stat['value'] }}</h2>
    </div>
    @endforeach
</div>

    {{-- GRAFIK --}}
    <div class="bg-white shadow-xl rounded-3xl border border-gray-100 p-2 sm:p-3 md:p-8 overflow-x-auto max-w-sm sm:max-w-sm md:max-w-full mx-auto md:mx-0">
        <h2 class="text-xs sm:text-sm md:text-xl font-semibold text-gray-700 mb-2 md:mb-6 text-center">
            Grafik Pengajuan (Status)
        </h2>

        <div class="flex flex-col md:flex-row items-center justify-center gap-2 md:gap-10">

            <!-- DONUT CHART -->
            <div class="relative w-36 sm:w-40 md:w-64 h-36 sm:h-40 md:h-64 mb-2 md:mb-0">
                <canvas id="premiumChart"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <p class="text-gray-400 text-xs sm:text-sm md:text-base">Total</p>
                    <p class="text-gray-800 font-bold text-lg sm:text-xl md:text-3xl">
                        {{ $baru + $proses + $selesai + $ditolak }}
                    </p>
                </div>
            </div>

            <!-- LEGEND -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 gap-1 sm:gap-2 md:gap-4 w-full max-w-[240px] sm:max-w-[300px] md:max-w-full">
                @foreach ([['label'=>'Pengajuan Baru','value'=>$baru,'color'=>'blue'],
                           ['label'=>'Diproses','value'=>$proses,'color'=>'amber'],
                           ['label'=>'Selesai','value'=>$selesai,'color'=>'emerald'],
                           ['label'=>'Ditolak','value'=>$ditolak,'color'=>'red']] as $stat)
                <div class="flex items-center gap-1 sm:gap-1 md:gap-2 bg-{{ $stat['color'] }}-50 p-1 sm:p-1 md:p-4 rounded-2xl border border-{{ $stat['color'] }}-200 hover:shadow-md transition-shadow text-xs sm:text-xs md:text-base truncate">
                    <span class="w-2 h-2 sm:w-2 sm:h-2 md:w-3 md:h-3 rounded-full bg-{{ $stat['color'] }}-500"></span>
                    <p class="text-gray-700 font-medium truncate">{{ $stat['label'] }}</p>
                    <span class="ml-auto font-bold text-gray-800 text-xs sm:text-xs md:text-base">{{ $stat['value'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('premiumChart');
new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Baru','Proses','Selesai','Ditolak'],
        datasets: [{
            data: [{{ $baru }},{{ $proses }},{{ $selesai }},{{ $ditolak }}],
            backgroundColor: ['#3b82f6','#f59e0b','#10b981','#ef4444'],
            borderColor: '#fff',
            borderWidth: 3,
            hoverOffset: 12
        }]
    },
    options: {
        cutout: '70%',
        plugins: { legend: { display: false }},
        animation: { duration: 1200, easing: 'easeOutQuart' }
    }
});
</script>
@endsection
