<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA KUALITAS)</span></br>

    @foreach ($periodeList as $periode)
           TAHUN {{ \Carbon\Carbon::parse($periode)->format('Y')}}
        @endforeach
    </h1>
</div>


    {{-- <select id="filterSumber" class="border rounded px-2 py-1">
        <option value="">Semua Sumber</option>
        @foreach ($sumberList as $sumber)
            <option value="{{ $sumber }}">{{ $sumber }}</option>
        @endforeach
    </select> --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- 1. Jumlah PUS Menurut Usia Kawin Pertama --}}
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-3">Jumlah PUS Menurut Usia Kawin Pertama</h2>
        <div id="chartPusUsia"></div>
    </div>

    {{-- 2. Jumlah Individu Menurut Pekerjaan --}}
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-3">Jumlah Individu Menurut Pekerjaan</h2>
        <div id="chartPekerjaan"></div>
    </div>

    {{-- 3. Jumlah Individu Menurut Pendidikan Terakhir --}}
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-3">Jumlah Individu Menurut Pendidikan Terakhir</h2>
        <div id="chartPendidikan"></div>
    </div>

    {{-- 4. Jumlah Anak Usia Sekolah --}}
    <div class="bg-white p-4 rounded shadow">
        <h2 class="font-semibold mb-3">Jumlah Anak Usia Sekolah</h2>
        <div id="chartAnakUsia"></div>
    </div>

    {{-- 5. Jumlah Keluarga Beresiko Stunting (Payungagung) --}}
    <div class="bg-white p-4 rounded shadow md:col-span-2">
        <h2 class="font-semibold mb-3">Jumlah Keluarga Beresiko Stunting (Payungagung)</h2>
        <div id="chartStunting"></div>
    </div>
</div>

@foreach ($sumberList as $sumber)
            <p class="text-xl font-extrabold text-gray-500 mb-1">SUMBER DATA : {{ $sumber }}</p>
        @endforeach
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const data = @json($data);

    // Filter dusun exclude Payungagung
    const dusunData = data.filter(d => d.wilayah.toLowerCase() !== 'payungagung');

    // 1. Jumlah PUS Menurut Usia Kawin Pertama
    const categoriesPus = dusunData.map(d => d.wilayah);
    const seriesPus = [
        { name: 'Jumlah PUS', data: dusunData.map(d => d.jumlah_pus || 0) },
        { name: 'Perempuan ≥ 19 Tahun', data: dusunData.map(d => d.perempuan_19_keatas || 0) },
        { name: 'Laki-laki ≥ 25 Tahun', data: dusunData.map(d => d.laki_25_keatas || 0) }
    ];
    var optionsPus = {
        chart: { type: 'bar', height: 300, toolbar: { show: false } },
        series: seriesPus,
        xaxis: { categories: categoriesPus },
        plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
        dataLabels: { enabled: false },
        legend: { position: 'top' },
        colors: ['#3182ce', '#63b3ed', '#4299e1']
    };
    var chartPus = new ApexCharts(document.querySelector("#chartPusUsia"), optionsPus);
    chartPus.render();

    // 2. Jumlah Individu Menurut Pekerjaan (Interaktif: Ringkasan > Detail)
    const pekerjaanKeys = [
        'pekerjaan_petani', 'pekerjaan_nelayan', 'pekerjaan_pedagang', 'pekerjaan_pejabat',
        'pekerjaan_pns_tni_polri', 'pekerjaan_swasta', 'pekerjaan_wiraswasta',
        'pekerjaan_pensiunan', 'pekerjaan_pekerja_lepas', 'pekerjaan_tidak_bekerja'
    ];

    const categoriesDusun = dusunData.map(d => d.wilayah);
    const totalPerDusun = dusunData.map(d =>
        pekerjaanKeys.reduce((sum, key) => sum + (d[key] || 0), 0)
    );

    let chartPekerjaan; // global agar bisa di-destroy saat ganti chart

    const optionsPekerjaanOverview = {
        chart: {
            type: 'bar',
            height: 300,
            toolbar: { show: false },
            events: {
                dataPointSelection: function (event, chartContext, config) {
                    const index = config.dataPointIndex;
                    const dusunName = categoriesDusun[index];
                    showDetailPekerjaan(dusunName);
                }
            }
        },
        series: [{
            name: 'Jumlah Individu',
            data: totalPerDusun
        }],
        xaxis: { categories: categoriesDusun },
        plotOptions: { bar: { horizontal: false, columnWidth: '55%', distributed: true } },
        dataLabels: { enabled: false },
        legend: { position: 'bottom' },
        colors: ['#f56565', '#c53030', '#9b2c2c', '#2c7a7b', '#4fd1c5', '#285e61', '#68d391', '#38a169', '#3182ce', '#805ad5'],
        title: { text: 'Jumlah Individu per Dusun (Klik untuk Detail)' }
    };

    chartPekerjaan = new ApexCharts(document.querySelector("#chartPekerjaan"), optionsPekerjaanOverview);
    chartPekerjaan.render();

    function showDetailPekerjaan(dusunName) {
    const dusun = dusunData.find(d => d.wilayah === dusunName);
    const labels = pekerjaanKeys.map(key =>
        key.replace('pekerjaan_', '').replace(/_/g, ' ').toUpperCase()
    );
    const data = pekerjaanKeys.map(key => dusun[key] || 0);

    const warnaPerPekerjaan = [
        '#f6ad55', '#ed8936', '#dd6b20', '#c05621', '#9c4221',
        '#805ad5', '#6b46c1', '#553c9a', '#38a169', '#c53030'
    ];

    const detailOptions = {
        chart: {
            type: 'bar',
            height: 400,
            toolbar: {
                show: true,
                tools: {
                    customIcons: [{
                        icon: '<span style="cursor:pointer;">⬅️</span>',
                        index: -1,
                        title: 'Kembali',
                        class: 'back-button',
                        click: function () {
                            chartPekerjaan.destroy();
                            chartPekerjaan = new ApexCharts(document.querySelector("#chartPekerjaan"), optionsPekerjaanOverview);
                            chartPekerjaan.render();
                        }
                    }]
                }
            }
        },
        series: [{
            name: 'Jumlah Individu',
            data: data
        }],
        xaxis: {
            categories: labels,
            labels: {
                rotate: -45,
                style: { fontSize: '12px' }
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                distributed: true // <-- penting untuk warna berbeda
            }
        },
        dataLabels: { enabled: true },
        legend: { show: false },
        colors: warnaPerPekerjaan,
        title: { text: `Detail Pekerjaan di Dusun ${dusunName}` }
    };

    chartPekerjaan.destroy();
    chartPekerjaan = new ApexCharts(document.querySelector("#chartPekerjaan"), detailOptions);
    chartPekerjaan.render();
}

let chartPendidikan; // supaya bisa destroy/replace saat klik

// 3. Jumlah Individu Menurut Pendidikan Terakhir
const pendidikanKeys = [
    'pendidikan_tidak_sekolah', 'pendidikan_tidak_tamat_sd', 'pendidikan_tamat_sd',
    'pendidikan_sltp', 'pendidikan_slta', 'pendidikan_pt'
];

const pendidikanLabels = pendidikanKeys.map(key =>
    key.replace('pendidikan_', '').replace(/_/g, ' ').toUpperCase()
);

const categoriesPendidikan = dusunData.map(d => d.wilayah);
const seriesPendidikan = pendidikanKeys.map(key => ({
    name: key.replace('pendidikan_', '').replace(/_/g, ' ').toUpperCase(),
    data: dusunData.map(d => d[key] || 0)
}));

const warnaPendidikan = ['#f56565', '#c53030', '#9b2c2c', '#2c7a7b', '#4fd1c5', '#285e61'];

const totalPendidikanPerDusun = dusunData.map(d =>
    pendidikanKeys.reduce((sum, key) => sum + (d[key] || 0), 0)
);

const optionsPendidikan = {
    chart: {
        type: 'bar',
        height: 300,
        stacked: false,
        toolbar: { show: false },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                const index = config.dataPointIndex;
                const dusunName = categoriesPendidikan[index];
                showDetailPendidikan(dusunName);
            }
        }
    },
    series: [{
        name: 'Jumlah Individu',
        data: totalPendidikanPerDusun
    }],
    xaxis: { categories: categoriesPendidikan },
    plotOptions: { bar: { horizontal: false, columnWidth: '55%', distributed: true } },
    dataLabels: { enabled: false },
    legend: { position: 'bottom', horizontalAlign: 'center', fontSize: '12px' },
    colors: ['#f56565', '#c53030', '#9b2c2c', '#2c7a7b', '#4fd1c5', '#285e61', '#68d391', '#38a169', '#3182ce', '#805ad5'],
    title: { text: 'Jumlah Individu Menurut Pendidikan per Dusun (Klik untuk Detail)' }
};

chartPendidikan = new ApexCharts(document.querySelector("#chartPendidikan"), optionsPendidikan);
chartPendidikan.render();

function showDetailPendidikan(dusunName) {
    const dusun = dusunData.find(d => d.wilayah === dusunName);
    const data = pendidikanKeys.map(key => dusun[key] || 0);

    const detailOptions = {
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true,
                tools: {
                    customIcons: [{
                        icon: '<span style="cursor:pointer;">⬅️</span>',
                        index: -1,
                        title: 'Kembali',
                        class: 'back-button',
                        click: function () {
                            chartPendidikan.destroy();
                            chartPendidikan = new ApexCharts(document.querySelector("#chartPendidikan"), optionsPendidikan);
                            chartPendidikan.render();
                        }
                    }]
                }
            }
        },
        series: [{
            name: 'Jumlah Individu',
            data: data
        }],
        xaxis: {
            categories: pendidikanLabels,
            labels: {
                rotate: -45,
                style: { fontSize: '12px' }
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                distributed: true // warna beda tiap bar
            }
        },
        dataLabels: { enabled: true },
        legend: { show: false },
        colors: warnaPendidikan,
        title: { text: `Detail Pendidikan di Dusun ${dusunName}` }
    };

    chartPendidikan.destroy();
    chartPendidikan = new ApexCharts(document.querySelector("#chartPendidikan"), detailOptions);
    chartPendidikan.render();
}

    // 4. Jumlah Anak Usia Sekolah
    // 4. Jumlah Anak Usia Sekolah
    let chartAnak; // supaya bisa destroy/replace saat klik

const anakKeys = ['anak_usia_7_12', 'anak_usia_13_15', 'anak_usia_16_18', 'anak_usia_19_24'];
const anakLabels = anakKeys.map(k => k.replace('anak_usia_', 'Usia ').replace(/_/g, '-'));
const categoriesAnak = dusunData.map(d => d.wilayah);

// Hitung total anak per dusun
const totalAnakPerDusun = dusunData.map(d =>
    anakKeys.reduce((sum, key) => sum + (d[key] || 0), 0)
);

// Warna beda untuk tiap dusun (tambahkan jika dusun lebih banyak)
const warnaDusun = ['#68d391', '#48bb78', '#38a169', '#2f855a', '#81e6d9', '#4fd1c5', '#319795', '#285e61'];

const optionsAnak = {
    chart: {
        type: 'bar',
        height: 300,
        toolbar: { show: false },
        events: {
            dataPointSelection: function (event, chartContext, config) {
                const index = config.dataPointIndex;
                const dusunName = categoriesAnak[index];
                showDetailAnak(dusunName);
            }
        }
    },
    series: [{
        name: 'Jumlah Anak',
        data: totalAnakPerDusun
    }],
    xaxis: {
        categories: categoriesAnak,
        labels: {
            rotate: -45,
            style: { fontSize: '12px' }
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '50%',
            distributed: true
        }
    },
    dataLabels: { enabled: false },
    legend: { show: false },
    colors: warnaDusun,
    title: { text: 'Jumlah Anak Usia Sekolah per Dusun (Klik untuk Detail)' }
};

chartAnak = new ApexCharts(document.querySelector("#chartAnakUsia"), optionsAnak);
chartAnak.render();
function showDetailAnak(dusunName) {
    const dusun = dusunData.find(d => d.wilayah === dusunName);
    const data = anakKeys.map(key => dusun[key] || 0);

    const warnaAnak = ['#68d391', '#48bb78', '#38a169', '#2f855a']; // satu warna per kategori usia

    const detailOptions = {
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true,
                tools: {
                    customIcons: [{
                        icon: '<span style="cursor:pointer;">⬅️</span>',
                        index: -1,
                        title: 'Kembali',
                        class: 'back-button',
                        click: function () {
                            chartAnak.destroy();
                            chartAnak = new ApexCharts(document.querySelector("#chartAnakUsia"), optionsAnak);
                            chartAnak.render();
                        }
                    }]
                }
            }
        },
        series: [{
            name: 'Jumlah Anak',
            data: data
        }],
        xaxis: {
            categories: anakLabels,
            labels: {
                rotate: -45,
                style: { fontSize: '12px' }
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '45%',
                distributed: true
            }
        },
        dataLabels: { enabled: true },
        legend: { show: false },
        colors: warnaAnak,
        title: { text: `Detail Anak Usia Sekolah di Dusun ${dusunName}` }
    };

    chartAnak.destroy();
    chartAnak = new ApexCharts(document.querySelector("#chartAnakUsia"), detailOptions);
    chartAnak.render();
}

    // 5. Jumlah keluarga Berisiko stunting (pie chart untuk Payungagung)
    const payungagung = data.find(d => d.wilayah.toLowerCase() === 'payungagung') || {};
const stuntingLabels = ['Sasaran Stunting', 'Berisiko Stunting', 'Tidak Berisiko Stunting'];
const stuntingData = [
    payungagung.sasaran_stunting || 0,
    payungagung.berisiko_stunting || 0,
    payungagung.tidak_berisiko_stunting || 0
];

const optionsStunting = {
    chart: {
        type: 'donut',
        height: 400
    },
    series: stuntingData,
    labels: stuntingLabels,
    colors: ['#ed8936', '#f56565', '#48bb78'],
    legend: {
        position: 'bottom',
        fontSize: '13px'
    },
    title: {
        text: 'Keluarga Berisiko Stunting - Desa Payungagung',
        align: 'center',
        style: {
            fontSize: '14px'
        }
    },
    dataLabels: {
        enabled: true,
        offset: -5,
        style: {
            fontSize: '11px',
            fontWeight: 'normal'
        },
        formatter: function (val, opts) {
            const total = stuntingData.reduce((a, b) => a + b, 0);
            const value = stuntingData[opts.seriesIndex];
            return `${value} (${val.toFixed(1)}%)`;
        }
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return `${val} keluarga`;
            }
        }
    },
    plotOptions: {
        pie: {
            donut: {
                size: '55%'
            }
        }
    }
};

const chartStunting = new ApexCharts(document.querySelector("#chartStunting"), optionsStunting);
chartStunting.render();
});
</script>
@endsection
