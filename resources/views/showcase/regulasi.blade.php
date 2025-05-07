@extends('navbar-tailwind.navbar')
@section('title', 'Laporan APDES')
@section('content')
<div class="flex flex-col gap-6 md:px-20 px-5 mt-32">

    <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">📚 Daftar Regulasi</h1>

    @forelse ($regulasi as $item)
        <div class="bg-white p-4 rounded-xl shadow mb-4">
            <h2 class="text-lg font-semibold text-blue-700">{{ $item->judul }}</h2>
            <p class="text-sm text-gray-500 mb-2">Dipublikasikan pada: {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</p>
            @if ($item->file)
                <a href="{{ asset('storage/regulasi/' . $item->file) }}" target="_blank" class="text-blue-600 hover:underline">
                    📄 Unduh Dokumen
                </a>
            @endif
            <p class="mt-2 text-gray-700">{{ $item->deskripsi }}</p>
        </div>
    @empty
        <div class="bg-white p-6 rounded-xl shadow text-center text-gray-500">
            Belum ada regulasi yang di-upload.
        </div>
    @endforelse

    <div class="mt-6">
        {{ $regulasi->links('pagination::tailwind') }}
    </div>

</div>
@endsection
