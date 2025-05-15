<section class="my-10">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Rekap Potensi Desa</h2>

    @php
        $items = [
            'Posyandu' => $potensi->posyandu,
            'TK/RA' => $potensi->tk_ra,
            'SD' => $potensi->sd,
            'SMP/Sederajat' => $potensi->smp_sederajat,
            'SMA' => $potensi->sma,
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
            'Penduduk Laki-laki' => $potensi->j_penduduk_laki,
            'Penduduk Perempuan' => $potensi->j_penduduk_perempuan,
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-4">
        @foreach($items as $label => $value)
            <div class="bg-white rounded shadow p-4 border border-gray-200">
                <div class="text-gray-600 text-sm mb-1">{{ $label }}</div>
                <div class="text-xl font-semibold text-gray-900">{{ number_format($value) }}</div>
            </div>
        @endforeach
    </div>
</section>
