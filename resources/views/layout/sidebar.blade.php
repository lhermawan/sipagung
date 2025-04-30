    <header id="header"  class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body" >
            <div class="header-container container" >
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href="{{ URL::to('/') }}">
                                    <img alt="Porto" width="40" height="50" data-sticky-width="40" data-sticky-height="50" src="{{ URL::to('icon/logo_cms.png') }}">
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">

                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="">
                                                <a class="font-weight-bold" style="font-size: 13px;" href="{{ URL::to('/') }}">Home</a>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" style="font-size: 13px;" href="#">
                                                    PROFILE
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ URL::to('/profile/visi_misi') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Visi Misi Desa</a></li>
                                                    <li><a href="{{ URL::to('/profile/sejarah_desa') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Sejarah Desa</a></li>
     												<li><a href="{{ URL::to('/profile/potensi_desa') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Potensi Desa</a></li>

                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" style="font-size: 13px;" href="#">
                                                    Data Desa
                                                </a>
                                                <ul class="dropdown-menu">
                                                <li><a href="{{ URL::to('data_desa/data_pendidikan') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Data Pendidikan</a></li>
                                                    <li><a href="{{ URL::to('data_desa/data_pekerjaan') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Data Pekerjaan</a></li>
                                                    <li><a href="{{ URL::to('data_desa/data_agama') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Data Agama</a></li>
                                                    <li><a href="{{ URL::to('data_desa/data_jenis_kelamin') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Data Jenis Kelamin</a></li>
                                                    <li><a href="{{ URL::to('data_desa/data_umur') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Data Umur Warga</a></li>
                                                    <li><a href="{{ URL::to('data_desa/aparatur_desa') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Data Aparatur Desa</a></li>



                                                </ul>
                                            </li>


                                            <li>
                                                <a class=" " style="font-size: 13px;" href="/idm/ {{ date('Y') }}">IDM</a>
                                            </li>
                                            <li>
                                                <a class=" " style="font-size: 13px;" href="{{ URL::to('laporan_apdes') }}">Laporan APDes</a>
                                            </li>
                                            <li>
                                                <a class=" " style="font-size: 13px;" href="{{ route('berita') }}">Berita</a>
                                            </li>
                                            <li>
                                                <a class=" " style="font-size: 13px;" href="{{ URL::to('regulasi') }}">REGULASI</a>
                                            </li>
                                            <li>
                                                <a class=" " style="font-size: 13px;" href="{{ URL::to('lapak_desa') }}">LAPAK DESA</a>
                                            </li>
                                            <li>
                                                <a class=" " style="font-size: 13px;" href="{{ URL::to('map') }}">MAP DESA</a>
                                            </li>
{{--                                            <li>--}}
{{--                                                <a class=" " style="font-size: 13px;" href="{{ URL::to('contact') }}">Kontak</a>--}}
{{--                                            </li>--}}

                                            <li>
                                                <a class=" " style="font-size: 13px;" href="https://www.lapor.go.id" target="_blank">SP4N LAPOR</a>
                                            </li>


                                            @if($pegawai["id_skpd"] =='101')
                                            <li class="dropdown">
                                                <a class="dropdown-item dropdown-toggle" style="font-size: 13px;" href="#">
                                                    SFV Kampung Nila
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ URL::to('kampung_nila') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Profile SFV Kampung Nila</a></li>
                                                    <li><a href="{{ URL::to('kampungnila/berita_kampungnila') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Berita SFV Kampung Nila</a></li>
                                                    <li><a href="{{ URL::to('kampungnila/produk_sfv_kampungnila') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Produk SFV Kampung Nila</a></li>

     												<li><a href="{{ URL::to('kampungnila/paket_mina_eduwisata') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Paket Mina Eduwisata</a></li>
                                                    <li><a href="{{ URL::to('kampungnila/sfv_kampungnila') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">SFV Kampung Nila</a></li>
                                                    <li><a href="{{ URL::to('kampungnila/gapokkan_sfv') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">GAPOKKAN SFV Kampung Nila</a></li>
                                                    <li><a href="{{ URL::to('kampungnila/testimoni') }}" class="dropdown-item font-weight-bold" style="font-size: 13px;">Testimoni & Review</a></li>
                                                </ul>
                                            </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav my-2" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
