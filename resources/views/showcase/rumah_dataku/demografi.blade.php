@extends('navbar-tailwind.navbar')
@section('title', 'Berita Desa')
@section('content')
    <div class="px-10 md:px-20 md:mt-7 md:mb-7">
        <div class="flex flex-col gap-7">
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
                <div class="bg-white rounded-xl shadow-md border-t-4 border-primary p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-primary text-xs font-semibold">JUMLAH RW/DUSUN</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_rw }}</p>
                        </div>
                        <i class="mdi mdi-navigation-variant  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-secondary p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-secondary text-xs font-semibold">JUMLAH RT</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_rt }}</p>
                        </div>
                        <i class="mdi mdi-sign-direction  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-purple-700 p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-purple-700 text-xs font-semibold">LUAS WILAYAH</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->luas_wilayah }}
                                km<sup>2</sup></p>
                        </div>
                        <i class="mdi mdi-earth hidden md:block text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-cyan-400 p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-cyan-400 text-xs font-semibold">KETINGGIAN WILAYAH</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->ketinggian_wilayah }}
                                mdpl</p>
                        </div>
                        <i class="mdi mdi-slope-uphill hidden md:block text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
                <div class="bg-white rounded-xl shadow-md border-t-4 border-primary p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-primary text-xs font-semibold">JUMLAH KK</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">
                                {{ number_format($demografi->j_kk, 0, ',', '.') }}</p>

                            </p>
                        </div>
                        <i class="mdi mdi-account-tie  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-cyan-400 p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-cyan-400 text-xs font-semibold">JUMLAH PENDUDUK</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">
                                {{ number_format($demografi->j_penduduk, 0, ',', '.') }}</p>
                            </p>
                        </div>
                        <i class="mdi mdi-account-group  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-purple-700 p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-purple-700 text-xs font-semibold">PENDUDUK LAKI-LAKI</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">
                                {{ number_format($demografi->j_penduduk_laki, 0, ',', '.') }}</p>
                            </p>
                        </div>
                        <i class="mdi mdi-face-man  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-secondary p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-secondary text-xs font-semibold">PENDUDUK PEREMPUAN</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">
                                {{ number_format($demografi->j_penduduk_perempuan, 0, ',', '.') }}</p>
                            </p>
                        </div>
                        <i class="mdi mdi-face-woman  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-7">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl shadow-md border-t-4 border-primary p-5 col-span-1">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class="font-dmsans text-primary text-xs font-semibold">JUMLAH WANITA KAWIN</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_wanita_kawin }}</p>
                        </div>
                        <i class="mdi mdi-account-tie-woman text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl shadow-md border-t-4 border-secondary p-5 col-span-1">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class="font-dmsans text-secondary text-xs font-semibold">JUMLAH PUS HAMIL</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_pus_hamil }}</p>
                        </div>
                        <i class="mdi mdi-human-pregnant text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl shadow-md border-t-4 border-purple-700 p-5 col-span-2 md:col-span-1">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class="font-dmsans text-purple-700 text-xs font-semibold">JUMLAH PUS PESERTA KB MODERN
                            </p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_pus_kb_modern }}
                            </p>
                        </div>
                        <i class="mdi mdi-shield-check text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
                <div class="bg-white rounded-xl shadow-md border-t-4 border-primary p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-primary text-xs font-semibold">JUMLAH IKUT BKB</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_bkb }}</p>
                        </div>
                        <i class="mdi mdi-baby  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-secondary p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-secondary text-xs font-semibold">JUMLAH IKUT BKR</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_bkr }}</p>
                        </div>
                        <i class="mdi mdi-human-male-female  text-5xl md:py-2 text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-purple-700 p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-purple-700 text-xs font-semibold">JUMLAH IKUT BKL</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_bkl }}</p>
                        </div>
                        <i class="mdi mdi-human-cane text-5xl text-slate-200"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md border-t-4 border-cyan-400 p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col space-y-1">
                            <p class=" font-dmsans text-cyan-400 text-xs font-semibold">JUMLAH IKUT UPPKS</p>
                            <p class="text-xl font-dmsans font-bold text-gray-600">{{ $demografi->j_uppks }}</p>
                        </div>
                        <i class="mdi mdi-hand-coin text-5xl text-slate-200"></i>
                    </div>
                </div>
            </div>



            {{-- <div class="grid grid-cols-2 gap-7">
                <x-chart.gender />
                <x-chart.kk-individu />
            </div>
            <x-chart.pendidikan-usia />
            <div class="grid grid-cols-2 gap-7">
                <x-chart.jaminan-kesehatan />
                <x-chart.akta-lahir />
            </div>
            <div class="grid grid-cols-2 gap-7">
                <x-chart.akta-nikah />
                <x-chart.rumah-layak-huni />
            </div>
            <div class="grid grid-cols-2 gap-7">
                <x-chart.usaha-ekonomi />
                <x-chart.resiko-stunting />
            </div> --}}
        </div>
    </div>


