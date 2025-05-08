@extends('navbar-tailwind.navbar')
@section('title', 'Demografi Desa')
@section('content')
<div class="flex flex-col gap-6 md:px-20 px-5 mt-32">
    <div class="flex flex-col gap-8">


        {{-- Stat Cards Section 1 --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $stats1 = [
                    ['label' => 'JUMLAH RW/DUSUN', 'value' => $demografi->j_rw, 'color' => 'primary', 'icon' => 'mdi-navigation-variant'],
                    ['label' => 'JUMLAH RT', 'value' => $demografi->j_rt, 'color' => 'secondary', 'icon' => 'mdi-sign-direction'],
                    ['label' => 'LUAS WILAYAH', 'value' => $demografi->luas_wilayah . ' km²', 'color' => 'purple-700', 'icon' => 'mdi-earth'],
                    ['label' => 'KETINGGIAN WILAYAH', 'value' => $demografi->ketinggian_wilayah . ' mdpl', 'color' => 'cyan-400', 'icon' => 'mdi-slope-uphill'],
                ];
            @endphp

            @foreach ($stats1 as $stat)
                <div class="bg-white rounded-xl shadow-md border-t-4 border-{{ $stat['color'] }} p-5">
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="font-dmsans text-{{ $stat['color'] }} text-xs font-semibold">{{ $stat['label'] }}</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $stat['value'] }}</p>
                        </div>
                        <i class="mdi {{ $stat['icon'] }} text-5xl text-slate-200 hidden md:block"></i>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Stat Cards Section 2 --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $stats2 = [
                    ['label' => 'JUMLAH KK', 'value' => number_format($demografi->j_kk, 0, ',', '.'), 'color' => 'primary', 'icon' => 'mdi-account-tie'],
                    ['label' => 'JUMLAH PENDUDUK', 'value' => number_format($demografi->j_penduduk, 0, ',', '.'), 'color' => 'cyan-400', 'icon' => 'mdi-account-group'],
                    ['label' => 'PENDUDUK LAKI-LAKI', 'value' => number_format($demografi->j_penduduk_laki, 0, ',', '.'), 'color' => 'purple-700', 'icon' => 'mdi-face-man'],
                    ['label' => 'PENDUDUK PEREMPUAN', 'value' => number_format($demografi->j_penduduk_perempuan, 0, ',', '.'), 'color' => 'secondary', 'icon' => 'mdi-face-woman'],
                ];
            @endphp

            @foreach ($stats2 as $stat)
                <div class="bg-white rounded-xl shadow-md border-t-4 border-{{ $stat['color'] }} p-5">
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="font-dmsans text-{{ $stat['color'] }} text-xs font-semibold">{{ $stat['label'] }}</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $stat['value'] }}</p>
                        </div>
                        <i class="mdi {{ $stat['icon'] }} text-5xl text-slate-200 hidden md:block"></i>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Stat Cards Section 3 --}}
        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
            @php
                $stats3 = [
                    ['label' => 'JUMLAH WANITA KAWIN', 'value' => $demografi->j_wanita_kawin, 'color' => 'primary', 'icon' => 'mdi-account-tie-woman'],
                    ['label' => 'JUMLAH PUS HAMIL', 'value' => $demografi->j_pus_hamil, 'color' => 'secondary', 'icon' => 'mdi-human-pregnant'],
                    ['label' => 'JUMLAH PUS PESERTA KB MODERN', 'value' => $demografi->j_pus_kb_modern, 'color' => 'purple-700', 'icon' => 'mdi-shield-check'],
                ];
            @endphp

            @foreach ($stats3 as $stat)
                <div class="bg-white rounded-xl shadow-md border-t-4 border-{{ $stat['color'] }} p-5 col-span-2 md:col-span-1">
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="font-dmsans text-{{ $stat['color'] }} text-xs font-semibold">{{ $stat['label'] }}</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $stat['value'] }}</p>
                        </div>
                        <i class="mdi {{ $stat['icon'] }} text-5xl text-slate-200 hidden md:block"></i>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Stat Cards Section 4 --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $stats4 = [
                    ['label' => 'JUMLAH IKUT BKB', 'value' => $demografi->j_bkb, 'color' => 'primary', 'icon' => 'mdi-baby'],
                    ['label' => 'JUMLAH IKUT BKR', 'value' => $demografi->j_bkr, 'color' => 'secondary', 'icon' => 'mdi-human-male-female'],
                    ['label' => 'JUMLAH IKUT BKL', 'value' => $demografi->j_bkl, 'color' => 'purple-700', 'icon' => 'mdi-human-cane'],
                    ['label' => 'JUMLAH IKUT UPPKS', 'value' => $demografi->j_uppks, 'color' => 'cyan-400', 'icon' => 'mdi-hand-coin'],
                ];
            @endphp

            @foreach ($stats4 as $stat)
                <div class="bg-white rounded-xl shadow-md border-t-4 border-{{ $stat['color'] }} p-5">
                    <div class="flex justify-between items-center">
                        <div class="space-y-1">
                            <p class="font-dmsans text-{{ $stat['color'] }} text-xs font-semibold">{{ $stat['label'] }}</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $stat['value'] }}</p>
                        </div>
                        <i class="mdi {{ $stat['icon'] }} text-5xl text-slate-200 hidden md:block"></i>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Future Charts (commented for now) --}}
        {{--
        <div class="grid grid-cols-2 gap-6">
            <x-chart.gender />
            <x-chart.kk-individu />
        </div>
        <x-chart.pendidikan-usia />
        <div class="grid grid-cols-2 gap-6">
            <x-chart.jaminan-kesehatan />
            <x-chart.akta-lahir />
        </div>
        <div class="grid grid-cols-2 gap-6">
            <x-chart.akta-nikah />
            <x-chart.rumah-layak-huni />
        </div>
        <div class="grid grid-cols-2 gap-6">
            <x-chart.usaha-ekonomi />
            <x-chart.resiko-stunting />
        </div>
        --}}
    </div>
</div>
@endsection
