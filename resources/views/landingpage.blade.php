@include('layout.head')

	</style>
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">
			@include('layout.sidebar')
			<div role="main" class="main">
				<div class="slider-container light rev_slider_wrapper" style="height: 700px;">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 700, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': true, 'style': 'arrows-style-3 arrows-big arrows-light' }, 'bullets': {'enable': false, 'style': 'bullets-style-1 bullets-color-primary', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
						<ul>

                        @foreach ($header as $key => $banner)
                            <li data-transition="fade">
								<img src="{{ URL::to($banner->picture) }}"
									alt=""
									data-bgposition="center center"
									data-bgfit="cover"
									data-bgrepeat="no-repeat"
                                    data-ease="Linear.easeNone"

									class="rev-slidebg">

								<div class="tp-caption"
									data-x="['left','left','center','center']" data-hoffset="['145','145','-150','-240']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[-300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.5;s:500;"><img src="{{URL::to('asset/img/slides/slide-title-border-light.png') }}" alt=""></div>

								<div class="tp-caption text-color-light font-weight-normal "
									data-x="['left','left','center','center']" data-hoffset="['200','200','0','0']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="700"
									data-fontsize="['22','22','22','40']"
									data-lineheight="['25','25','25','45']"
									data-transform_in="y:[-50%];opacity:0;s:500;">
                                        <span class="inverted">Selamat Datang</span>
                                    </div>

								<div class="tp-caption d-none d-md-block"
									data-frames='[{"delay":3800,"speed":500,"frame":"0","from":"opacity:0;x:10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="['left','left','center','center']" data-hoffset="['365','365','80','135']"
									data-y="center" data-voffset="['-33','-33','-33','-55']"><img src="{{URL::to('asset/img/slides/slide-blue-line.png') }}" alt=""></div>

								<div class="tp-caption"
									data-x="['left','left','center','center']" data-hoffset="['440','440','150','240']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.5;s:500;"><img src="{{URL::to('asset/img/slides/slide-title-border-light.png') }}" alt=""></div>

								<h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2" style="text-shadow: black 0.1em 0.1em 0.2em"
									data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="['left','left','center','center']" data-hoffset="['152','152','0','0']"
									data-y="center"
									data-fontsize="['50','50','50','90']"
									data-lineheight="['55','55','55','95']"
									data-letterspacing="-1">{{ $pegawai["nama_skpd"] }}</h1>



							</li>
                            @endforeach


						</ul>
					</div>
				</div>
                <div class="home-intro bg-dark m-0 " id="home-intro">
					<div class="container">

						<div class="row align-items-center">
							<div class="col-lg-1">
								<div class="bg-primary text-white text-center font-weight-medium py-2" style="width: 170px;">Pengumuman</div>
							</div>
							<div class="col-lg-11">
								<div class="get-started text-left text-lg-right">


                        <div class="owl-carousel owl-theme stage-margin stage-margin-lg nav-style-2 mb-0" data-plugin-options="{'items': 1, 'margin': 100, 'loop': true, 'nav': false, 'dots': false, 'stagePadding': 100,'autoplay': true, 'autoplayTimeout': 3000}">
                            @foreach($pengumuman as $p)
                            <div class="text-left">

                                <div class="lead lead-2 mb-0"><a class="text-white text-uppercase font-weight-semi-bold" href="">{{ $p->text }} | {{ $p->date }}</a></div>

                            </div>
                            @endforeach
                        </div>

								</div>
							</div>
						</div>

					</div>
                </div>








                <!-- News Start -->
<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('icon/silverBG.jpg') }}">
    <div class="container bg-transparent py-2 full-width appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">
        <div class="row my-5">
            <div class="col">
                <div class="heading heading-border heading-middle-border heading-middle-border-center text-center ">
                    <h2 class="bg-warning text-white font-weight-bold "> BERITA <span class="bg-warning" style="color: rgb(166, 26, 209);">TERBARU</span></h2>
                </div>
            </div>
        </div>
        <div role="main" class="main pt-3 mt-3">
		<section class="section border-0 m-0 pb-3">
					<div class="container container-lg">
						<div class="row pb-1">

						@foreach ($berita as  $key => $item)
							<div class="col-sm-6 col-lg-4 mb-4 pb-2">

								<a href="{{ url('berita/detail_berita/'.$item->title_slug) }}">
									<article>
										<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
											<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
												<img src="{{ URL::to($item->picture) }}" width="200" height="220" alt="{!! Str::limit($item->title, 30, '...') !!}">
												<div class="thumb-info-title bg-transparent p-4">
													<div class="thumb-info-type bg-color-primary px-2 mb-1">{{ $item->category->category_name}}</div>
													<div class="thumb-info-inner mt-1">
														<h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0"  data-appear-animation="flipInY" data-appear-animation-delay="0" data-appear-animation-duration="3s">{!! Str::limit($item->title, 30, '...') !!}</h2>
													</div>
													<div class="thumb-info-show-more-content">
														<!-- <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">{!! Str::limit($item->content, 50, '...') !!}</p> -->
													</div>
												</div>
											</div>
										</div>
									</article>
								</a>

							</div>
							@endforeach

						</div>
					</div>
				</section>
        </div>
    </section>
    <!-- News Start -->
<!-- Match Section Begin -->

<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('icon/purple-bg1.png') }}">
    <div class="container bg-transparent py-2 full-width appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">
        <div class="row my-5">
            <div class="col">
                <div class="heading heading-border heading-middle-border heading-middle-border-center text-center ">
                    <h2 class="bg-warning text-white font-weight-bold "> POTENSI DESA <span class="bg-warning" style="color: rgb(166, 26, 209);">TERBARU</span></h2>
                </div>
            </div>
        </div>
        <div role="main" class="main pt-3 mt-3">
		<!-- <section class="section border-0 m-0 pb-3"> -->
					<div class="container container-lg">
						<div class="row pb-1">

						@if ($potensi->count() > 0)
								@foreach ($potensi as $key => $item)
							<div class="col-sm-6 col-lg-4 mb-4 pb-2">

								<a href="{{ url('profile/detail_potensi/'.$item->title_slug) }}">
									<article>
										<div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
											<div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
												<img src="{{ URL::to($item->picture) }}" width="200" height="220" alt="{!! Str::limit($item->title, 30, '...') !!}">
												<div class="thumb-info-title bg-transparent p-4">
													<div class="thumb-info-type bg-color-primary px-2 mb-1">Potensi Desa</div>
													<div class="thumb-info-inner mt-1">
														<h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0" data-appear-animation="rotateIn" data-appear-animation-delay="0" data-appear-animation-duration="3s">{!! Str::limit($item->title, 30, '...') !!}</h2>
													</div>
													<div class="thumb-info-show-more-content">
														<!-- <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">{!! Str::limit($item->content, 50, '...') !!}</p> -->
													</div>
												</div>
											</div>
										</div>
									</article>
								</a>

							</div>
							@endforeach
									@else
                                    <tr>
										<p></p>
									</tr>
									@endif

						</div>
					</div>
				<!-- </section> -->
        </div>
    </section>



	<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('icon/silverBG3.png') }}" height="10px">
					<div class="container container-xl py-3">
						<div class="row">
							<div class="col text-center">
								<h2 class="font-weight-normal mb-5">Aparatur<strong class="font-weight-extra-bold">Desa</strong></h2>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col">

								<div class="owl-carousel owl-theme nav-style-1 stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 2}, '992': {'items': 3}, '1200': {'items': 4}}, 'margin': 3, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                @foreach ($data["pegawaidesa"]["data"] as $datapegawai)
                                    <div class="m-3">
										<div class="hover-effect-3d">
											<div class="thumb-info thumb-info-hide-wrapper-bg thumb-info-no-zoom rounded-0">
												<div class="thumb-info-wrapper">
													<img src="{{$link}}/data/foto/pegawai/{{ $datapegawai['foto_pegawai'] }}" height="325px" width="100px" alt="">
                                                    <span class="thumb-info-title">
														<span class="thumb-info-inner" data-appear-animation="zoomInDown" data-appear-animation-delay="0" data-appear-animation-duration="2s">{{ $datapegawai['nama_lengkap'] }}</span>
														<span class="thumb-info-type" data-appear-animation="zoomInDown" data-appear-animation-delay="0" data-appear-animation-duration="2s">{{ $datapegawai['jabatan'] }}</span>
													</span>
													<span class="thumb-info-action">
														<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                @endforeach
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col text-center">
								<a href="{{ URL::to('data_desa/aparatur_desa') }}" class="btn btn-primary font-weight-semibold text-3 px-5 btn-py-2">Lihat Selengkapnya</a>
							</div>
						</div>
					</div>
				</section>


                <section class="section section-primary section-no-border my-0">
					<div class="container mb-5 pb-5">
						<div class="row justify-content-center">
							<div class="col">
								<div class="row pt-4">
									<div class="col-md-8 order-2 order-md-1 appear-animation" data-appear-animation="fadeInRightShorter">
										<div class="row text-center text-md-left mb-5 pb-5">
											<div class="col-lg-7">
												<h2 class="text-7 font-weight-semibold mb-2">Statistik Desa</h2>
											</div>
											<div class="col-lg-10">
												<p class="text-3 line-height-9 opacity-7">Berikut ini adalah data statistik {{ $pegawai["nama_skpd"] }}</p>
												<!-- <a href="#" class="d-inline-flex align-items-center btn btn-dark text-color-light font-weight-bold px-4 btn-py-2 text-2 rounded">VIEW OUR SERVICES <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a> -->
											</div>
										</div>
									</div>
									<div class="col-md-4 text-center order-1 order-md-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
										<p class="text-1 mb-2 opacity-7">Data Desa</p>
										<div class="owl-carousel owl-theme nav-style-3 nav-light dots-light text-color-light" data-plugin-options="{'items': 1, 'margin': 100, 'loop': true, 'nav': true, 'dots': true, 'stagePadding': 60, 'autoHeight': true}">
											<div class="text-center pt-3">
												<strong class="font-weight-extra-bold text-8 text-lg-8">Data Pendidikan<sup class="sup-text-small pl-1"></sup></strong>

											</div>
											<div class="text-center pt-3">
												<strong class="font-weight-extra-bold text-8 text-lg-8">Data Pekerjaan<sup class="sup-text-small pl-1"></sup></strong>

											</div>
											<div class="text-center pt-3">
												<strong class="font-weight-extra-bold text-8 text-lg-8" >Data Agama<sup class="sup-text-small pl-1"></sup></strong>

											</div>
                                            <div class="text-center pt-3">
												<strong class="font-weight-extra-bold text-8 text-lg-8" >Data Jenis Kelamin<sup class="sup-text-small pl-1"></sup></strong>
											</div>
                                            <div class="text-center pt-3">
												<strong class="font-weight-extra-bold text-8 text-lg-8" >Data Umur<sup class="sup-text-small pl-1"></sup></strong>
											</div>
                                            <div class="text-center pt-3">
												<strong class="font-weight-extra-bold text-8 text-lg-8" >Data Aparatur Desa<sup class="sup-text-small pl-1"></sup></strong>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</section>




				<div class="container">
					<div class="row" style="margin-top: -165px">
						<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

							<div class="card flip-card flip-card-3d bg-transparent text-center rounded-0">
								<div class="flip-front p-5">
									<div class="flip-content my-4">
										<strong class="font-weight-extra-bold text-color-dark line-height-1 text-5 mb-3 d-inline-block">Data Pendidikan</strong>
										<h4 class="font-weight-bold text-color-primary text-4">Data Pendidikan</h4>
										<p>Data pendidikan warga {{ $pegawai["nama_skpd"] }}</p>
									</div>
								</div>
								<div class="flip-back d-flex align-items-center p-5" style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
									<div class="flip-content my-4">
										<h4 class="font-weight-bold text-color-light"></h4>
										<p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>
										<a href="{{ URL::to('data_desa/data_pendidikan') }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">Lihat Data</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

							<div class="card flip-card flip-card-3d bg-transparent text-center rounded-0">
                            <div class="flip-front p-5">
									<div class="flip-content my-4">
										<strong class="font-weight-extra-bold text-color-dark line-height-1 text-5 mb-3 d-inline-block">Data
                                            Pekerjaan</strong>
										<h4 class="font-weight-bold text-color-primary text-4">Data Pekerjaan</h4>
										<p>Data pekerjaan warga {{ $pegawai["nama_skpd"] }}</p>
									</div>
								</div>
								<div class="flip-back d-flex align-items-center p-5" style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
									<div class="flip-content my-4">
										<h4 class="font-weight-bold text-color-light"></h4>
										<p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>
										<a href="{{ URL::to('data_desa/data_pekerjaan') }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">Lihat Data</a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

							<div class="card flip-card flip-card-3d bg-transparent text-center rounded-0">
                            <div class="flip-front p-5">
									<div class="flip-content my-4">
										<strong class="font-weight-extra-bold text-color-dark line-height-1 text-5 mb-3 d-inline-block">Data Agama</strong>
										<h4 class="font-weight-bold text-color-primary text-4">Data Agama</h4>
										<p>Data agama warga {{ $pegawai["nama_skpd"] }}</p>
									</div>
								</div>
								<div class="flip-back d-flex align-items-center p-5" style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
									<div class="flip-content my-4">
										<h4 class="font-weight-bold text-color-light"></h4>
										<p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>
										<a href="{{ URL::to('data_desa/data_agama') }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">Lihat Data</a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

							<div class="card flip-card flip-card-3d bg-transparent text-center rounded-0">
                            <div class="flip-front p-5">
									<div class="flip-content my-4">
										<strong class="font-weight-extra-bold text-color-dark line-height-1 text-5 mb-3 d-inline-block">Data Jenis Kelamin</strong>
										<h4 class="font-weight-bold text-color-primary text-4">Data Pekerjaan</h4>
										<p>Data jenis kelamin warga {{ $pegawai["nama_skpd"] }}</p>
									</div>
								</div>
								<div class="flip-back d-flex align-items-center p-5" style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
									<div class="flip-content my-4">
										<h4 class="font-weight-bold text-color-light"></h4>
										<p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>
										<a href="{{ URL::to('data_desa/data_jenis_kelamin') }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">Lihat Data</a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

							<div class="card flip-card flip-card-3d bg-transparent text-center rounded-0">
                            <div class="flip-front p-5">
									<div class="flip-content my-4">
										<strong class="font-weight-extra-bold text-color-dark line-height-1 text-5 mb-3 d-inline-block">Data Umur</strong>
										<h4 class="font-weight-bold text-color-primary text-4">Data umur</h4>
										<p>Data umur warga {{ $pegawai["nama_skpd"] }}</p>
									</div>
								</div>
								<div class="flip-back d-flex align-items-center p-5" style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center;">
									<div class="flip-content my-4">
										<h4 class="font-weight-bold text-color-light"></h4>
										<p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>
										<a href="{{ URL::to('data_desa/data_umur') }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">Lihat Data</a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">

							<div class="card flip-card flip-card-3d bg-transparent text-center rounded-0">
                            <div class="flip-front p-5">
									<div class="flip-content my-4">
										<strong class="font-weight-extra-bold text-color-dark line-height-1 text-5 mb-3 d-inline-block">Data Aparatur Desa</strong>
										<h4 class="font-weight-bold text-color-primary text-4">Data Aparatur Desa</h4>
										<p>Data aparatur warga {{ $pegawai["nama_skpd"] }}</p>
									</div>
								</div>
								<div class="flip-back d-flex align-items-center p-5" style="background-image: url(img/generic/generic-corporate-17-1.jpg); background-size: cover; background-position: center; ">
									<div class="flip-content my-4">
										<h4 class="font-weight-bold text-color-light"></h4>
										<p class="font-weight-light text-color-light opacity-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius.</p>
										<a href="{{ URL::to('data_desa/aparatur_desa') }}" class="btn btn-light btn-modern text-color-dark font-weight-bold">Lihat Data</a>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>

			<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('icon/silverBG.jpg') }}">
					<div class="container py-4">

						<div class="row align-items-center">
							<div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
								<div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
									<div>
										<img alt="" class="img-fluid" src="{{URL::to('icon/mobile_android_eofice.png') }}">
									</div>
									<div>
										<img alt="" class="img-fluid" src="{{URL::to('icon/pc_android_eofice.png') }}">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Aplikasi <strong class="font-weight-extra-bold">E Office Desa</strong></h2>
								</div>
								<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Aplikasi E-Office Desa merupakan aplikasi yang dibuat khusus untuk memudahkan pelayanan bagi masyarakat desa. Aplikasi E-Office Desa terdapat versi mobile untuk pengguna android dan ada juga versi Web, dengan E-Office Desa ini bisa membantu pemerintah desa untuk lebih effisien dan praktis dalam pelayanan sehingga pelayanan di desa bisa dilakukan dengan cepat dan tepat.</p>
								<!-- <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> -->
								<div class="col-lg-6">
									<a href="https://play.google.com/store/apps/details?id=im.digitaloffice.eofficedesa" target="_BLANK" class="btn btn-modern btn-dark mt-3">Versi Mobile</a>
									<a href="https://e-officedesa.ciamiskab.go.id/admin/login" target="_BLANK" class="btn btn-modern btn-primary mt-3">Versi Web</a>
								</div>
							</div>

						</div>

					</div>
				</section>

			<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('icon/back-visit.png') }}">
					<div class="container mb-5 pb-5">
					<div class="row text-center pt-4 mt-5">
						<div class="col">
							<h2 class="word-rotator slide font-weight-bold text-8 mb-2">
								<span style="color:white;">JUMLAH PENGUNJUNG WEBSITE</span>
								<span class="word-rotator-words bg-warning">
								@php
                                @endphp
									<b class="is-visible">{{$visitors->jumlah}}</b>
									<b>{{$visitors->jumlah}}</b>
								</span>
							</h2>

						</div>
					</div>
					</div>

				</section>


<!--
				<section class="call-to-action call-to-action-strong-grey content-align-center call-to-action-in-footer">
					<div class="container py-5">
						<div class="row text-center pt-4 mt-5">
							<div class="col-md-9 col-lg-9">
								<div class="call-to-action-content">
									<h2 class="word-rotator slide font-weight-bold text-8 mb-2">
								<span>JUMLAH PENGUNJUNG WEBSITE</span>
								<span class="word-rotator-words bg-primary">
								@php
                                @endphp
									<b class="is-visible">{{$visitors->jumlah}}</b>
									<b>{{$visitors->jumlah}}</b>
								</span>
								</h2>
								</div>
							</div>
						</div>
					</div>
				</section> -->



			@include('layout.footer')

	</body>

</html>
