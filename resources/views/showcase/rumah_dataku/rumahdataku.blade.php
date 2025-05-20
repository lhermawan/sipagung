@extends('navbar-tailwind.navbar')
@section('title', 'Rumah Dataku')
@section('content')

<!-- Header Section -->
<section class="content mt-20 mx-auto py-8 px-4 md:px-20 grid grid-cols-1 md:grid-cols-2 gap-8 items-center ">
    <!-- Left: Text -->
    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl md:text-[50px] leading-tight tracking-[-0.05em] font-normal">
            Rumah Data Kependudukan
        </h1>

        <div class="mt-2 flex flex-wrap items-center gap-x-6 gap-y-4">
            <div class="bg-[#CCF2EF] rounded-[25px] px-4 md:px-6 py-1 md:py-2">
                <span class="text-3xl md:text-[50px] leading-tight tracking-[-0.05em] font-normal">
                    Rumah DataKu
                </span>
            </div>
            <span class="text-3xl md:text-[50px] leading-tight tracking-[-0.05em] font-normal">
                Kampung Keluarga
            </span>
        </div>

        <div class="mt-2 flex flex-wrap items-center gap-x-6 gap-y-4">
            <span class="text-3xl md:text-[50px] leading-tight tracking-[-0.05em] font-normal">
                Berkualitas
            </span>

            <div class="bg-[#CCF2EF] rounded-[25px] px-4 md:px-6 py-1 md:py-2 flex items-center gap-2">
                <span class="text-3xl md:text-[50px] leading-tight tracking-[-0.05em] font-normal">
                    Mekar Rahayu
                </span>
            </div>
        </div>

        <p class="mt-6 text-base md:text-[24px] leading-relaxed tracking-[-0.05em] text-[#898989] font-medium max-w-lg">
            Desa Payungagung, Kecamatan Panumbangan, Kabupaten Ciamis, Jawa Barat
        </p>
    </div>

    <!-- Right: Image with fade animation and left shift -->
    <div class="flex justify-center md:justify-end md:-ml-16 px-4 md:px-0">
        <img src="{{ asset('images/illustration.png') }}"
            alt="Ilustrasi Rumah DataKu"
            class="w-full max-w-lg animate-fade-up"
        >
    </div>
</section>

<!-- Informasi Section -->
<section class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-200 border-t border-gray-200">
    <!-- Column 1: Mulai Button -->
    <div class="flex items-center justify-center py-6">
        <button
            id="btn-mulai"
            class="px-8 py-3 bg-black text-white rounded-full text-sm font-mono tracking-wide hover:bg-gray-800 transition"
        >
            Mulai
        </button>
    </div>
    <!-- Column 2: Description -->
    <div class="flex flex-col justify-center items-center md:items-start px-6 py-6">
        <h2 class="font-bold text-lg mb-1">Apa itu Rumah DataKu?</h2>
        <p class="text-sm text-gray-700 leading-relaxed max-w-md text-center md:text-left">
            <span class="font-semibold">Rumah DataKu</span> adalah pusat data dan intervensi permasalahan kependudukan di tingkat mikro, seperti di kampung KB, desa, dan kelurahan.
        </p>
    </div>
    <!-- Column 3: Logo -->
    <div class="flex items-center justify-center px-6 py-6">
        <img src="{{ asset('assets/img/rumah-dataku.png') }}" alt="Logo Rumah DataKu" class="w-36 md:w-40">
    </div>

</section>

<!-- Menu Section -->
<section id="menu-section" class="flex flex-col gap-6 md:px-20 px-5 mt-32">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $menus = [
                ['id' => 'kuantitas', 'label' => 'DATA KUANTITAS', 'icon' => 'mdi-account-multiple', 'color' => 'blue'],
                ['id' => 'kualitas', 'label' => 'DATA KUALITAS', 'icon' => 'mdi-star-check', 'color' => 'green'],
                ['id' => 'migrasi', 'label' => 'DATA MIGRASI DESA', 'icon' => 'mdi-truck-delivery', 'color' => 'purple'],
                ['id' => 'perlindungan', 'label' => 'DATA PERLINDUNGAN SOSIAL', 'icon' => 'mdi-shield-account', 'color' => 'red'],
                ['id' => 'administrasi_kependudukan', 'label' => 'DATA ADMINISTRASI KEPENDUDUKAN', 'icon' => 'mdi-file-document', 'color' => 'indigo'],
                ['id' => 'pembangunan_keluarga', 'label' => 'DATA PEMBANGUNAN KELUARGA', 'icon' => 'mdi-home-group', 'color' => 'orange'],
                ['id' => 'potensi', 'label' => 'DATA POTENSI DESA', 'icon' => 'mdi-chart-tree', 'color' => 'teal'],
                ['id' => 'data-infografis', 'label' => 'INFOGRAFIS DESA PAYUNGAGUNG', 'icon' => 'mdi-chart-pie', 'color' => 'rose'],
            ];
        @endphp

        @foreach ($menus as $menu)
            @php $clr = $menu['color']; @endphp
           <button id="btn-{{ $menu['id'] }}"
    onclick="showSection('{{ $menu['id'] }}')"
    class="relative group w-full overflow-hidden rounded-xl p-3 md:p-4 h-24 min-h-[6rem]
    bg-{{ $clr }}-100 border border-gray-200 shadow-sm transition-all duration-300
    hover:shadow-lg hover:scale-[1.03] hover:-translate-y-1 active:scale-95
    hover:text-white hover:bg-{{ $clr }}-600">

    {{-- Hover Shine --}}
    <span class="absolute inset-0 w-full h-full group-hover:bg-gradient-to-r group-hover:from-{{ $clr }}-500 group-hover:to-{{ $clr }}-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

    <div class="relative z-10 flex flex-col items-center justify-center flex-1 text-{{ $clr }}-600 group-hover:text-white">
        <div class="icon transition duration-300">
            <i class="icon mdi {{ $menu['icon'] }} text-4xl"></i>
        </div>
        <span class="text-sm md:text-base font-medium text-center leading-snug label">
            {{ $menu['label'] }}
        </span>
    </div>

    <span class="absolute top-0 left-0 w-full h-full bg-white opacity-10 transform rotate-45 -translate-x-full group-hover:translate-x-[200%] transition-transform duration-1000 ease-in-out"></span>
</button>
        @endforeach
    </div>

    <!-- Data Sections -->
    @foreach ($menus as $menu)
        <div id="{{ $menu['id'] }}" class="hidden">
            @includeIf('showcase.rumah_dataku.partial.' . Str::snake($menu['id']))
        </div>
    @endforeach
</section>

<style>
   .active-button {
    @apply bg-gradient-to-r text-white;
    /* from-xxx dan to-xxx ditambahkan lewat JS */
}

/* Pastikan hover di button aktif tidak merubah warna teks */
button.active-button:hover,
button.active-button:hover .icon,
button.active-button:hover .label {
    color: white !important;
}

/* Supaya elemen putih overlay di dalam button tidak blocking hover & klik */
button span.absolute {
    pointer-events: none;
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
    // Scroll smoothly but scroll a bit higher so menu section isn't hidden too low
    document.getElementById('btn-mulai').addEventListener('click', function() {
    const menuSection = document.getElementById('menu-section');
    if (menuSection) {
        const rect = menuSection.getBoundingClientRect();
        const y = rect.top + window.pageYOffset - (window.innerHeight / 2) + (rect.height / 2);
        window.scrollTo({ top: y, behavior: 'smooth' });
    }
});

     const sections = @json(array_column($menus, 'id'));

    function showSection(id) {
    const colorMap = @json(array_column($menus, 'color', 'id'));

    sections.forEach(sec => {
        const sectionEl = document.getElementById(sec);
        const btn = document.getElementById('btn-' + sec);
        const clr = colorMap[sec];

        if (sectionEl) {
            sectionEl.classList.add('hidden');
            sectionEl.classList.remove('fade-in');
        }

        if (btn) {
            btn.classList.remove('active-button', 'bg-gradient-to-r', `from-${clr}-500`, `to-${clr}-700`, 'text-white', 'hover:text-white');
            btn.classList.add(`bg-${clr}-100`, `text-${clr}-600`, `hover:text-white`);

            const icon = btn.querySelector('.icon');
            if (icon) {
                icon.classList.remove('text-white', `text-${clr}-600`);
                icon.classList.add(`text-${clr}-600`, `hover:text-white`);
            }

            const label = btn.querySelector('.label');
            if (label) {
                label.classList.remove('text-white', `text-${clr}-600`);
                label.classList.add(`text-${clr}-600`, `hover:text-white`);
            }
        }
    });

    const activeSection = document.getElementById(id);
    const activeBtn = document.getElementById('btn-' + id);
    const clr = colorMap[id];

    if (activeSection) {
        activeSection.classList.remove('hidden');
        activeSection.classList.add('fade-in');

        setTimeout(() => {
            const heading = activeSection.querySelector('h1');
            if (heading) {
                const rect = heading.getBoundingClientRect();
                const scrollY = window.scrollY + rect.top - (window.innerHeight / 2) + (rect.height / 2);
                window.scrollTo({ top: scrollY, behavior: 'smooth' });
            }
        }, 100);
    }

    if (activeBtn) {
        activeBtn.classList.remove(`bg-${clr}-100`, `text-${clr}-600`);
        activeBtn.classList.add('active-button', 'bg-gradient-to-r', `from-${clr}-500`, `to-${clr}-700`, 'text-white');

        const icon = activeBtn.querySelector('.icon');
        if (icon) {
            icon.classList.remove(`text-${clr}-600`);
            icon.classList.add('text-white');
        }

        const label = activeBtn.querySelector('.label');
        if (label) {
            label.classList.remove(`text-${clr}-600`);
            label.classList.add('text-white');
        }
    }
}

    document.addEventListener('DOMContentLoaded', () => {
        // Hide all sections initially
        sections.forEach(sec => {
            const el = document.getElementById(sec);
            if (el) el.classList.add('hidden');
        });
    });
</script>

@endsection
