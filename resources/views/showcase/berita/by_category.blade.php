@extends('navbar-tailwind.navbar')
@section('title', 'Kategori: ' . $category->category_name)
@section('content')

<div class="min-h-screen bg-gray-50 pt-28 pb-16 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Konten Utama --}}
        <div class="md:col-span-2 space-y-6">
            <h1 class="text-2xl font-bold text-gray-800">Kategori: {{ $category->category_name }}</h1>

            {{-- 1 Berita Utama --}}
            @foreach ($berita1 as $utama)
            <a href="{{ url('showcase/berita/detail_berita/'.$utama->title_slug) }}" class="block rounded-xl shadow bg-white overflow-hidden">
                @if ($utama->picture)
                <img src="{{ asset($utama->picture) }}" class="w-full h-56 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">{{ $utama->title }}</h2>
                    <p class="text-sm text-gray-500 mt-2">{{ \Carbon\Carbon::parse($utama->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </a>
            @endforeach

            {{-- List Berita --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($berita as $item)
                <a href="{{ url('showcase/berita/detail_berita/'.$item->title_slug) }}" class="bg-white rounded-xl shadow hover:shadow-md overflow-hidden transition">
                    @if ($item->picture)
                    <img src="{{ asset($item->picture) }}" alt="{{ $item->title }}" class="w-full h-36 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-700">{{ $item->title }}</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $berita->links() }}
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Populer --}}
            <div class="bg-white p-4 shadow rounded-xl">
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
            <div class="bg-white p-4 shadow rounded-xl">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">📁 Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($category_list as $cat)
                    <a href="{{ url('showcase/berita/by_category/'.$cat->category_slug) }}" class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs hover:bg-blue-200 transition">
                        {{ $cat->category_name }}
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Arsip --}}
            <div class="bg-white p-4 shadow rounded-xl">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">🗂 Arsip</h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    @foreach ($archive as $arsip)
                    <li class="hover:text-primary transition cursor-pointer">
                        {{ $arsip['month'] }} {{ $arsip['year'] }} ({{ $arsip['post'] }})
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
