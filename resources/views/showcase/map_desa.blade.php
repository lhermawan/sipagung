@extends('navbar-tailwind.navbar')

@section('title', 'Peta Desa')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            width: 100%;
            height: 500px;
            border-radius: 0.5rem;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div class="flex flex-col gap-6 md:px-20 px-5 mt-32">
        <h2 class="text-xl font-semibold text-gray-800 text-center">
            🗺 Peta Desa PAYUNGAGUNG
        </h2>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div id="map" class="rounded-lg shadow" style="height: 500px;"></div>
        </div>
    </div>
@endsection

@section('scripts')
    

    @include('showcase.mapjs')
@endsection
