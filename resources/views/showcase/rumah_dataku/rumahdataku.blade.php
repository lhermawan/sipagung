<!-- resources/views/showcase/rumahdataku.blade.php -->
@extends('navbar-tailwind.navbar')
@section('title', 'Rumah Dataku')
@section('content')

<!-- Hero Section -->




<!-- Menu Section -->
<section class="flex flex-col gap-6 md:px-20 px-5 mt-32">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">RUMAH DATA KEPENDUDUKAN <span class="text-primary">(RUMAH DATAKU)</span></h1>
        <p class="text-sm text-gray-500 mt-2">KAMPUNG KB “MEKAR RAHAYU” <br> DESA PAYUNGAGUNG, KEC. PANUMBANGAN, KAB. CIAMIS</p>
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @php
            $menus = [
                ['id' => 'data-kuantitas', 'label' => 'DATA KUANTITAS', 'icon' => 'mdi-account-multiple'],
                ['id' => 'data-kualitas', 'label' => 'DATA KUALITAS', 'icon' => 'mdi-star-check'],
                ['id' => 'data-migrasi', 'label' => 'DATA MIGRASI DESA', 'icon' => 'mdi-truck-delivery'],
                ['id' => 'data-perlindungan', 'label' => 'DATA PERLINDUNGAN SOSIAL', 'icon' => 'mdi-shield-account'],
                ['id' => 'data-administrasi', 'label' => 'DATA ADMINISTRASI KEPENDUDUKAN', 'icon' => 'mdi-file-document'],
                ['id' => 'data-pembangunan', 'label' => 'DATA PEMBANGUNAN KELUARGA', 'icon' => 'mdi-home-group'],
                ['id' => 'data-potensi', 'label' => 'DATA POTENSI DESA', 'icon' => 'mdi-chart-tree'],
                ['id' => 'data-infografis', 'label' => 'INFOGRAFIS DESA PAYUNGAGUNG', 'icon' => 'mdi-chart-pie'],
            ];
        @endphp

        @foreach ($menus as $menu)
    <button id="btn-{{ $menu['id'] }}"
        onclick="showSection('{{ $menu['id'] }}')"
        class="relative group w-full overflow-hidden rounded-xl p-6 bg-grey border border-gray-200 shadow-md hover:shadow-xl transition-all duration-300 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-700 hover:text-white">

        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-blue-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

        <div class="relative z-10 flex flex-col items-center space-y-3">
            <div class="text-black group-hover:text-white transition duration-300">
                <i class="mdi {{ $menu['icon'] }} text-4xl"></i>
            </div>
            <span class="text-base md:text-lg font-semibold">{{ $menu['label'] }}</span>
        </div>

        {{-- Shine effect --}}
        <span class="absolute top-0 left-0 w-full h-full bg-white opacity-10 transform rotate-45 translate-x-[-100%] group-hover:translate-x-[200%] transition-transform duration-1000 ease-in-out"></span>
    </button>
@endforeach
    </div>

    <!-- Section: Data Kuantitas (Contoh) -->
    <div id="data-kuantitas" class="hidden">
        @include('showcase.rumah_dataku.kuantitas')
    </div>

    <!-- Placeholder for other data sections -->
    <div id="data-kualitas" class="hidden">
        @include('showcase.rumah_dataku.demografi')
    </div>
    <div id="data-migrasi" class="hidden">...</div>
    <div id="data-perlindungan" class="hidden">...</div>
    <div id="data-administrasi" class="hidden">...</div>
    <div id="data-pembangunan" class="hidden">...</div>
    <div id="data-potensi" class="hidden">...</div>
    <div id="data-infografis" class="hidden">...</div>
</section>
<script>
    const sections = [
        'data-kuantitas',
        'data-kualitas',
        'data-migrasi',
        'data-perlindungan',
        'data-administrasi',
        'data-pembangunan',
        'data-potensi',
        'data-infografis'
    ];

    function showSection(id) {
        // Sembunyikan semua section
        sections.forEach(sec => {
            document.getElementById(sec).classList.add('hidden');
            const btn = document.getElementById('btn-' + sec);
            if (btn) btn.classList.remove('bg-blue-600', 'text-white');
        });

        // Tampilkan section yang dipilih
        document.getElementById(id).classList.remove('hidden');

        // Tandai tombol aktif
        const activeBtn = document.getElementById('btn-' + id);
        if (activeBtn) activeBtn.classList.add('bg-blue-600', 'text-white');
    }

    // Hapus tampilan default
    document.addEventListener('DOMContentLoaded', () => {
        sections.forEach(sec => document.getElementById(sec).classList.add('hidden'));
    });
</script>


@endsection
