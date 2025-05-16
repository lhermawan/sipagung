<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA KUALITAS)</span>
    </h1>
</div>
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
        plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
        dataLabels: { enabled: false },
        legend: { position: 'bottom' },
        colors: ['#38a169'],
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
    plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
    dataLabels: { enabled: false },
    legend: { position: 'bottom', horizontalAlign: 'center', fontSize: '12px' },
    colors: ['#2c7a7b'],
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
    const anakKeys = ['anak_usia_7_12', 'anak_usia_13_15', 'anak_usia_16_18', 'anak_usia_19_24'];
    const categoriesAnak = dusunData.map(d => d.wilayah);
    const seriesAnak = anakKeys.map(key => ({
        name: key.replace(/anak_usia_/g, 'Usia ').replace(/_/g, '-'),
        data: dusunData.map(d => d[key] || 0)
    }));
    var optionsAnak = {
        chart: { type: 'bar', height: 300, stacked: true, toolbar: { show: false } },
        series: seriesAnak,
        xaxis: { categories: categoriesAnak },
        plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
        dataLabels: { enabled: false },
        legend: { position: 'bottom', horizontalAlign: 'center', fontSize: '12px' },
        colors: ['#68d391', '#48bb78', '#38a169', '#2f855a']
    };
    var chartAnak = new ApexCharts(document.querySelector("#chartAnakUsia"), optionsAnak);
    chartAnak.render();

    // 5. Jumlah keluarga Beresiko stunting (payungagung saja)
    const payungagung = data.find(d => d.wilayah.toLowerCase() === 'payungagung') || {};
    const stuntingSeries = [
        { name: 'Sasaran Stunting', data: [payungagung.sasaran_stunting || 0] },
        { name: 'Berisiko Stunting', data: [payungagung.berisiko_stunting || 0] },
        { name: 'Tidak Berisiko Stunting', data: [payungagung.tidak_berisiko_stunting || 0] }
    ];
    var optionsStunting = {
        chart: { type: 'bar', height: 250, toolbar: { show: false } },
        series: stuntingSeries,
        xaxis: { categories: ['DATA BERESIKO DESA PAYUNGAGUNG'] },
        plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
        dataLabels: { enabled: false },
        legend: { position: 'top' },
        colors: ['#f6e05e', '#ecc94b', '#d69e2e']
    };
    var chartStunting = new ApexCharts(document.querySelector("#chartStunting"), optionsStunting);
    chartStunting.render();
});
</script>
@endsection
