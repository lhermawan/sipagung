@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: {!! json_encode($data1->pluck('y')) !!},
        chart: {
            type: 'pie',
            height: 400,
        },
        labels: {!! json_encode($data1->pluck('name')) !!},
        colors: ['#1E40AF', '#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#6366F1', '#EC4899', '#14B8A6', '#F43F5E', '#8B5CF6'],
        title: {
            text: 'Statistik Pekerjaan Warga',
            align: 'center',
            style: {
                fontSize: '20px',
                fontWeight: 'bold',
                color: '#111'
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return opts.w.globals.labels[opts.seriesIndex] + ": " + val.toFixed(1) + "%"
            },
            style: {
                fontSize: '14px',
                fontWeight: 'bold'
            }
        },
        legend: {
            position: 'bottom'
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return val + " orang";
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#jobChart"), options);
    chart.render();
</script>
@endsection
                                