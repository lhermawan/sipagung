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

    // 2. Jumlah Individu Menurut Pekerjaan
    const pekerjaanKeys = [
        'pekerjaan_petani', 'pekerjaan_nelayan', 'pekerjaan_pedagang', 'pekerjaan_pejabat',
        'pekerjaan_pns_tni_polri', 'pekerjaan_swasta', 'pekerjaan_wiraswasta',
        'pekerjaan_pensiunan', 'pekerjaan_pekerja_lepas'
    ];
    const categoriesPekerjaan = dusunData.map(d => d.wilayah);
    const seriesPekerjaan = pekerjaanKeys.map(key => ({
        name: key.replace('pekerjaan_', '').replace(/_/g, ' ').toUpperCase(),
        data: dusunData.map(d => d[key] || 0)
    }));
    var optionsPekerjaan = {
        chart: { type: 'bar', height: 300, stacked: true, toolbar: { show: false } },
        series: seriesPekerjaan,
        xaxis: { categories: categoriesPekerjaan },
        plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
        dataLabels: { enabled: false },
        legend: { position: 'bottom', horizontalAlign: 'center', fontSize: '12px' },
        colors: ['#f6ad55', '#ed8936', '#dd6b20', '#c05621', '#9c4221', '#805ad5', '#6b46c1', '#553c9a', '#38a169']
    };
    var chartPekerjaan = new ApexCharts(document.querySelector("#chartPekerjaan"), optionsPekerjaan);
    chartPekerjaan.render();

    // 3. Jumlah Individu Menurut Pendidikan Terakhir
    const pendidikanKeys = [
        'pendidikan_tidak_sekolah', 'pendidikan_tidak_tamat_sd', 'pendidikan_tamat_sd',
        'pendidikan_sltp', 'pendidikan_slta', 'pendidikan_pt'
    ];
    const categoriesPendidikan = dusunData.map(d => d.wilayah);
    const seriesPendidikan = pendidikanKeys.map(key => ({
        name: key.replace('pendidikan_', '').replace(/_/g, ' ').toUpperCase(),
        data: dusunData.map(d => d[key] || 0)
    }));
    var optionsPendidikan = {
        chart: { type: 'bar', height: 300, stacked: true, toolbar: { show: false } },
        series: seriesPendidikan,
        xaxis: { categories: categoriesPendidikan },
        plotOptions: { bar: { horizontal: false, columnWidth: '55%' } },
        dataLabels: { enabled: false },
        legend: { position: 'bottom', horizontalAlign: 'center', fontSize: '12px' },
        colors: ['#f56565', '#c53030', '#9b2c2c', '#2c7a7b', '#4fd1c5', '#285e61']
    };
    var chartPendidikan = new ApexCharts(document.querySelector("#chartPendidikan"), optionsPendidikan);
    chartPendidikan.render();

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
