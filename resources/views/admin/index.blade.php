@extends('layouts.admin')

@section('container')
    <div class="card rounded-4 shadow-sm p-3">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Selamat Datang, {{ Auth::user()->name }}</h2>

            <div class="row">
                <div class="col-md-6 my-3">
                    <div class="card bg-primary text-white p-3">
                        <div class="card-body">
                            <h5>Total Pengguna</h5>
                            <h2>{{ $user }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-3">
                    <div class="card bg-success text-white p-3">
                        <div class="card-body">
                            <h5>Buku Dipinjam</h5>
                            <h2>{{ $pinjam }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <div class="" style="width: 300px">
                    <canvas id="doughnut"></canvas>
                </div>
                <div class="" style="width: 300px">
                    <canvas id="pie"></canvas>
                </div>
                <div class="mt-5" style="width: 480px">
                    <canvas id="bar"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/chart.umd.js') }}"></script>
    <script>
        const doughnut = document.getElementById('doughnut');
        const pie = document.getElementById('pie');
        const bar = document.getElementById('bar');

        const chart1 = new Chart(doughnut, {
            type: 'doughnut',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Dipinjam',
                    data: @json($data),
                    backgroundColor: 'blue',
                    borderColor: 'white',
                    borderWidth: 15
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Buku yang sering dipinjam'
                    }
                }
            }
        });

        const chart2 = new Chart(pie, {
            type: 'pie',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Dipinjam',
                    data: @json($data),
                    backgroundColor: 'red',
                    borderColor: 'white',
                    borderWidth: 10
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Buku yang sering dipinjam'
                    }
                }
            }
        });

        const chart3 = new Chart(bar, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Dipinjam',
                    data: @json($data),
                    backgroundColor: 'green',
                    borderColor: 'white',
                    borderWidth: 10
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Buku yang sering dipinjam'
                    }
                }
            }
        });
    </script>
@endsection
