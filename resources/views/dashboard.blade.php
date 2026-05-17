@extends('layouts.admin')

@section('content')
<div class="space-y-6">

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Total --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 hover:border-slate-700 transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-500/20 to-blue-600/10 flex items-center justify-center">
                    <i class="bi bi-inbox-fill text-blue-400 text-lg"></i>
                </div>
                <span class="text-xs font-medium text-slate-500 bg-slate-800 px-2 py-1 rounded-lg">Total</span>
            </div>
            <p class="text-3xl font-extrabold text-white">{{ $total }}</p>
            <p class="text-sm text-slate-400 mt-1">Total Aspirasi</p>
        </div>

        {{-- Akademik --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 hover:border-slate-700 transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-emerald-500/20 to-emerald-600/10 flex items-center justify-center">
                    <i class="bi bi-mortarboard-fill text-emerald-400 text-lg"></i>
                </div>
                <span class="text-xs font-medium text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded-lg">Akademik</span>
            </div>
            <p class="text-3xl font-extrabold text-white">{{ $byKategori['akademik'] ?? 0 }}</p>
            <p class="text-sm text-slate-400 mt-1">Kategori Akademik</p>
        </div>

        {{-- Non-Akademik --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 hover:border-slate-700 transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-500/20 to-amber-600/10 flex items-center justify-center">
                    <i class="bi bi-megaphone-fill text-amber-400 text-lg"></i>
                </div>
                <span class="text-xs font-medium text-amber-400 bg-amber-500/10 px-2 py-1 rounded-lg">Non-Akademik</span>
            </div>
            <p class="text-3xl font-extrabold text-white">{{ $byKategori['non-akademik'] ?? 0 }}</p>
            <p class="text-sm text-slate-400 mt-1">Kategori Non-Akademik</p>
        </div>

        {{-- Selesai --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 hover:border-slate-700 transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-green-500/20 to-green-600/10 flex items-center justify-center">
                    <i class="bi bi-check-circle-fill text-green-400 text-lg"></i>
                </div>
                <span class="text-xs font-medium text-green-400 bg-green-500/10 px-2 py-1 rounded-lg">Selesai</span>
            </div>
            <p class="text-3xl font-extrabold text-white">{{ $byStatus['selesai'] ?? 0 }}</p>
            <p class="text-sm text-slate-400 mt-1">Aspirasi Selesai</p>
        </div>
    </div>

    {{-- Charts Row --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="text-base font-semibold text-white mb-4 flex items-center gap-2">
                <i class="bi bi-pie-chart-fill text-red-400"></i> Status Aspirasi
            </h3>
            <div class="flex justify-center">
                <canvas id="statusChart" height="220"></canvas>
            </div>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="text-base font-semibold text-white mb-4 flex items-center gap-2">
                <i class="bi bi-bar-chart-fill text-blue-400"></i> Kategori Aspirasi
            </h3>
            <canvas id="kategoriChart" height="220"></canvas>
        </div>
    </div>

    {{-- Monthly Chart --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
        <h3 class="text-base font-semibold text-white mb-4 flex items-center gap-2">
            <i class="bi bi-graph-up text-emerald-400"></i> Tren Aspirasi per Bulan
        </h3>
        <canvas id="monthlyChart" height="100"></canvas>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    Chart.defaults.color = '#94a3b8';
    Chart.defaults.borderColor = '#1e293b';

    // Doughnut - Status
    new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($byStatus->toArray())) !!},
            datasets: [{
                data: {!! json_encode(array_values($byStatus->toArray())) !!},
                backgroundColor: ['#facc15', '#60a5fa', '#f87171', '#34d399'],
                borderColor: '#0f172a',
                borderWidth: 3,
                hoverOffset: 8,
            }]
        },
        options: {
            responsive: true,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 16, usePointStyle: true, pointStyleWidth: 10, font: { size: 12, family: 'Inter' } }
                }
            }
        }
    });

    // Bar - Kategori
    new Chart(document.getElementById('kategoriChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($byKategori->toArray())) !!},
            datasets: [{
                label: 'Jumlah',
                data: {!! json_encode(array_values($byKategori->toArray())) !!},
                backgroundColor: ['#34d399', '#fbbf24'],
                borderRadius: 8,
                barThickness: 48,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1, font: { family: 'Inter' } }, grid: { color: '#1e293b' } },
                x: { ticks: { font: { family: 'Inter' } }, grid: { display: false } }
            },
            plugins: { legend: { display: false } }
        }
    });

    // Line - Monthly
    new Chart(document.getElementById('monthlyChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode(array_keys($byMonth->toArray())) !!},
            datasets: [{
                label: 'Aspirasi',
                data: {!! json_encode(array_values($byMonth->toArray())) !!},
                backgroundColor: 'rgba(239, 68, 68, 0.1)',
                borderColor: '#ef4444',
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#ef4444',
                pointBorderColor: '#0f172a',
                pointBorderWidth: 2,
                pointHoverRadius: 8,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'top', labels: { usePointStyle: true, font: { size: 12, family: 'Inter' } } }
            },
            scales: {
                y: { beginAtZero: true, ticks: { font: { family: 'Inter' } }, grid: { color: '#1e293b' } },
                x: { ticks: { font: { family: 'Inter' } }, grid: { display: false } }
            }
        }
    });
</script>
@endsection
