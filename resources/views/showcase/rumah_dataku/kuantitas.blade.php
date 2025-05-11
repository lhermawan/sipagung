@include('navbar-tailwind.css')
<!-- resources/views/showcase/rumah_dataku/kuantitas.blade.php -->
<div class="bg-white shadow rounded-lg p-6">
    <h3 class="text-xl font-semibold mb-4 text-gray-800">Data Kuantitas Penduduk</h3>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-blue-50 p-4 rounded shadow text-center">
            <p class="text-gray-500 text-sm">Jumlah Penduduk</p>
            <p class="text-2xl font-bold text-blue-600">{{ number_format($jumlah_penduduk) }}</p>
        </div>
        <div class="bg-pink-50 p-4 rounded shadow text-center">
            <p class="text-gray-500 text-sm">Laki-laki</p>
            <p class="text-2xl font-bold text-pink-600">{{ number_format($jumlah_lakilaki) }}</p>
        </div>
        <div class="bg-green-50 p-4 rounded shadow text-center">
            <p class="text-gray-500 text-sm">Perempuan</p>
            <p class="text-2xl font-bold text-green-600">{{ number_format($jumlah_perempuan) }}</p>
        </div>
        <div class="bg-yellow-50 p-4 rounded shadow text-center">
            <p class="text-gray-500 text-sm">Jumlah KK</p>
            <p class="text-2xl font-bold text-yellow-600">{{ number_format($jumlah_kk) }}</p>
        </div>
    </div>

    <div class="mt-6">
        <h4 class="text-lg font-semibold mb-2 text-gray-700">Piramida Penduduk</h4>
        <div id="pyramidChart" class="w-full h-96"></div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const options = {
        chart: {
            type: 'bar',
            height: 400,
            stacked: true,
            toolbar: { show: false },
        },
        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '60%',
            }
        },
        colors: ['#3b82f6', '#ec4899'],
        series: [
            { name: 'Laki-laki', data: @json($maleData) },
            { name: 'Perempuan', data: @json($femaleData) },
        ],
        xaxis: {
            categories: @json($labels),
            title: {
                text: 'Jumlah Penduduk',
                style: { fontSize: '14px', fontWeight: 600 }
            },
            labels: {
                formatter: val => Math.abs(val)
            }
        },
        yaxis: {
            title: {
                text: 'Kelompok Usia',
                style: { fontSize: '14px', fontWeight: 600 }
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: val => Math.abs(val) + " orang"
            }
        },
        legend: { position: 'bottom' },
        dataLabels: { enabled: false }
    };

    const chart = new ApexCharts(document.querySelector("#pyramidChart"), options);
    chart.render();
</script>
@endsection
