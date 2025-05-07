@extends('navbar-tailwind.navbar')
@section('title', 'Berita Desa')
@section('content')

<div class="min-h-screen bg-gray-50 pt-28 pb-16 px-4">
    {{-- Header --}}
    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Berita <span class="text-primary">Desa</span></h1>
        <p class="text-sm text-gray-500 mt-2">Dapatkan informasi terkini dari desa</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto">
        {{-- Konten Utama --}}
        <div class="md:col-span-2 space-y-6">
            {{-- Form Pencarian --}}
            <form method="GET" action="{{ url()->current() }}" class="mb-4">
                <input type="text" name="title" value="{{ request('title') }}" placeholder="Cari judul berita..."
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 ease-in-out shadow-sm">
            </form>

            {{-- Daftar Berita --}}
            @forelse ($berita as $item)
            <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <a href="{{ url('showcase/berita/detail_berita/'.$item->title_slug) }}">
                    @if ($item->picture)
                        <img src="{{ asset($item->picture) }}" class="w-full h-48 object-cover rounded-t-xl" alt="{{ $item->title }}">
                    @else
                        <img src="{{ asset('images/placeholder.jpg') }}" class="w-full h-48 object-cover rounded-t-xl" alt="Placeholder Image">
                    @endif
                    <div class="p-6 space-y-4">
                        <h2 class="text-xl font-semibold text-gray-800 hover:text-primary transition-colors duration-200">{{ $item->title }}</h2>
                        <p class="text-gray-500 text-sm mb-2">
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                        </p>
                        <p class="text-gray-700 text-sm">{{ Str::limit(strip_tags($item->content), 150) }}</p>
                    </div>
                </a>
            </div>
            @empty
                <p class="text-gray-600">Belum ada berita ditemukan.</p>
            @endforelse

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $berita->links('pagination::tailwind') }}
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Berita Populer --}}
            <div class="bg-white shadow rounded-xl p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">🔥 Berita Populer</h3>
                <ul class="space-y-3">
                    @foreach ($berita_popular as $popular)
                    <li class="flex items-start space-x-3">
                        @if ($popular->picture)
                        <img src="{{ asset($popular->picture) }}" class="w-14 h-14 object-cover rounded-md shadow-sm" />
                        @endif
                        <div>
                            <a href="{{ url('showcase/berita/detail_berita/'.$popular->title_slug) }}" class="text-blue-600 hover:text-primary font-medium text-sm block">
                                {{ $popular->title }}
                            </a>
                            <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($popular->created_at)->translatedFormat('d M Y') }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Kategori --}}
            <div class="bg-white shadow rounded-xl p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">📁 Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($category as $cat)
                    <a href="{{ url('showcase/berita/by_category/'.$cat->category_slug) }}"
                       class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs hover:bg-blue-200 transition">
                        {{ $cat->category_name }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Arsip --}}
            <div class="bg-white shadow rounded-xl p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">🗂 Arsip</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    @foreach ($archive as $arsip)
                    <li class="hover:text-primary transition cursor-pointer">
                        <a href="javascript:void(0)" class="archive-toggle" data-month="{{ \Carbon\Carbon::parse($arsip['month'])->format('m') }}" data-year="{{ $arsip['year'] }}">
                            {{ $arsip['month'] }} {{ $arsip['year'] }} ({{ $arsip['post'] }} Berita)
                        </a>
                        <!-- Menampilkan berita berdasarkan bulan dan tahun yang diklik -->
                        <div class="archive-berita-list hidden mt-2 ml-4">
                            <p class="text-sm text-gray-600">Jumlah Berita: {{ $arsip['post'] }}</p>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($berita->filter(function ($item) use ($arsip) {
                                    return \Carbon\Carbon::parse($item->created_at)->year == $arsip['year'] &&
                                           \Carbon\Carbon::parse($item->created_at)->month == \Carbon\Carbon::parse($arsip['month'])->month;
                                }) as $item)
                                <li>
                                    <a href="{{ url('showcase/berita/detail_berita/'.$item->title_slug) }}" class="text-blue-600 hover:text-primary">{{ $item->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection
