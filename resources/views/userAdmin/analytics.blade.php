@extends('layouts.userSystem.app')

@section('content')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Розподіл оцінок користувачів</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="ratingsPieChart" style="max-width: 100%; max-height: 300px;"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="ratingsBarChart" style="max-width: 100%; max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="my-4">Аналітика клієнтів та замовлень</h1>

        <!-- Аналітика клієнтів -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Аналітика клієнтів</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <h5>Загальна кількість клієнтів</h5>
                        <p class="display-4">{{ $clientCount }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Клієнти з бонусами</h5>
                        <p class="display-4">{{ $withBonusCount }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Загальна сума бонусів</h5>
                        <p class="display-4">{{ $totalBonuses }}</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <canvas id="bonusPieChart" style="max-height: 300px;"></canvas>
                    </div>
                    <div class="col-md-6">
                        <canvas id="monthlyBonusLineChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Аналітика замовлень -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Аналітика замовлень</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <h5>Загальний дохід</h5>
                        <p class="display-4">{{ number_format($totalEarnings, 2) }} грн</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Оброблені замовлення</h5>
                        <p class="display-4">{{ $processedCount }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Замовлення в очікуванні</h5>
                        <p class="display-4">{{ $pendingCount }}</p>
                    </div>
                </div>

                <!-- Додаткова аналітика замовлень -->
                <div class="row mt-4">
                    <div class="col-md-4 text-center">
                        <h5>Кількість унікальних клієнтів</h5>
                        <p class="display-4">{{ $uniqueClientsCount }}</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Середня сума замовлення</h5>
                        <p class="display-4">{{ number_format($averageOrderValue, 2) }} грн</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>Середня кількість замовлень на клієнта</h5>
                        <p class="display-4">{{ number_format($averageOrdersPerClient, 2) }}</p>
                    </div>
                    <div class="col-md-4 text-center mt-4">
                        <h5>Мінімальний дохід по замовленню</h5>
                        <p class="display-4">{{ number_format($minOrderEarnings, 2) }} грн</p>
                    </div>
                    <div class="col-md-4 text-center mt-4">
                        <h5>Максимальний дохід по замовленню</h5>
                        <p class="display-4">{{ number_format($maxOrderEarnings, 2) }} грн</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Графік популярних товарів -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Популярні товари</h3>
            </div>
            <div class="card-body">
                <canvas id="popularProductsChart" style="max-height: 300px;"></canvas>
            </div>
        </div>

        <!-- Графік товарів цього місяця -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Товари цього місяця</h3>
            </div>
            <div class="card-body">
                <canvas id="thisMonthProductsChart" style="max-height: 300px;"></canvas>
            </div>
        </div>
    </div>

    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Діаграма для клієнтів з бонусами / без бонусів
        new Chart(document.getElementById('bonusPieChart'), {
            type: 'pie',
            data: {
                labels: ['З бонусами', 'Без бонусів'],
                datasets: [{
                    data: [{{ $withBonusCount }}, {{ $withoutBonusCount }}],
                    backgroundColor: ['#4caf50', '#f44336']
                }]
            },
            options: {
                responsive: true
            }
        });

        // Лінійний графік для місячної тенденції бонусів
        new Chart(document.getElementById('monthlyBonusLineChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($monthlyBonusData->toArray())) !!},
                datasets: [{
                    label: 'Загальний бонус',
                    data: {!! json_encode(array_values($monthlyBonusData->toArray())) !!},
                    borderColor: '#4caf50',
                    fill: false
                }]
            },
            options: {
                responsive: true
            }
        });

        // Діаграма для популярних товарів
        new Chart(document.getElementById('popularProductsChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($popularProducts->pluck('name')) !!},
                datasets: [{
                    label: 'Популярність товару',
                    data: {!! json_encode($popularProducts->pluck('count')) !!},
                    backgroundColor: '#2196F3'
                }]
            },
            options: {
                responsive: true
            }
        });

        // Графік для товарів цього місяця
        new Chart(document.getElementById('thisMonthProductsChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($thisMonthProducts->pluck('name')) !!},
                datasets: [{
                    label: 'Популярність товару',
                    data: {!! json_encode($thisMonthProducts->pluck('count')) !!},
                    backgroundColor: '#FF9800'
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <script>
        // Дані для графіка
        const ratingsData = @json($ratingsData);
        const ratingsLabels = Object.keys(ratingsData).map(rating => `Оцінка ${rating}`);
        const ratingsValues = Object.values(ratingsData);

        // Кругова діаграма
        const ctxPie = document.getElementById('ratingsPieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ratingsLabels,
                datasets: [{
                    data: ratingsValues,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${context.raw} оцінок`;
                            }
                        }
                    }
                }
            }
        });

        // Лінійна діаграма
        const ctxBar = document.getElementById('ratingsBarChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ratingsLabels,
                datasets: [{
                    label: 'Кількість оцінок',
                    data: ratingsValues,
                    backgroundColor: '#36A2EB',
                    borderColor: '#36A2EB',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Кількість'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.raw} оцінок`;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
