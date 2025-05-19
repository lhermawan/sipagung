<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA POTENSI DESA)</span>
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
            <div class="bg-teal-600 text-white p-6 rounded-xl shadow flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-bold">Luas Wilayah</h2>
                    <div id="map" class="rounded-lg shadow" ></div>
                    @include('showcase.mapjs')
                    <div class="text-4xl font-bold mt-4">{{ $potensi->luas_wilayah ?? '151' }} <span class="text-xl">km²</span></div>
                    <a href="https://maps.app.goo.gl/z48iAxa85jv13EFn8" target="_blank"><button class="bg-white text-teal-600 px-3 py-1 text-sm rounded mt-2">Lihat Peta</button>
                    </a>
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
