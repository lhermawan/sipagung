{{-- demografi.blade.php --}}
@extends('navbar-tailwind.navbar')
@section('title', 'Potensi Desa')
@section('content')
<h2 class="mt-32 text-2xl md:text-4xl text-primary text-center font-dmsans mx-10 md:mx-0">
    <span class="text-center">
        <b class="is-visible"></b>
        <b>DATA POTENSI DESA</b><span class="text-blue-500"> <b> PAYUNGAGUNG</b></span>
    </span>
</h2>
<div class="flex flex-col gap-6 md:px-20 px-5 mt-32">
    @include('showcase.rumah_dataku.partial.potensi')
</div>
@endsection
