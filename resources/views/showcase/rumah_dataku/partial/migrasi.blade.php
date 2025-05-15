<section class="">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">
            RUMAH DATAKU <span class="text-primary">(DATA MIGRASI)</span>
        </h1>
    </div>

    <div class="text-center mb-4">
        <h2 id="yearTitle" class="text-2xl font-bold mb-2"></h2>
        <div class="space-x-2 mb-3">
            <button id="prevButton" class="px-3 py-1 bg-gray-500 text-white rounded">⬅ Prev</button>
            <button id="playButton" class="px-3 py-1 bg-green-600 text-white rounded">▶ Play</button>
            <button id="pauseButton" class="px-3 py-1 bg-yellow-500 text-white rounded">⏸ Pause</button>
            <button id="nextButton" class="px-3 py-1 bg-gray-500 text-white rounded">Next ➡</button>
        </div>

        <input id="slider" type="range" min="0" max="0" value="0" class="w-1/2 mt-4">
    </div>

    <div id="chartContainer" class="transition-opacity duration-500 opacity-100">
        <div id="chartMigrasi" class="w-full"></div>
    </div>
</section>

@php
    $dataMigrasi = $migrasiDesa->map(function ($item) {
        return [
            'tahun' => $item->tahun,
            'masuk' => $item->masuk,
            'keluar' => $item->keluar,
            'komuter' => $item->komuter,
            'musiman' => $item->musiman,
            'jenis' => $item->jenis,
        ];
    });
@endphp

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    const dataMigrasi = {!! json_encode($dataMigrasi) !!};
    let currentIndex = 0;
    let interval = null;

    const chart = new ApexCharts(document.querySelector("#chartMigrasi"), {
        chart: {
            type: 'bar',
            height: 400,
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 500
            }
        },
        plotOptions: {
            bar: {
                distributed: true, // membuat animasi batang satu per satu
                columnWidth: '60%'
            }
        },
        dataLabels: {
            enabled: true,
            style: {
                fontSize: '14px'
            },
            formatter: (val) => val,
        },
        series: [{
            name: 'Jumlah',
            data: []
        }],
        xaxis: {
            categories: [],
            title: {
                text: 'Jenis Migrasi'
            }
        },
        yaxis: {
            title: {
                text: 'Jumlah'
            }
        },
        title: {
            text: 'Grafik Migrasi per Tahun',
            align: 'center'
        },
        colors: ['#00b894', '#fdcb6e', '#0984e3', '#d63031']
    });

    chart.render();

    const slider = document.getElementById('slider');
    slider.max = dataMigrasi.length - 1;

    function fadeOutIn(callback) {
        const container = document.getElementById('chartContainer');
        container.classList.add('opacity-0');
        setTimeout(() => {
            callback();
            container.classList.remove('opacity-0');
        }, 300);
    }

    function updateChart(index) {
        if (index < 0 || index >= dataMigrasi.length) return;

        const tahunData = dataMigrasi[index];
        const categories = ['Masuk', 'Keluar', 'Komuter', 'Musiman'];
        const values = [tahunData.masuk, tahunData.keluar, tahunData.komuter, tahunData.musiman];

        fadeOutIn(() => {
            chart.updateOptions({
                xaxis: { categories },
                series: [{ data: values }]
            });

            document.getElementById('yearTitle').innerText = `Tahun ${tahunData.tahun} (${tahunData.jenis})`;
            slider.value = index;
            document.getElementById('prevButton').disabled = (index === 0);
            document.getElementById('nextButton').disabled = (index === dataMigrasi.length - 1);
        });
    }

    document.getElementById('playButton').addEventListener('click', () => {
        clearInterval(interval);
        interval = setInterval(() => {
            if (currentIndex < dataMigrasi.length - 1) {
                currentIndex++;
                updateChart(currentIndex);
            } else {
                clearInterval(interval);
            }
        }, 1800);
    });

    document.getElementById('pauseButton').addEventListener('click', () => {
        clearInterval(interval);
    });

    document.getElementById('nextButton').addEventListener('click', () => {
        clearInterval(interval);
        if (currentIndex < dataMigrasi.length - 1) {
            currentIndex++;
            updateChart(currentIndex);
        }
    });

    document.getElementById('prevButton').addEventListener('click', () => {
        clearInterval(interval);
        if (currentIndex > 0) {
            currentIndex--;
            updateChart(currentIndex);
        }
    });

    slider.addEventListener('input', (e) => {
        clearInterval(interval);
        currentIndex = parseInt(e.target.value);
        updateChart(currentIndex);
    });

    updateChart(currentIndex);
</script>
