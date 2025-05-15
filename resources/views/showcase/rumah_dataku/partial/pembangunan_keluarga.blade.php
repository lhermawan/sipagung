<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA PEMBANGUNAN KELUARGA)</span>
    </h1>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm">
    <div class="grid grid-cols-4 gap-4">
        @php
            $programs = [
                'BKB' => ['mengikuti' => 'bkb_mengikuti', 'tidak' => 'bkb_tidak_mengikuti'],
                'BKR' => ['mengikuti' => 'bkr_mengikuti', 'tidak' => 'bkr_tidak_mengikuti'],
                'BKL' => ['mengikuti' => 'bkl_mengikuti', 'tidak' => 'bkl_tidak_mengikuti'],
                'UPPKA' => ['mengikuti' => 'uppka_mengikuti', 'tidak' => 'uppka_tidak_mengikuti'],
                'PIK-R' => ['mengikuti' => 'pik_r_mengikuti', 'tidak' => 'pik_r_tidak_mengikuti'],
            ];
            $keys = array_keys($programs);
            $dusuns = $pembangunanKeluarga->pluck('dusun')->toArray();
        @endphp

        @foreach ($programs as $program => $fields)
            @php
                $index = array_search($program, $keys);
            @endphp

            <div @class([
                'col-span-2 col-start-2 flex justify-center' => $index === 4,
                'col-span-2' => $index !== 4,
            ])>
                <div class="w-full">
                    <h4 class="text-center font-semibold mb-4">{{ $program }}</h4>
                    <div id="chart-{{ strtolower($program) }}"></div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-center mt-8">
        <p class="text-gray-500">© {{ date('Y') }} Rumah Dataku</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const pembangunanData = @json($pembangunanKeluarga);
    const dusuns = @json($dusuns);

    const programs = {
        @foreach ($programs as $program => $fields)
        "{{ strtolower($program) }}": {
            mengikuti: "{{ $fields['mengikuti'] }}",
            tidak: "{{ $fields['tidak'] }}"
        },
        @endforeach
    };

    Object.keys(programs).forEach(programKey => {
        const mengikutiData = pembangunanData.map(d => d[programs[programKey].mengikuti]);
        const tidakData = pembangunanData.map(d => d[programs[programKey].tidak]);

        const options = {
            chart: {
                type: 'bar',
                height: 300,
                toolbar: { show: false }
            },
            series: [
                {
                    name: 'Mengikuti',
                    data: mengikutiData
                },
                {
                    name: 'Tidak Mengikuti',
                    data: tidakData
                }
            ],
            xaxis: {
                categories: dusuns
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ['#008FFB', '#FF4560'],
            legend: {
                position: 'top'
            },
            yaxis: {
                min: 0,
                tickAmount: 5
            }
        };

        const chart = new ApexCharts(document.querySelector(`#chart-${programKey}`), options);
        chart.render();
    });
});
</script>
