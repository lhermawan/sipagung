<!-- resources/views/showcase/rumahdataku.blade.php -->
@extends('navbar-tailwind.navbar')
@section('title', 'Rumah Dataku')
@section('content')

<!-- Hero Section -->
{{-- <section class="relative h-[60vh] bg-cover bg-center" style="background-image: url('/assets/img/sawah2.jpg')">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-white text-center px-4">
            <h1 class="text-3xl md:text-5xl font-bold mb-4">RUMAH DATA KEPENDUDUKAN (RUMAH DATAKU)</h1>
            <p class="text-lg md:text-xl">KAMPUNG KB “MEKAR RAHAYU” <br> DESA PAYUNGAGUNG, KEC. PANUMBANGAN, KAB. CIAMIS</p>
        </div>
    </div>
</section> --}}




<!-- Menu Section -->
<section class="flex flex-col gap-6 md:px-20 px-5 mt-32">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">RUMAH DATA KEPENDUDUKAN <span class="text-primary">(RUMAH DATAKU)</span></h1>
        <p class="text-sm text-gray-500 mt-2">KAMPUNG KB “MEKAR RAHAYU” <br> DESA PAYUNGAGUNG, KEC. PANUMBANGAN, KAB. CIAMIS</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $menus = [
    ['id' => 'data-kuantitas', 'label' => 'DATA KUANTITAS', 'icon' => 'mdi-account-multiple', 'color' => 'blue'],
    ['id' => 'data-kualitas', 'label' => 'DATA KUALITAS', 'icon' => 'mdi-star-check', 'color' => 'green'],
    ['id' => 'data-migrasi', 'label' => 'DATA MIGRASI DESA', 'icon' => 'mdi-truck-delivery', 'color' => 'purple'],
    ['id' => 'data-perlindungan', 'label' => 'DATA PERLINDUNGAN SOSIAL', 'icon' => 'mdi-shield-account', 'color' => 'red'],
    ['id' => 'data-administrasi', 'label' => 'DATA ADMINISTRASI KEPENDUDUKAN', 'icon' => 'mdi-file-document', 'color' => 'indigo'],
    ['id' => 'data-pembangunan', 'label' => 'DATA PEMBANGUNAN KELUARGA', 'icon' => 'mdi-home-group', 'color' => 'orange'],
    ['id' => 'data-potensi', 'label' => 'DATA POTENSI DESA', 'icon' => 'mdi-chart-tree', 'color' => 'teal'],
    ['id' => 'data-infografis', 'label' => 'INFOGRAFIS DESA PAYUNGAGUNG', 'icon' => 'mdi-chart-pie', 'color' => 'rose'],
];
        @endphp

@foreach ($menus as $menu)
    @php $clr = $menu['color']; @endphp
    <button id="btn-{{ $menu['id'] }}"
        onclick="showSection('{{ $menu['id'] }}')"
        class="relative group w-full overflow-hidden rounded-xl p-3 md:p-4 h-24 min-h-[6rem]
        bg-{{ $clr }}-100 border border-gray-200 shadow-sm transition-all duration-300
        hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 active:scale-95">

        {{-- Hover Shine --}}
        <span class="absolute inset-0 w-full h-full group-hover:bg-gradient-to-r group-hover:from-{{ $clr }}-500 group-hover:to-{{ $clr }}-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

        <div class="relative z-10 flex flex-col items-center justify-center space-y-2">
            <div class="icon transition duration-300 text-{{ $clr }}-600">
                <i class="mdi {{ $menu['icon'] }} text-2xl"></i>
            </div>
            <span class="text-sm md:text-base font-medium text-center leading-snug label">{{ $menu['label'] }}</span>
        </div>

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
<style>
 .active-button {
    background-image: linear-gradient(to right, var(--tw-gradient-from), var(--tw-gradient-to));
    color: white !important;
}
.active-button .icon {
    color: white !important;
}
    .fade-in {
        animation: fadeIn 0.6s ease-in-out both;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
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
    const colorMap = @json(array_column($menus, 'color', 'id'));

    sections.forEach(sec => {
        const sectionEl = document.getElementById(sec);
        const btn = document.getElementById('btn-' + sec);
        const color = colorMap[sec];

        // Sembunyikan semua section
        sectionEl?.classList.add('hidden');
        sectionEl?.classList.remove('fade-in');

        // Perbarui tombol yang tidak aktif
        if (btn) {
            // Menghapus kelas aktif dari tombol
            btn.classList.remove('active-button', `from-${color}-500`, `to-${color}-700`, `text-white`);
            
            // Menambahkan kelas warna default untuk tombol tidak aktif
            btn.classList.add(`bg-${color}-100`, `text-${color}-600`);

            const icon = btn.querySelector('.icon');
            icon?.classList.remove('text-white');
            icon?.classList.add(`text-${color}-600`); // Ikon memiliki warna teks yang sesuai
        }
    });

    // Menampilkan section yang dipilih
    const activeSection = document.getElementById(id);
    const activeBtn = document.getElementById('btn-' + id);
    const color = colorMap[id];

    activeSection?.classList.remove('hidden');
    activeSection?.classList.add('fade-in');

    // Perbarui tombol yang aktif
    if (activeBtn) {
        activeBtn.classList.remove(`bg-${color}-100`, `text-${color}-600`); // Menghapus kelas warna default
        
        // Menambahkan kelas aktif dengan gradien dan teks putih
        activeBtn.classList.add('active-button', `from-${color}-500`, `to-${color}-700`, 'text-white');
        
        const icon = activeBtn.querySelector('.icon');
        icon?.classList.remove(`text-${color}-600`);
        icon?.classList.add('text-white'); // Ikon menjadi putih saat tombol aktif
    }
}

document.addEventListener('DOMContentLoaded', () => {
    sections.forEach(sec => document.getElementById(sec).classList.add('hidden'));
});

</script>


@endsection
