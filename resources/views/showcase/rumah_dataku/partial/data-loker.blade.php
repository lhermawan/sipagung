<div class="text-center mb-8">
    <h1 class="text-4xl font-extrabold text-gray-800">
        RUMAH DATAKU <span class="text-primary">(INFORMASI LOWONGAN PEKERJAAN)</span><br>
    </h1>
</div>
<div class="text-center mt-10">

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <a href="{{ asset('images/loker1.jpeg') }}" data-lightbox="galeri" data-title="Loker 1" target="_blank">
        <img src="{{ asset('images/loker1.jpeg') }}" alt="Loker 1" class="w-full h-100 rounded-lg shadow-md transition-transform duration-[2000ms] transform p-14 hover:scale-110 cursor-pointer">
    </a>
    <a href="{{ asset('images/loker2.jpeg') }}" data-lightbox="galeri" data-title="Loker 2" target="_blank">
        <img src="{{ asset('images/loker2.jpeg') }}" alt="Loker 2" class="w-full h-100 rounded-lg shadow-md transition-transform duration-[2000ms] transform p-14 hover:scale-110 cursor-pointer">
    </a>
</div>
{{-- <p class="text-xl font-extrabold text-gray-500 mb-1">SUMBER DATA : {{ $administrasiKependudukan->sumber }}</p> --}}
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/css/lightbox.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.4/dist/js/lightbox.min.js"></script>
@endsection
