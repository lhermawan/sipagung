<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <div id="chartMigrasiDesa" class="bg-white rounded shadow-md p-4"></div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 shadow-md rounded">
            <thead class="bg-gray-100">
                <tr class="border-b">
                    <th rowspan="2" class="px-4 py-2 text-left">Tahun</th>
                    <th colspan="4" class="px-4 py-2 text-center">Jumlah</th>
                    <th rowspan="2" class="px-4 py-2 text-left">Jenis</th>
                </tr>
                <tr class="border-b">
                    <th class="px-4 py-2 text-center">Masuk</th>
                    <th class="px-4 py-2 text-center">Keluar</th>
                    <th class="px-4 py-2 text-center">Komuter</th>
                    <th class="px-4 py-2 text-center">Musiman</th>
                </tr>
            </thead>
            <tbody>
                @foreach($migrasiDesa as $data)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $data->tahun }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($data->masuk) }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($data->keluar) }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($data->komuter) }}</td>
                        <td class="px-4 py-2 text-center">{{ number_format($data->musiman) }}</td>
                        <td class="px-4 py-2">{{ $data->jenis }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 flex justify-center">
            {{ $migrasiDesa->links() }}
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener('livewire:load', () => {
    let chart;

    function renderChart(data) {
        const options = {
            chart: { type: 'bar', height: 400 },
            series: [
                { name: 'Masuk', data: data.masuk },
                { name: 'Keluar', data: data.keluar },
                { name: 'Komuter', data: data.komuter },
                { name: 'Musiman', data: data.musiman }
            ],
            xaxis: { categories: data.tahun },
            colors: ['#34d399', '#f87171', '#60a5fa', '#fbbf24'],
            title: { text: 'Grafik Migrasi Desa', align: 'center' },
            legend: { position: 'bottom' },
            dataLabels: { enabled: false }
        };

        if (chart) {
            chart.destroy();
        }
        chart = new ApexCharts(document.querySelector("#chartMigrasiDesa"), options);
        chart.render();
    }

    // Minta data chart dari Livewire saat load pertama kali
    Livewire.emit('requestChartData');

    // Terima data chart dari Livewire dan render ulang chart
    Livewire.on('sendChartDataToJs', data => {
        renderChart(data);
    });

    // Minta update chart saat pagination atau update Livewire selesai
    Livewire.hook('message.processed', (message, component) => {
        Livewire.emit('requestChartData');
    });
});
</script>
