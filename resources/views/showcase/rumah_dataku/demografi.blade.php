{{-- Stat Sections --}}
@php
    $statSections = [
        [
            'title' => 'Data Wilayah',
            'stats' => [
                ['label' => 'JUMLAH RW/DUSUN', 'value' => $demografi->j_rw, 'color' => 'blue-500', 'icon' => 'mdi-navigation-variant'],
                ['label' => 'JUMLAH RT', 'value' => $demografi->j_rt, 'color' => 'indigo-500', 'icon' => 'mdi-sign-direction'],
                ['label' => 'LUAS WILAYAH', 'value' => $demografi->luas_wilayah . ' km²', 'color' => 'purple-500', 'icon' => 'mdi-earth'],
                ['label' => 'KETINGGIAN', 'value' => $demografi->ketinggian_wilayah . ' mdpl', 'color' => 'cyan-500', 'icon' => 'mdi-slope-uphill'],
            ]
        ],
        [
            'title' => 'Data Penduduk',
            'stats' => [
                ['label' => 'JUMLAH KK', 'value' => number_format($demografi->j_kk, 0, ',', '.'), 'color' => 'teal-500', 'icon' => 'mdi-account-tie'],
                ['label' => 'JUMLAH PENDUDUK', 'value' => number_format($demografi->j_penduduk, 0, ',', '.'), 'color' => 'green-500', 'icon' => 'mdi-account-group'],
                ['label' => 'LAKI-LAKI', 'value' => number_format($demografi->j_penduduk_laki, 0, ',', '.'), 'color' => 'blue-500', 'icon' => 'mdi-face-man'],
                ['label' => 'PEREMPUAN', 'value' => number_format($demografi->j_penduduk_perempuan, 0, ',', '.'), 'color' => 'pink-500', 'icon' => 'mdi-face-woman'],
            ]
        ],
        [
            'title' => 'Data PUS & KB',
            'stats' => [
                ['label' => 'WANITA KAWIN', 'value' => $demografi->j_wanita_kawin, 'color' => 'rose-500', 'icon' => 'mdi-account-tie-woman'],
                ['label' => 'PUS HAMIL', 'value' => $demografi->j_pus_hamil, 'color' => 'amber-500', 'icon' => 'mdi-human-pregnant'],
                ['label' => 'PUS KB MODERN', 'value' => $demografi->j_pus_kb_modern, 'color' => 'violet-500', 'icon' => 'mdi-shield-check'],
            ]
        ],
        [
            'title' => 'Partisipasi Program',
            'stats' => [
                ['label' => 'IKUT BKB', 'value' => $demografi->j_bkb, 'color' => 'lime-500', 'icon' => 'mdi-baby'],
                ['label' => 'IKUT BKR', 'value' => $demografi->j_bkr, 'color' => 'emerald-500', 'icon' => 'mdi-human-male-female'],
                ['label' => 'IKUT BKL', 'value' => $demografi->j_bkl, 'color' => 'orange-500', 'icon' => 'mdi-human-cane'],
                ['label' => 'IKUT UPPKS', 'value' => $demografi->j_uppks, 'color' => 'fuchsia-500', 'icon' => 'mdi-hand-coin'],
            ]
        ],
    ];
@endphp

@foreach ($statSections as $section)
    <div class="mb-10">
        <h3 class="text-lg font-semibold text-gray-600 mb-4">{{ $section['title'] }}</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($section['stats'] as $stat)
                <div class="bg-white border-l-4 border-{{ $stat['color'] }} rounded-xl shadow hover:shadow-md transition p-4">
                    <div class="flex items-center space-x-4">
                        <i class="mdi {{ $stat['icon'] }} text-3xl text-{{ $stat['color'] }}"></i>
                        <div>
                            <p class="text-xs text-gray-500 font-medium uppercase">{{ $stat['label'] }}</p>
                            <p class="text-lg font-semibold text-gray-700">{{ $stat['value'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach
