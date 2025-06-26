@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">Dashboard Koleksi Kamu</div>
                <div class="card-body">
                    @if($genres->isEmpty())
                        <div class="alert alert-info">Belum ada data koleksi buku.</div>
                    @else
                        <div style="height: 400px;">
                            <canvas id="genreChart"></canvas>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@unless($genres->isEmpty())
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                try {
                    const ctx = document.getElementById('genreChart').getContext('2d');
                    
                    const genreChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: {!! json_encode($genres->pluck('namaGenre')) !!},
                            datasets: [{
                                label: 'Jumlah Buku per Genre',
                                data: {!! json_encode($genres->pluck('total')) !!},
                                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });
                } catch (error) {
                    console.error('Error creating chart:', error);
                }
            });
        </script>
    @endpush
@endunless

@endsection