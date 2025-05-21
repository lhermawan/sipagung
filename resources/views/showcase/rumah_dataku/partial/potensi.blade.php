<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA POTENSI DESA)</span></br>TAHUN {{ date('Y') - 1 }}
    </h1>
</div>
<section class="my-10">


    @php
        $items = [
            ['label' => 'Posyandu', 'value' => $potensi->posyandu, 'icon' => 'user-group'],
            ['label' => 'PKBM', 'value' => $potensi->pkbm, 'icon' => 'chalkboard-user'],
            ['label' => 'Fasilitas Olahraga', 'value' => $potensi->fasilitas_olahraga, 'icon' => 'person-running'],
            ['label' => 'Fasilitas Kesehatan', 'value' => $potensi->fasilitas_kesehatan, 'icon' => 'suitcase-medical'],
            ['label' => 'Fasilitas Ibadah', 'value' => $potensi->fasilitas_ibadah, 'icon' => 'mosque'],
            ['label' => 'Pasar', 'value' => $potensi->pasar, 'icon' => 'shopping-cart'],
            ['label' => 'BKB', 'value' => $potensi->bkb, 'icon' => 'person-breastfeeding'],
            ['label' => 'BKR', 'value' => $potensi->bkr, 'icon' => 'users'],
            ['label' => 'BKL', 'value' => $potensi->bkl, 'icon' => 'person-cane'],
            ['label' => 'UPPKA', 'value' => $potensi->uppka, 'icon' => 'chart-simple'],
            ['label' => 'PIK-R', 'value' => $potensi->pik_r, 'icon' => 'hand-holding-heart'],
            ['label' => 'Stunting / Gizi Buruk', 'value' => $potensi->stunting_gizi_buruk, 'icon' => 'hands-holding-child'],
            ['label' => 'Produk Unggulan', 'value' => $potensi->produk_unggulan, 'icon' => 'star'],
            ['label' => 'Luas Jalan (m)', 'value' => $potensi->luas_jalan, 'icon' => 'road'],
            ['label' => 'Jumlah RW', 'value' => $potensi->j_rw_dusun, 'icon' => 'house'],
            ['label' => 'Jumlah RT', 'value' => $potensi->j_rt, 'icon' => 'house'],
            ['label' => 'Luas Wilayah (km²)', 'value' => $potensi->luas_wilayah, 'icon' => 'map'],
            ['label' => 'Ketinggian (mdpl)', 'value' => $potensi->ketinggian, 'icon' => 'mountain'],
        ];
    @endphp


   {{-- Grafik dan Potensi (2 Kolom Besar) --}}
<div class="max-w-7xl mx-auto px-4 py-10 space-y-8">

        {{-- Grafik Utama --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Kepala Keluarga --}}
            <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center justify-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Jumlah Kepala Keluarga</h2>
                <div id="chartKK" class="w-full"></div>
                <div id="kkBreakdown" class="text-sm text-gray-700 font-medium"></div>
                <p class="text-sm text-gray-500 mt-2">Distribusi berdasarkan jenis kelamin</p>
            </div>

            {{-- Penduduk --}}
            <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center justify-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Jumlah Penduduk</h2>
                <div id="chartPenduduk" class="w-full"></div>
                <div id="pendudukBreakdown" class="text-sm text-gray-700 font-medium"></div>
            </div>

            {{-- Luas Wilayah --}}
            <div class="e-card playing text-white p-6 sm:p-4 rounded-xl shadow flex flex-col justify-between h-auto min-h-[400px] sm:min-h-[300px] overflow-visible">


  <div class="wave"></div>
  <div class="wave"></div>
  <div class="wave"></div>


      <div class="infotop">




                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-3xl font-bold">Luas <br>Wilayah</h2>
                        <div class="bg-white bg-opacity-20 rounded-full p-2">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="30" height="30" fill="url(#pattern0_105_143)" fill-opacity="0.7"/>
                            <defs>
                            <pattern id="pattern0_105_143" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_105_143" transform="scale(0.00195312)"/>
                            </pattern>
                            <image id="image0_105_143" width="512" height="512" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                            </defs>
                            </svg>

                        </div>
                    </div>

                    <div id="map" class="rounded-lg shadow"></div>
                    @include('showcase.mapjs')

                    <div class="text-4xl font-bold mt-4">{{ $potensi->luas_wilayah ?? '151' }} <span class="text-xl">km²</span></div>

                    <a href="https://maps.app.goo.gl/z48iAxa85jv13EFn8" target="_blank">
                        <button class="bg-white text-teal-600 px-3 py-1 text-sm rounded mt-2">Lihat Peta</button>
                    </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Grafik Pendidikan + Grid Potensi --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow flex flex-col items-center justify-center">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Fasilitas Pendidikan</h2>
                <div class="mb-2 text-sm text-gray-500 italic text-center">*Klik kategori untuk lihat detail sebaran di dusun.</div>
                <div id="chartFasilitas" class="w-full"></div>
            </div>

            <div>
                @include('components.grid-potensi', ['items' => $items])


            </div>
        </div>
        <p class="text-xl font-extrabold text-gray-500 mb-1">SUMBER DATA: {{ $detail_potensi->pluck('sumber')->filter()->unique()->implode(', ') }}</p>
    </div>

</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const totalKK_L = {{ $potensi->jml_kk_laki ?? 0 }};
    const totalKK_P = {{ $potensi->jml_kk_perempuan ?? 0 }};
    const totalKK = totalKK_L + totalKK_P;

    const totalPenduduk_L = {{ $potensi->j_penduduk_laki ?? 0 }};
    const totalPenduduk_P = {{ $potensi->j_penduduk_perempuan ?? 0 }};
    const totalPenduduk = totalPenduduk_L + totalPenduduk_P;

    document.addEventListener("DOMContentLoaded", () => {
        renderDoubleRadial('chartKK', totalKK_L, totalKK_P, '');
        renderDoubleRadial('chartPenduduk', totalPenduduk_L, totalPenduduk_P, '');
    });

    function renderDoubleRadial(targetId, male, female, label) {
        const total = male + female;

        const options = {
            chart: {
                height: 400,
                type: 'radialBar',
            },
            series: [Math.round((male / total) * 100), Math.round((female / total) * 100)],
            labels: ['Laki-laki', 'Perempuan'],
            plotOptions: {
                radialBar: {
                    offsetY: 0,
                    startAngle: 0,
                    endAngle: 360,
                    hollow: {
                        margin: 10,
                        size: '30%',
                        background: 'transparent',
                    },
                    track: {
                        background: '#f0f0f0',
                        strokeWidth: '100%',
                    },
                    dataLabels: {
                        name: {
                            show: true,
                            fontSize: '12px',
                        },
                        value: {
                            show: true,
                            fontSize: '16px',
                            formatter: function (val, opts) {
                                const raw = opts.seriesIndex === 0 ? male : female;
                                return `${raw} (${val}%)`;
                            }
                        },
                        total: {
                            show: true,
                            label: `Total ${label}`,
                            formatter: function () {
                                return total + ' Orang';
                            }
                        }
                    }
                }
            },
            colors: ['#3b82f6', '#ec4899'],
            legend: {
                show: false,
                position: 'bottom'
            }
        };
if (targetId === 'chartKK') {
    renderBreakdown('kkBreakdown', male, female);
} else if (targetId === 'chartPenduduk') {
    renderBreakdown('pendudukBreakdown', male, female);
}
        const chart = new ApexCharts(document.querySelector(`#${targetId}`), options);
        chart.render();
    }

    function renderBreakdown(containerId, male, female) {
    const total = male + female;
    const malePercent = Math.round((male / total) * 100);
    const femalePercent = Math.round((female / total) * 100);

      document.getElementById(containerId).innerHTML = `
        <div class="flex justify-center items-center gap-8" style="margin-top: 0.5rem;">
            <div class="flex flex-col items-center">
                <i class="mdi mdi-gender-male text-blue-600 text-3xl mb-1"></i>
                <span class="text-gray-700 text-sm font-medium">Laki-laki</span>
                <span class="text-lg font-semibold text-gray-800">${male}</span>
                <span class="text-xs text-gray-500">${malePercent}%</span>
            </div>
            <div class="flex flex-col items-center">
                <i class="mdi mdi-gender-female text-pink-500 text-3xl mb-1"></i>
                <span class="text-gray-700 text-sm font-medium">Perempuan</span>
                <span class="text-lg font-semibold text-gray-800">${female}</span>
                <span class="text-xs text-gray-500">${femalePercent}%</span>
            </div>
        </div>
    `;
}
</script>


<script>
    const dataFasilitas = @json($detail_potensi); // dari Laravel

    const jenisFasilitas = ['tk_ra', 'sd', 'smp_sederajat', 'sma'];
    const labelFasilitas = ['TK/RA', 'SD', 'SMP/Sederajat', 'SMA'];

    let chartFasilitas;

    function renderMainFasilitas() {
        const totalPerFasilitas = jenisFasilitas.map(key =>
            dataFasilitas.reduce((sum, d) => sum + (d[key] || 0), 0)
        );

        const options = {
            chart: {
                type: 'bar',
                height: 350,
                events: {
                    dataPointSelection: function (event, chartContext, config) {
                        const index = config.dataPointIndex;
                        const selectedKey = jenisFasilitas[index];
                        const selectedLabel = labelFasilitas[index];
                        showDetailFasilitas(selectedKey, selectedLabel);
                    }
                }
            },
            series: [{
                name: 'Total Fasilitas',
                data: totalPerFasilitas
            }],
            xaxis: {
                categories: labelFasilitas
            },
            plotOptions: {
                bar: {
                    distributed: true,
                    columnWidth: '55%'
                }
            },
            colors: ['#f87171', '#60a5fa', '#34d399', '#fbbf24'],
            title: {
                text: 'Jumlah Fasilitas Pendidikan (Klik untuk Lihat per Dusun)',
                align: 'center'
            },
            dataLabels: { enabled: true },
            legend: { show: false }
        };

        if (chartFasilitas) chartFasilitas.destroy();
        chartFasilitas = new ApexCharts(document.querySelector("#chartFasilitas"), options);
        chartFasilitas.render();
    }

    function showDetailFasilitas(key, label) {
        const dusunNames = dataFasilitas.map(d => d.dusun);
        const dataPerDusun = dataFasilitas.map(d => d[key] || 0);

        const options = {
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
                                renderMainFasilitas();
                            }
                        }]
                    }
                }
            },
            series: [{
                name: `Jumlah ${label}`,
                data: dataPerDusun
            }],
            xaxis: {
                categories: dusunNames,
                labels: { rotate: -45 }
            },
            plotOptions: {
                bar: {
                    distributed: true,
                    columnWidth: '55%'
                }
            },
            colors: ['#4ade80'],
            title: {
                text: `Jumlah ${label} di Setiap Dusun`,
                align: 'center'
            },
            dataLabels: { enabled: true },
            legend: { show: false }
        };

        chartFasilitas.destroy();
        chartFasilitas = new ApexCharts(document.querySelector("#chartFasilitas"), options);
        chartFasilitas.render();
    }

    document.addEventListener("DOMContentLoaded", function () {
        renderMainFasilitas();
    });
</script>
