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

            <div class="d-flex justify-content-between">
                <select id="bulan" class="form-select w-auto">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <select id="tahun" class="form-select w-auto">
                    @foreach($tahunList as $tahun)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endforeach
                </select>
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
        // Ambil bulan saat ini secara otomatis
        let defaultMonth = new Date().getMonth() + 1;

        // Ambil data dari Laravel (semua bulan)
        const chartData = @json($chartData);

        // Set dropdown agar default ke bulan saat ini
        document.getElementById('bulan').value = defaultMonth;

        // Inisialisasi Chart.js dengan data bulan saat ini
        const doughnut = document.getElementById('doughnut').getContext('2d');
        let chart1 = new Chart(doughnut, {
            type: 'doughnut',
            data: {
                labels: chartData[defaultMonth].labels, // Data bulan saat ini
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: chartData[defaultMonth].data,
                    backgroundColor: 'blue',
                    borderColor: 'white',
                    borderWidth: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                }
            }
        });

        const pie = document.getElementById('pie').getContext('2d');
        let chart2 = new Chart(pie, {
            type: 'pie',
            data: {
                labels: chartData[defaultMonth].labels,
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: chartData[defaultMonth].data,
                    backgroundColor: 'yellow',
                    borderColor: 'white',
                    borderWidth: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                }
            }
        });

        const bar = document.getElementById('bar').getContext('2d');
        let chart3 = new Chart(bar, {
            type: 'bar',
            data: {
                labels: chartData[defaultMonth].labels,
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: chartData[defaultMonth].data,
                    backgroundColor: 'red',
                    borderColor: 'white',
                    borderWidth: 10
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                }
            }
        });

        // Event listener untuk select bulan
        document.getElementById('bulan').addEventListener('change', function () {
            let selectedMonth = this.value;
            
            chart1.data.labels = chartData[selectedMonth].labels;
            chart1.data.datasets[0].data = chartData[selectedMonth].data;
            chart1.update();

            chart2.data.labels = chartData[selectedMonth].labels;
            chart2.data.datasets[0].data = chartData[selectedMonth].data;
            chart2.update();

            chart3.data.labels = chartData[selectedMonth].labels;
            chart3.data.datasets[0].data = chartData[selectedMonth].data;
            chart3.update();
        });

        document.getElementById('tahun').addEventListener('change', function () {
            let selectedYear = this.value;
            let selectedMonth = document.getElementById('bulan').value;

            fetch(`/admin/chart-data?year=${selectedYear}&month=${selectedMonth}`)
                .then(response => response.json())
                .then(data => {
                    chart1.data.labels = data.labels;
                    chart1.data.datasets[0].data = data.data;
                    chart1.update();

                    chart2.data.labels = data.labels;
                    chart2.data.datasets[0].data = data.data;
                    chart2.update();

                    chart3.data.labels = data.labels;
                    chart3.data.datasets[0].data = data.data;
                    chart3.update();
                });
        });

    </script>
@endsection