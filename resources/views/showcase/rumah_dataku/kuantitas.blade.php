{{-- demografi.blade.php --}}
@extends('navbar-tailwind.navbar')
@section('title', 'Kuantitas Desa')
@section('content')
<h2 class="mt-32 text-2xl md:text-4xl text-primary text-center font-dmsans mx-10 md:mx-0">
    <span class="text-center">
        <b class="is-visible"></b>
        <b>DATA DEMOGRAFI DESA</b><span class="text-blue-500"> <b> PAYUNGAGUNG</b></span>
    </span>
</h2>
    @include('showcase.rumah_dataku.partial.kuantitas')
@endsection
