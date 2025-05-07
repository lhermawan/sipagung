@extends('navbar-tailwind.navbar')
@section('title', 'Detail Produk')
@section('content')

<div class="min-h-screen bg-gray-50 pt-28 pb-16">
    {{-- Header --}}
    <div class="text-center mb-8 px-4">
        <h1 class="text-4xl font-bold text-gray-800">
            Data Lapak <span class="text-primary">DESA {{ strtoupper($data->author ?? 'UNKNOWN') }}</span>
        </h1>
        <p class="text-sm text-gray-500 mt-2">Temukan produk terbaik dari desa</p>
        <div class="mt-4 text-sm text-gray-600">
            <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Home</a> /
            <a href="{{ url('showcase/lapak') }}" class="text-blue-500 hover:underline">Lapak Desa</a> /
            <span class="text-gray-400">{{ $data->nama_produk }}</span>
        </div>
    </div>

    <div class="bg-white shadow-lg rounded-xl p-6 mx-4 md:mx-auto max-w-5xl grid grid-cols-1 md:grid-cols-2 gap-8 transition-all duration-300">
        {{-- Gambar Produk --}}
        <div class="flex justify-center items-center">
            <img src="{{ asset($data->picture ?? 'images/placeholder.jpg') }}"
                 alt="{{ $data->nama_produk }}"
                 class="w-full h-auto max-w-md rounded-lg shadow">
        </div>

        {{-- Detail Produk --}}
        <div class="space-y-4">
            <h2 class="text-3xl font-bold text-primary">{{ $data->nama_produk }}</h2>
            <p class="text-gray-700 leading-relaxed">{{ $data->deskripsi }}</p>

            <div class="text-lg font-semibold text-gray-900">
                Harga:
                <span class="text-green-600">
                    Rp {{ number_format($data->harga, 0, '.', '.') }} / {{ $data->satuan }}
                </span>
            </div>

            <div class="text-sm text-gray-600">
                Penjual: <span class="font-medium text-black">{{ $data->penjual }}</span><br>
                Tanggal update: <span class="text-gray-500">{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}</span>
            </div>

            {{-- Tombol WhatsApp --}}
            <a href="https://wa.me/{{ ltrim($data->no_wa, '+') }}?text=Halo,%20saya%20tertarik%20dengan%20produk%20{{ urlencode($data->nama_produk) }}"
               target="_blank"
               class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded transition duration-200 shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20.52 3.48A11.94 11.94 0 0012 .06C5.37.06 0 5.43 0 12.1c0 2.12.56 4.17 1.62 5.97L.05 24l6.15-1.6a12.12 12.12 0 005.8 1.46h.01c6.63 0 12.01-5.37 12.01-12.01a11.96 11.96 0 00-3.5-8.37zm-8.52 17.7c-1.8 0-3.58-.48-5.13-1.4l-.36-.21-3.65.95.97-3.55-.23-.37a9.93 9.93 0 01-1.53-5.34C2.06 6.2 6.21 2.05 11.48 2.05c2.64 0 5.12 1.03 6.98 2.89a9.83 9.83 0 012.89 6.97c0 5.43-4.42 9.85-9.85 9.85zm5.61-7.47c-.3-.15-1.77-.87-2.05-.97s-.48-.15-.69.15-.79.97-.97 1.18-.36.23-.66.08a8.02 8.02 0 01-2.34-1.44 8.79 8.79 0 01-1.62-2.01c-.17-.3-.02-.46.13-.61.13-.13.3-.34.45-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.03-.53s-.69-1.66-.95-2.27c-.25-.6-.5-.52-.69-.53-.18-.01-.4-.01-.61-.01s-.53.08-.8.38-.95.93-.95 2.26.97 2.62 1.1 2.8 1.9 2.92 4.6 4.1c.64.27 1.14.43 1.53.55.64.2 1.22.17 1.68.1.51-.08 1.57-.64 1.8-1.25.22-.6.22-1.1.15-1.2s-.27-.2-.57-.34z"/>
                </svg>
                Hubungi Penjual
            </a>
        </div>

    </div>
    {{-- Produk Terkait --}}
    @if ($related->count() > 0)
    <div class="mt-16 max-w-6xl mx-auto px-4">
        <h3 class="text-2xl font-bold text-gray-800 mb-4">Produk Terkait</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($related as $item)
            <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                <a href="{{ url('showcase/detail_lapak/'.$item->id_produk) }}">
                    <img src="{{ asset($item->picture ?? 'images/placeholder.jpg') }}" alt="{{ $item->nama_produk }}" class="h-40 w-full object-contain">
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 text-lg truncate">{{ $item->nama_produk }}</h4>
                        <p class="text-sm text-gray-500 truncate">{{ Str::limit($item->deskripsi, 50) }}</p>
                        <div class="mt-2 text-green-600 font-bold text-sm">
                            Rp {{ number_format($item->harga, 0, '.', '.') }} / {{ $item->satuan }}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@endsection
