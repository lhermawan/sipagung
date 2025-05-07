@extends('navbar-tailwind.navbar')
@section('title', 'Arsip Berita')
@section('content')

<div class="min-h-screen bg-gray-50 pt-28 pb-16 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Main Content --}}
        <div class="md:col-span-2">
            <div class="bg-white shadow-md rounded-xl p-6 space-y-6">

                <h1 class="text-3xl font-bold text-gray-800">Arsip Berita</h1>

                {{-- Archive --}}
                <div class="mt-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">📂 Daftar Arsip</h3>

                    <div class="space-y-4">
                        @foreach ($archive as $arsip)
                            <div class="bg-gray-50 p-4 rounded-xl shadow-sm hover:shadow-md transition">
                                <h4 class="text-lg font-semibold text-gray-700">
                                    {{ $arsip['month'] }} {{ $arsip['year'] }}
                                </h4>
                                <p class="text-xs text-gray-500">Jumlah Berita: {{ $arsip['post'] }}</p>
                                <a href="{{ url('showcase/berita/arsip/'.$arsip['year'].'/'.$arsip['month']) }}" class="text-blue-600 hover:text-primary font-medium text-sm block mt-2">
                                    Lihat Berita
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $berita->links() }}
                </div>

            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Popular News --}}
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

            {{-- Categories --}}
            <div class="bg-white shadow rounded-xl p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">📁 Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach ($category as $cat)
                    <a href="{{ url('showcase/berita/kategori/'.$cat->category_slug) }}"
                       class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs hover:bg-blue-200 transition">
                        {{ $cat->category_name }}
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
