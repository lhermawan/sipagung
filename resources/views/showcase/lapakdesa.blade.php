@extends('navbar-tailwind.navbar')

@section('title', 'Lapak Desa')

@section('content')
<div class="min-h-screen bg-gray-50 pt-28">
    {{-- Header --}}
    <div class="text-center mb-8 px-4">
        <h1 class="text-4xl font-bold text-gray-800">
            Data Lapak <span class="text-primary">DESA PAYUNGAGUNG</span>
        </h1>
        <p class="text-sm text-gray-500 mt-2">Temukan produk terbaik dari desa</p>
        <div class="mt-4 text-sm text-gray-600">
            <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Home</a> /
            <span class="text-gray-400">Lapak Desa</span>
        </div>
    </div>

    {{-- Search Bar --}}
    <div class="max-w-xl mx-auto px-4 mb-10">
        <form method="get" class="flex shadow-sm">
            <input type="text" name="title" value="{{ request('title') }}" placeholder="Cari Nama Produk..."
                class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm">
            <button type="submit" class="bg-blue-500 text-white px-4 rounded-r-md hover:bg-blue-600 text-sm">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    {{-- Produk Grid --}}
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($lapak as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:-translate-y-1 hover:shadow-lg transition">
                    <a href="{{ url('showcase/detail_lapak/'.$item->id_produk) }}">
                        <div class="relative">
                            <img src="{{ url($item->picture) }}" alt="{{ $item->nama_produk }}"
                                class="w-full h-48 object-contain">
                            <span class="absolute top-2 left-2 bg-yellow-400 text-xs text-white px-2 py-1 rounded shadow">Pesan!</span>
                        </div>
                        <div class="p-4">
                            <h2 class="text-lg font-semibold text-gray-800 truncate">{{ $item->nama_produk }}</h2>
                            <p class="text-sm text-gray-600 mt-1">Rp. {{ number_format($item->harga, 0, ".", ".") }}</p>
                            <div class="mt-2 flex justify-between items-center">
                                <a href="https://wa.me/{{ ltrim($item->no_wa, '+') }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($item->nama_produk) }}"
                                   target="_blank"
                                   class="inline-block bg-green-500 text-white text-xs px-3 py-1 rounded hover:bg-green-600 transition">
                                    <i class="fab fa-whatsapp mr-1"></i> WhatsApp
                                </a>

                                <a href="{{ url('showcase/detail_lapak/'.$item->id_produk) }}"
                                   class="inline-block bg-blue-500 text-white text-xs px-3 py-1 rounded hover:bg-blue-600 transition">
                                    Detail Produk
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-10 text-center">
            {{ $lapak->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
