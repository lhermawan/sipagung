<section class="">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">
            RUMAH DATAKU <span class="text-primary">(DATA KUANTITAS)</span>
        </h1>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
            <div class="bg-teal-50 p-5 rounded-xl shadow">
                <div class="flex justify-center mb-2">
                    <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="7" r="4" />
                        <path d="M5.5 21a8.38 8.38 0 0113 0" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 mb-1">Jumlah Wanita Usia Subur (WUS)</p>
                <p class="text-3xl font-extrabold text-teal-600">{{ $wus }}</p>
            </div>

            <div class="bg-indigo-50 p-5 rounded-xl shadow">
                <div class="flex justify-center mb-2">
                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M16 12h4M4 12h4m8 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <p class="text-sm text-gray-500 mb-1">Jumlah Pasangan Usia Subur (PUS)</p>
                <p class="text-3xl font-extrabold text-indigo-600">{{ $wus }}</p>
            </div>
        </div>

        <!-- Grafik Grid 2 Kolom -->
        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Grafik Kontrasepsi -->
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold mb-4 text-center">Jumlah PUS Menurut Kontrasepsi Modern</h2>
                <div id="kontrasepsi" style="height: 350px;"></div>
            </div>

            <!-- Grafik Tidak Ber-KB -->
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold mb-4 text-center">Jumlah PUS Tidak Ber-KB</h2>
                <div id="tidak-berkb" style="height: 350px;"></div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Pie Chart Kontrasepsi
    var optionsKontrasepsi = {
        chart: {
            type: 'pie',
            height: 350
        },
        series: [
            {{ $kontrasepsi['IUD'] }},
            {{ $kontrasepsi['MOW'] }},
            {{ $kontrasepsi['MOP'] }},
            {{ $kontrasepsi['Implant'] }},
            {{ $kontrasepsi['Suntik'] }},
            {{ $kontrasepsi['Pil'] }},
            {{ $kontrasepsi['Kondom'] }}
        ],
        labels: ['IUD', 'MOW', 'MOP', 'Implant', 'Suntik', 'Pil', 'Kondom'],
        colors: ['#FF7F50', '#87CEFA', '#32CD32', '#FF6347', '#FFD700', '#8A2BE2', '#A52A2A'],
        title: {
            text: 'Kontrasepsi',
            align: 'center'
        }
    };

    var chartKontrasepsi = new ApexCharts(document.querySelector("#kontrasepsi"), optionsKontrasepsi);
    chartKontrasepsi.render();

    // Bar Chart Tidak Ber-KB
    var optionsTidakBerKB = {
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                distributed: true,
                columnWidth: '50%',
                endingShape: 'rounded'
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
                {{ $tidak_berkb['IAS'] }},
                {{ $tidak_berkb['IAT'] }},
                {{ $tidak_berkb['TIAL'] }},
                {{ $tidak_berkb['Hamil'] }}
            ],
            colors: [
                '#1E3A8A', '#2563EB', '#3B82F6', '#60A5FA'
            ]
        }],
        xaxis: {
            categories: ['IAS', 'IAT', 'TIAL', 'Hamil']
        },

        title: {
            text: 'Tidak Ber-KB',
            align: 'center'
        }
    };

    var chartTidakBerKB = new ApexCharts(document.querySelector("#tidak-berkb"), optionsTidakBerKB);
    chartTidakBerKB.render();
</script>
