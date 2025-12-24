@extends('backend.dashboard')

@section('content')
<div class="flex-1 transition-all duration-300 lg:ml-64 p-6 mt-16 space-y-6">

    {{-- Welcome Card --}}
    <div class="card-premium max-w-3xl mx-auto p-10 text-center">
        <h1 class="text-3xl font-extrabold text-indigo-600 mb-3">
            Selamat Datang, {{ Auth::user()->name }}
        </h1>
    </div>

    {{-- Grafik Survei --}}
    <div class="max-w-5xl mx-auto card-premium p-6">
        <h2 class="text-2xl font-bold text-indigo-600 mb-4 text-center md:text-left">
            📊 Grafik Survei Kepuasan Layanan
        </h2>
        <div class="w-full h-96">
            <canvas id="surveiChart" class="rounded-xl shadow-md"></canvas>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('surveiChart').getContext('2d');
const values = @json($values);
const labels = @json($labels);

const dynamicColors = values.map(val => {
    if(val <= 2.5) return '#ef4444';      
    if(val <= 3.9) return '#facc15';      
    return '#2563eb';                      
});

const dataLabelPlugin = {
    id: 'dataLabelPlugin',
    afterDatasetsDraw(chart) {
        const { ctx, data } = chart;
        ctx.save();
        data.datasets.forEach((dataset, datasetIndex) => {
            chart.getDatasetMeta(datasetIndex).data.forEach((bar, index) => {
                const value = dataset.data[index];
                const percentage = ((value / 5) * 100).toFixed(1) + '%';
                ctx.fillStyle = '#1e3a8a';
                ctx.font = 'bold 12px sans-serif';
                ctx.textAlign = 'center';
                ctx.fillText(`${value} (${percentage})`, bar.x + bar.width / 2, bar.y - 8);
            });
        });
        ctx.restore();
    }
};

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Rata-rata Kepuasan',
            data: values,
            backgroundColor: dynamicColors,
            borderRadius: 10,
            borderSkipped: false
        }]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { display: false },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const value = context.raw;
                        const percentage = ((value / 5) * 100).toFixed(1);
                        return ` ${value} (${percentage}%)`;
                    }
                }
            }
        },
        scales: {
            x: {
                beginAtZero: true,
                max: 5,
                ticks: { stepSize: 1, color: '#1e3a8a' },
                grid: { color: '#e5e7eb', drawBorder: false }
            },
            y: {
                ticks: { color: '#1e3a8a', font: { size: 14 } },
                grid: { display: false }
            }
        }
    },
    plugins: [dataLabelPlugin]
});
</script>
