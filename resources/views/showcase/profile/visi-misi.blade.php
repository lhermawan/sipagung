@extends('navbar-tailwind.navbar')

@section('title', 'Visi Misi Desa')

@section('content')

    <div class="flex flex-col gap-6 md:px-20 py-12 bg-gray-50 mt-20">
        <div class="text-center">
            <h1 class="text-3xl md:text-5xl font-dmsans font-bold text-primary mb-6">Visi & Misi <span class="text-blue-600">Desa</span></h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Visi -->
            <div class="flex flex-col p-6 bg-white rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"
                data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-2xl md:text-3xl font-medium text-primaryhover mb-4">Visi</h2>
                <hr class="border-t-2 border-gray-200 mb-4" />
                <p class="text-lg text-gray-700">{{ $visi["visi"] }}</p>
            </div>

            <!-- Misi -->
            <div class="flex flex-col p-6 bg-white rounded-lg shadow-xl hover:shadow-2xl transition-shadow duration-300"
                data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-2xl md:text-3xl font-medium text-primaryhover mb-4">Misi</h2>
                <hr class="border-t-2 border-gray-200 mb-4" />

                <ol class="list-decimal list-inside space-y-4 text-lg text-gray-700">
                    @php $no = 1; @endphp
                    @foreach($misi as $d)
                        <li class="leading-relaxed" data-aos="fade-left" data-aos-delay="{{ 200 + $loop->index * 100 }}">
                            {!! $d['misi'] !!}
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
