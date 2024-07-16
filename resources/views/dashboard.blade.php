@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <h2>Marketing with Most Jobs</h2>
                <canvas id="marketingChart"></canvas>
            </div>
            <div class="col-md-6">
                <h2>Monthly Gross Profit</h2>
                <canvas id="profitChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var marketingData = @json($marketingData);
        var profitData = @json($profitData);

        var ctxMarketing = document.getElementById('marketingChart').getContext('2d');
        var marketingChart = new Chart(ctxMarketing, {
            type: 'bar',
            data: {
                labels: marketingData.labels,
                datasets: [{
                    label: 'Number of Jobs',
                    data: marketingData.data,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctxProfit = document.getElementById('profitChart').getContext('2d');
        var profitChart = new Chart(ctxProfit, {
            type: 'line',
            data: {
                labels: profitData.labels,
                datasets: [{
                    label: 'Gross Profit',
                    data: profitData.data,
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
