<!-- resources/views/showcase/potensi/potensi_desa.blade.php -->
@extends('navbar-tailwind.navbar')
@section('title', 'Detail Produk')
@section('content')

<!-- Hero Section -->
<section class="relative h-[60vh] bg-cover bg-center" style="background-image: url('/assets/img/sawah2.jpg')">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-white text-center px-4">
            <h1 class="text-4xl font-bold mb-2">Potensi Desa Payungagung</h1>
            <p class="text-lg">Wisata alam, budaya, dan kuliner khas yang menanti untuk dijelajahi</p>
        </div>
    </div>
</section>

<!-- Filter Tabs -->
<div class="flex justify-center my-6">
    <button class="mx-2 px-4 py-2 border rounded text-sm hover:bg-blue-600 hover:text-white">Semua</button>
    <button class="mx-2 px-4 py-2 border rounded text-sm hover:bg-blue-600 hover:text-white">Wisata</button>
    <button class="mx-2 px-4 py-2 border rounded text-sm hover:bg-blue-600 hover:text-white">Kuliner</button>
</div>

<!-- Potensi Card Grid -->
<section class="max-w-6xl mx-auto px-4 py-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($potensi as $item)
        <div class="bg-white shadow-lg rounded overflow-hidden transition-transform hover:scale-105">
            <img src="{{ $item->image_url ?? '/images/default.jpg' }}" class="w-full h-48 object-cover" alt="{{ $item->title }}">
            <div class="p-4">
                <h3 class="text-xl font-semibold mb-2">{{ $item->title }}</h3>
                <p class="text-gray-600 text-sm line-clamp-3">{{ Str::limit(strip_tags($item->description), 100) }}</p>
                <a href="{{ route('detail_potensi', $item->title_slug) }}" class="text-blue-600 text-sm mt-3 inline-block hover:underline">Lihat Selengkapnya →</a>
            </div>
        </div>
    @endforeach
</section>

<!-- Potensi Populer -->
<section class="bg-gray-100 py-6">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-2xl font-bold mb-4">Potensi Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($potensi_popular as $item)
                <a href="{{ route('detail_potensi', $item->title_slug) }}" class="block bg-white rounded shadow hover:shadow-md">
                    <img src="{{ $item->image_url ?? '/images/default.jpg' }}" class="w-full h-32 object-cover rounded-t">
                    <div class="p-2 text-sm">{{ $item->title }}</div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Pagination -->
<div class="mt-6 flex justify-center">
    {{ $potensi->links() }}
</div>

@endsection
