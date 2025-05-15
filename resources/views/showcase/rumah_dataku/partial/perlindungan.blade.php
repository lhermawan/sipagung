<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(DATA PERLINDUNGAN SOSIAL)</span>
    </h1>
</div>
<div class="bg-white rounded-xl p-6 shadow-sm">


    @if($perlindungan)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
            <div class="bg-blue-50 p-4 rounded shadow text-center">
                <div class="text-xl font-bold text-blue-600">{{ $perlindungan->j_individu }}</div>
                <div class="text-gray-600 mt-1">Jumlah Individu Memiliki BPJS</div>
            </div>
            <div class="bg-green-50 p-4 rounded shadow text-center">
                <div class="text-xl font-bold text-green-600">{{ $perlindungan->j_pus }}</div>
                <div class="text-gray-600 mt-1">Jumlah PUS Memiliki BPJS</div>
            </div>
            <div class="bg-purple-50 p-4 rounded shadow text-center">
                <div class="text-xl font-bold text-purple-600">{{ $perlindungan->j_pus_kb }}</div>
                <div class="text-gray-600 mt-1">Jumlah PUS Peserta KB Memiliki BPJS</div>
            </div>
            <div class="bg-yellow-50 p-4 rounded shadow text-center">
                <div class="text-xl font-bold text-yellow-600">{{ $perlindungan->j_pus_pkh }}</div>
                <div class="text-gray-600 mt-1">Jumlah PUS Penerima Bantuan PKH</div>
            </div>
        </div>
    @else
        <p class="text-gray-500">Data belum tersedia.</p>
    @endif
</div>
