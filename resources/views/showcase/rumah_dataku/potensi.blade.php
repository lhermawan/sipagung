@extends('navbar-tailwind.navbar')
@section('title', 'Demografi Desa')
@section('content')
    <div class="flex flex-col gap-6 md:px-20 px-5 mt-32">
        <div class="flex flex-col gap-7">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-primary p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary rounded-full">
                                <i class="mdi mdi-baby-carriage text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-primary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">IKUT BKB</p>
                            <p class="text-slate-700 text-2xl">{{ $demografi->j_bkb }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-secondary p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-secondary rounded-full">
                                <i class="mdi mdi-human-greeting-variant text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-secondary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">IKUT BKR</p>
                            <p class="text-slate-700 text-2xl">{{ $demografi->j_bkr }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-orange-500 p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-orange-500 rounded-full">
                                <i class="mdi mdi-human-cane text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-orange-500 bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">IKUT BKL</p>
                            <p class="text-slate-700 text-2xl">{{ $demografi->j_bkl }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-sky-500 p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-sky-500 rounded-full">
                                <i class="mdi mdi-handshake text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-sky-500 bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">UPPKA</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_uppka }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
                <div class="bg-primary rounded-xl shadow-lg  p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
                                <i class="mdi mdi-account-heart text-primary text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-primary to-white bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold text-white">
                            <p class="">POSYANDU</p>
                            <p class=" text-2xl">{{ $potensi->j_posyandu }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-secondary rounded-xl shadow-lg  p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
                                <i class="mdi mdi-town-hall text-secondary text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl  bg-gradient-to-r from-secondary to-white bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold text-white">
                            <p class="">SEKOLAH</p>
                            <p class=" text-2xl">{{ $potensi->j_sekolah }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-orange-500 rounded-xl shadow-lg  p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
                                <i class="mdi mdi-highway text-orange-500 text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-orange-500 to-white bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold text-white">
                            <p class="">JALAN</p>
                            <p class=" text-2xl">{{ $potensi->j_jalan }}<span class="text-sm">m</span></p>
                        </div>
                    </div>
                </div>
                <div class="bg-sky-500 rounded-xl shadow-lg  p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
                                <i class="mdi mdi-home-flood text-sky-500 text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl  bg-gradient-to-r from-sky-500 to-white bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold text-white">
                            <p class="">BENCANA</p>
                            <p class=" text-2xl">{{ $potensi->j_bencana }}<span class="text-sm">x</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-7">
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-primary p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary rounded-full">
                                <i class="mdi mdi-stadium text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-primary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">FASUM OR/REKREASI</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_for }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-primary p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary rounded-full">
                                <i class="mdi mdi-hospital-building text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-primary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">FASUM KESEHATAN</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_fkes }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-primary p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary rounded-full">
                                <i class="mdi mdi-mosque text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-primary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">FASUM IBADAH</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_fibadah }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-primary p-5">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary rounded-full">
                                <i class="mdi mdi-store text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-primary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">FASUM PASAR</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_fpasar }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-7">
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-orange-500 p-5">
                    <div class="flex flex-col space-y-6 col-span-1">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-orange-500 rounded-full">
                                <i class="mdi mdi-human-male-height-variant text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-orange-500 bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">STUNTING/GIZI BURUK</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_stunting }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-secondary p-5 col-span-1">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-secondary rounded-full">
                                <i class="mdi mdi-account-group text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-secondary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">PIK-R</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_pikr }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg border-b-8 border-primary p-5 col-span-2 md:col-span-1">
                    <div class="flex flex-col space-y-6">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center justify-center w-12 h-12 bg-primary rounded-full">
                                <i class="mdi mdi-basket text-white text-2xl"></i>
                            </div>
                            <i
                                class="mdi mdi-chart-line-variant text-5xl bg-gradient-to-r from-white to-primary bg-clip-text text-transparent"></i>
                        </div>
                        <div class="flex flex-col space-y-1 font-montserrat font-semibold">
                            <p class="text-slate-400">PRODUK UNGGULAN</p>
                            <p class="text-slate-700 text-2xl">{{ $potensi->j_produk }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-7">
                <div class="col-span-12 md:col-span-5 bg-white rounded-xl  shadow-lg  p-5">
                    <div class="flex flex-col space-y-6">
                        <div>
                            <p class="text-slate-700 font-montserrat font-semibold">PESERTA KB AKTIF</p>
                            <p class="text-slate-400 ">Berdasarkan metode kontrasepsi modern</p>
                        </div>

                        <div class="flex justify-between items-start">

                            <div class="flex flex-col space-y-3 font-montserrat font-semibold text-slate-700 ">
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">IUD</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbiud }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">MOP</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbmop }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">MOW</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbmow }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">IMPLAN</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbimplan }}</p>
                                </div>


                            </div>

                            <div class="flex flex-col space-y-3 font-montserrat font-semibold text-slate-700 ">
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">SUNTIK</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbsuntik }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">PIL</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbpil }}</p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span
                                        class="mdi mdi-link-variant  bg-slate-100 p-3 text-sm rounded-full w-4 h-4 flex justify-center items-center"></span>
                                    <p class="">KONDOM</p>
                                    <span class="mdi mdi-arrow-right-thin text-lg"></span>
                                    <p class=" font-inter">{{ $potensi->j_kbkondom }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-7">
                    <div class="flex flex-col md:grid md:grid-cols-2 md:grid-rows-2 gap-7 h-full">
                        <div class="bg-white rounded-xl shadow-lg  flex border-t-8 border-primary p-5 font-bold">
                            <div class="flex justify-between w-full  items-center font-montserrat">
                                <p class="text-sm  text-slate-400">KELUARGA <br>BERESIKO STUNTING</p>
                                <p class="text-right text-slate-700 text-2xl">{{ $potensi->j_kberesiko_stunting }}</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg  flex border-t-8 border-secondary p-5 font-bold">
                            <div class="flex justify-between w-full  items-center font-montserrat">
                                <p class="text-sm  text-slate-400">PENDUDUK TIDAK<br>MEMILIKI BPJS</p>
                                <p class="text-right text-slate-700 text-2xl">{{ $potensi->j_p_nobpjs }}</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl shadow-lg  flex border-t-8 border-orange-500 p-5 font-bold">
                            <div class="flex justify-between w-full  items-center font-montserrat">
                                <p class="text-sm  text-slate-400">PENDUDUK TIDAK <br>MEMILIKI AKTA KELAHIRAN</p>
                                <p class="text-right text-slate-700 text-2xl">{{ $potensi->j_p_noakta }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

