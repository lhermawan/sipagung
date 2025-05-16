<section class="my-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Rekap Potensi Desa</h2>

    @php
        $items = [
            'Posyandu' => $potensi->posyandu,

            'PKBM' => $potensi->pkbm,
            'Fasilitas Olahraga' => $potensi->fasilitas_olahraga,
            'Fasilitas Kesehatan' => $potensi->fasilitas_kesehatan,
            'Fasilitas Ibadah' => $potensi->fasilitas_ibadah,
            'Pasar' => $potensi->pasar,
            'BKB' => $potensi->bkb,
            'BKR' => $potensi->bkr,
            'BKL' => $potensi->bkl,
            'UPPKA' => $potensi->uppka,
            'PIK-R' => $potensi->pik_r,
            'Stunting / Gizi Buruk' => $potensi->stunting_gizi_buruk,
            'Produk Unggulan' => $potensi->produk_unggulan,
            'Luas Jalan (m)' => $potensi->luas_jalan,
            'Jumlah RW' => $potensi->j_rw_dusun,
            'Jumlah RT' => $potensi->j_rt,
            'Luas Wilayah (km²)' => $potensi->luas_wilayah,
            'Ketinggian (mdpl)' => $potensi->ketinggian,
           
        ];
    @endphp
<div class="my-10 px-4">


    <div class="my-10 px-4">
        <!-- Grid Container -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Bagian Grafik Penduduk / KK -->
            <div class="bg-white p-4 rounded shadow">
                <!-- Judul Grafik Penduduk -->
                <h2 class="text-xl font-bold mb-4 text-center text-gray-800">
                    Perbandingan Jumlah KK dan Penduduk per Jenis Kelamin
                </h2>

                <!-- Keterangan -->
                <div class="mb-2 text-sm text-gray-600 italic text-center">
                    *Klik tombol di bawah untuk mengganti mode grafik antara <strong>Penduduk</strong> dan <strong>KK</strong>.
                </div>

                <!-- Tombol Toggle -->
                <div class="mb-4 text-center">
                    <button id="toggleBtn" onclick="toggleMode()" class="px-4 py-2 bg-blue-600 text-white rounded">
                        Mode: Penduduk
                    </button>
                </div>

                <!-- Grafik -->
                <div id="chartUtama"></div>
            </div>

            <!-- Bagian Grafik Fasilitas Pendidikan -->
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-bold mb-4 text-center text-gray-800">
                    Fasilitas Pendidikan per Jenis
                </h2>
                <div class="mb-2 text-sm text-gray-600 italic text-center">
                    *Klik kategori untuk melihat sebaran fasilitas tersebut di tiap dusun.
                </div>
                <div id="chartFasilitas"></div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4">
        @foreach($items as $label => $value)
            <div class="bg-white rounded shadow p-4 border border-gray-200">
                <div class="text-gray-600 text-sm mb-1">{{ $label }}</div>
                <div class="text-xl font-semibold text-gray-900">{{ number_format($value) }}</div>
            </div>
        @endforeach
    </div>

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
