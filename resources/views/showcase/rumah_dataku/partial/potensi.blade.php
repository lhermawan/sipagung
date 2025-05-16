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
  
    
    {{-- Grafik Potensi --}}
    <div class="my-10 px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Grafik KK & Penduduk --}}
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-bold mb-4 text-center text-gray-800">Perbandingan Jumlah KK dan Penduduk per Jenis Kelamin</h2>
                <div class="mb-2 text-sm text-gray-600 italic text-center">
                    *Klik tombol di bawah untuk mengganti mode grafik antara <strong>Penduduk</strong> dan <strong>KK</strong>.
                </div>
                <div class="mb-4 text-center">
                    <button id="toggleBtn" onclick="toggleMode()" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Mode: Penduduk
                    </button>
                </div>
                <div id="chartUtama"></div>
            </div>

            {{-- Grafik Fasilitas Pendidikan --}}
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-bold mb-4 text-center text-gray-800">Fasilitas Pendidikan per Jenis</h2>
                <div class="mb-2 text-sm text-gray-600 italic text-center">
                    *Klik kategori untuk melihat sebaran fasilitas tersebut di tiap dusun.
                </div>
                <div id="chartFasilitas"></div>
            </div>
        </div>
    </div>
    {{-- Include Komponen Grid Potensi --}}
    @include('components.grid-potensi', ['items' => $items])

    
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    const dusunData = @json($detail_potensi); // dari controller

    let currentMode = 'penduduk';
    let chartUtama;

    function toggleMode() {
    // Toggle antara penduduk dan kk
    currentMode = currentMode === 'penduduk' ? 'kk' : 'penduduk';

    // Update tampilan tombol
    const btn = document.getElementById("toggleBtn");
    btn.innerText = `Mode: ${capitalize(currentMode)}`;
    btn.className = currentMode === 'penduduk'
        ? 'px-4 py-2 bg-blue-600 text-white rounded mb-4'
        : 'px-4 py-2 bg-green-600 text-white rounded mb-4';

    // Render ulang grafik berdasarkan mode
    renderMainChart();
}

function capitalize(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
}

document.addEventListener("DOMContentLoaded", function () {
    renderMainChart();
});
    const warna = {
        penduduk: ['#3b82f6', '#ec4899'],
        kk: ['#10b981', '#f59e0b']
    };

    const categories = dusunData.map(d => d.dusun);

    const getSeriesData = () => {
        if (currentMode === 'penduduk') {
            return dusunData.map(d => (d.j_penduduk_laki || 0) + (d.j_penduduk_perempuan || 0));
        } else {
            return dusunData.map(d => (d.jml_kk_laki || 0) + (d.jml_kk_perempuan || 0));
        }
    };

    const getDetailData = (dusun) => {
        if (currentMode === 'penduduk') {
            return [dusun.j_penduduk_laki || 0, dusun.j_penduduk_perempuan || 0];
        } else {
            return [dusun.jml_kk_laki || 0, dusun.jml_kk_perempuan || 0];
        }
    };

    const getDetailLabel = () => {
        return currentMode === 'penduduk' ? ['Laki-laki', 'Perempuan'] : ['KK Laki-laki', 'KK Perempuan'];
    };

    const renderMainChart = () => {
        const options = {
            chart: {
                type: 'bar',
                height: 300,
                toolbar: { show: false },
                events: {
                    dataPointSelection: function (event, chartContext, config) {
                        const index = config.dataPointIndex;
                        const dusun = dusunData[index];
                        showDetail(dusun);
                    }
                }
            },
            series: [{
                name: currentMode === 'penduduk' ? 'Total Penduduk' : 'Total KK',
                data: getSeriesData()
            }],
            xaxis: { categories },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    distributed: true
                }
            },
            colors: warna[currentMode],
            dataLabels: { enabled: true },
            title: {
                text: `Jumlah ${currentMode === 'penduduk' ? 'Penduduk' : 'KK'} per Dusun (Klik untuk Detail)`,
                align: 'center'
            }
        };

        if (chartUtama) chartUtama.destroy();
        chartUtama = new ApexCharts(document.querySelector("#chartUtama"), options);
        chartUtama.render();
    };

    const showDetail = (dusun) => {
    const detailData = getDetailData(dusun);
    const label = getDetailLabel();

    const options = {
        chart: {
            type: 'pie',
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
                            renderMainChart();
                        }
                    }]
                }
            }
        },
        labels: label,
        series: detailData,
        colors: warna[currentMode],
        title: {
            text: `Rincian ${currentMode === 'penduduk' ? 'Penduduk' : 'KK'} di Dusun ${dusun.dusun}`,
            align: 'center'
        },
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            dropShadow: {
                enabled: true
            },
            enabled: true,
            textAnchor: 'middle',
            formatter: function (val, opts) {
                return opts.w.globals.labels[opts.seriesIndex] + ': ' + Math.round(val) + '%';
            }
        }
    };

    chartUtama.destroy();
    chartUtama = new ApexCharts(document.querySelector("#chartUtama"), options);
    chartUtama.render();
};

    function setMode(mode) {
        currentMode = mode;
        renderMainChart();
    }

    // Init pertama
    renderMainChart();
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
