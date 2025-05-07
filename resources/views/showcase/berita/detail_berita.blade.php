@extends('navbar-tailwind.navbar')
@section('title', $data->title)
@section('content')

<div class="min-h-screen bg-gray-50 pt-28 pb-16 px-4">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Konten Utama --}}
        <div class="md:col-span-2">
            <div class="bg-white shadow-md rounded-xl p-6 space-y-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $data->title }}</h1>
                <p class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }} · Dibaca {{ $data->hits }} kali
                </p>

                @if ($data->picture)
                    <img src="{{ asset($data->picture) }}" alt="{{ $data->title }}" class="w-full h-96 object-cover rounded-xl shadow-sm">
                @endif

                <div class="prose max-w-none prose-blue">
                    {!! $data->content !!}
                </div>

                {{-- Share --}}
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Bagikan Berita</h3>
                    <div class="flex gap-2 items-center">
                        {!! $shareComponent !!}
                    </div>
                </div>

                {{-- Berita Terkait --}}
                @if ($berita_kaitan->count())
                    <div class="mt-10">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Berita Terkait</h3>
                        <div class="grid md:grid-cols-3 gap-4">
                            @foreach ($berita_kaitan as $bk)
                                <a href="{{ url('showcase/berita/detail_berita/'.$bk->title_slug) }}" class="block bg-gray-50 shadow hover:shadow-md rounded-xl overflow-hidden transition duration-300">
                                    @if ($bk->picture)
                                        <img src="{{ asset($bk->picture) }}" alt="{{ $bk->title }}" class="w-full h-32 object-cover">
                                    @endif
                                    <div class="p-4">
                                        <h4 class="text-sm font-semibold text-gray-700 hover:text-primary truncate">{{ $bk->title }}</h4>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Berita Baru --}}
            <div class="bg-white shadow rounded-xl p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">📰 Berita Baru</h3>
                <ul class="space-y-3">
                    @foreach ($berita_baru as $baru)
                        <li class="flex items-start space-x-3">
                            @if ($baru->picture)
                                <img src="{{ asset($baru->picture) }}" class="w-14 h-14 object-cover rounded-md shadow-sm" />
                            @endif
                            <div>
                                <a href="{{ url('showcase/berita/detail_berita/'.$baru->title_slug) }}" class="text-blue-600 hover:text-primary font-medium text-sm block">
                                    {{ $baru->title }}
                                </a>
                                <p class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($baru->created_at)->translatedFormat('d M Y') }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

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
                        <a href="{{ url('showcase/berita/kategori/'.$cat->category_slug) }}"
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
