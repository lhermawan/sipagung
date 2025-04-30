@include('layout.head')
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
			place-items:center;
		 margin: 0 auto;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
</style>

	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
    @include('layout.sidebar')
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

        <div role="main" class="main">
				<div class="slider-container rev_slider_wrapper" style="height: 670px;">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 670, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'parallax': { 'type': 'scroll', 'origo': 'enterpoint', 'speed': 1000, 'levels': [2,3,4,5,6,7,8,9,12,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': true }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
						<ul>
							<li data-transition="fade">
								<img src="kampungnila/kampungnila4.jpg"
									alt=""
									data-bgposition="center center"
									data-bgfit="cover"
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption tp-resizeme"
									data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"opacity:0;x:100%;y:-100%;","to":"o:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
								    data-type="image"
								    data-x="right"
								    data-y="top"
								    data-width="['auto']"
								    data-height="['auto']"
								    data-basealign="slide"><img src="kampungnila/kampungnila4.jpg" alt=""></div>

								<div class="tp-caption tp-resizeme"
									data-frames='[{"delay":1500,"speed":2000,"frame":"0","from":"opacity:0;x:-100%;y:-100%;","to":"o:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
								    data-type="image"
								    data-x="left"
								    data-y="center"
								    data-width="['auto']"
								    data-height="['auto']"
								    data-basealign="slide"><img src="kampungnila/kampungnila4.jpg" alt=""></div>

								<div class="tp-caption tp-resizeme rs-parallaxlevel-7"
								    data-frames='[{"delay":2500,"speed":1500,"frame":"0","from":"opacity:0;x:-50%;y:-50%;","to":"opacity:1;x:0;y:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
								    data-type="image"
								    data-x="-500"
								    data-y="-700"
								    data-width="['auto']"
								    data-height="['auto']"
								    data-basealign="slide"><img src="kampungnila/kampungnila4.jpg" alt=""></div>

								<div class="tp-caption"
									data-x="center" data-hoffset="['-150','-150','-150','-240']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[-300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.2;s:500;"><img src="kampungnila/kampungnila4.jpg" alt=""></div>

								<div class="tp-caption text-color-light font-weight-normal"
									data-x="center"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="700"
									data-fontsize="['22','22','22','40']"
									data-lineheight="['25','25','25','45']"
									data-transform_in="y:[-50%];opacity:0;s:500;"></div>

								<div class="tp-caption d-none d-md-block"
									data-frames='[{"delay":2400,"speed":500,"frame":"0","from":"opacity:0;x:10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="center" data-hoffset="['80','80','80','135']"
									data-y="center" data-voffset="['-33','-33','-33','-55']"><img src="kampungnila/kampungnila3.jpg" alt=""></div>

								<div class="tp-caption"
									data-x="center" data-hoffset="['150','150','150','240']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.2;s:500;"><img src="kampungnila/kampungnila1.jpg" alt=""></div>

								<div class="tp-caption font-weight-extra-bold text-color-light negative-ls-2"
									data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="center"
									data-y="center"
									data-fontsize="['50','50','50','90']"
									data-lineheight="['55','55','55','95']"></div>

								<div class="tp-caption font-weight-light"
									data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
									data-x="center"
									data-y="center" data-voffset="['40','40','40','80']"
									data-fontsize="['18','18','18','50']"
									data-lineheight="['20','20','20','55']"
									style="color: #b5b5b5;"></div>

							</li>
							<li class="slide-overlay" data-transition="fade">
								<img src="kampungnila/kampungnila4.jpg"
									alt=""
									data-bgposition="center center"
									data-bgfit="cover"
									data-bgrepeat="no-repeat"
									class="rev-slidebg">

								<div class="tp-caption"
									data-x="center" data-hoffset="['-170','-170','-170','-350']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[-300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.2;s:500;"><img src="kampungnila/kampungnila4.jpg" alt=""></div>

								<div class="tp-caption text-color-light font-weight-normal"
									data-x="center"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="700"
									data-fontsize="['16','16','16','40']"
									data-lineheight="['25','25','25','45']"
									data-transform_in="y:[-50%];opacity:0;s:500;">SELAMAT DATANG DI HALAMAN</div>

								<div class="tp-caption"
									data-x="center" data-hoffset="['170','170','170','350']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.2;s:500;"><img src="kampungnila/kampungnila4.jpg" alt=""></div>

								<div class="tp-caption font-weight-extra-bold text-color-light negative-ls-1"
									data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="center"
									data-y="center"
									data-fontsize="['50','50','50','90']"
									data-lineheight="['55','55','55','95']">KAMPUNG NILA </div>

								<div class="tp-caption font-weight-light ws-normal text-center"
									data-frames='[{"from":"opacity:0;","speed":300,"to":"o:1;","delay":2000,"split":"chars","splitdelay":0.05,"ease":"Power2.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
									data-x="center"
									data-y="center" data-voffset="['60','60','60','105']"
									data-width="['530','530','530','1100']"
									data-fontsize="['18','18','18','40']"
									data-lineheight="['26','26','26','45']"
									style="color: #b5b5b5;">DESA <strong class="text-color-light">KAWALI</strong> KECAMATAN KAWALI KABUPATEN CIAMIS</div>

							</li>

						</ul>
					</div>
				</div>
			</div>
        </div>

		<div class="body">
			<!-- @include('layout.sidebar') -->
            <div role="main" class="main">

                    <!-- <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
                        <div class="container">
                            <div class="row">

                                <div class="col-md-12 align-self-center p-static order-2 text-center">


                                <h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                                                        <span>KAMPUNG</span>
                                                        <span class="word-rotator-words bg-primary">
                                                            <b class="is-visible">NILA</b>
                                                            <b>{{ $pegawai["nama_skpd"] }}</b>
                                                        </span>
                                                    </h2>
                                </div>
                            </div>
                        </div>
                    </section> -->




                    <div class="container">

					<div class="container pb-1">

							<div class="row pt-4">
								<div class="col">
									<div class="overflow-hidden mb-3">
										<h2 class="font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
											Selamat Datang
										</h2>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-10">
									<div class="overflow-hidden">
										<p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
										<span class="alternative-font">SFV KAMPUNG NILA</span> Desa Kawali berlokasi di Desa Kawali Kecamatan Kawali Kabupaten Ciamis
										</p>
									</div>
								</div>
								<div class="col-lg-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
									<a href="https://maps.app.goo.gl/8wKDZ3dDiebsNbZL9" target="_BLANK" class="btn btn-modern btn-dark mt-1">Lihat Lokasi</a>
								</div>
							</div>

							<div class="row">
								<div class="col py-3">
									<hr class="solid mt-5 mb-2">
								</div>
							</div>

							<div class="row">
								<div class="featured-boxes featured-boxes-style-2">
									<div class="row">
										<div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="900">
											<div class="featured-box featured-box-effect-4">
												<div class="box-content">
												<a href="{{ URL::to('kampungnila/berita_kampungnila') }}"><img src="kampungnila/news_ikon.png" width="100" height="100"/></a>
													<a href="{{ URL::to('kampungnila/berita_kampungnila') }}"><h4 class="font-weight-bold">Berita SFV Kampung Nila</h4></a>
													<p class="px-3"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1500">
											<div class="featured-box featured-box-effect-4">
												<div class="box-content">
												<a href="{{ URL::to('kampungnila/sfv_kampungnila') }}"><img src="kampungnila/sfv.png" width="100" height="100"/></a>
													<a href="{{ URL::to('kampungnila/sfv_kampungnila') }}"><h4 class="font-weight-bold">SFV Kampung Nila</h4></a>
													<p class="px-3"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1500">
											<div class="featured-box featured-box-effect-4">
												<div class="box-content">
												<a href="{{ URL::to('kampungnila/paket_mina_eduwisata') }}"><img src="kampungnila/tour.png" width="100" height="100"/></a>
													<a href="{{ URL::to('kampungnila/paket_mina_eduwisata') }}"><h4 class="font-weight-bold">Paket Mina Eduwisata</h4></a>
													<p class="px-3"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1300">
											<div class="featured-box featured-box-effect-4">
												<div class="box-content">
												<a href="{{ URL::to('kampungnila/produk_sfv_kampungnila') }}"><img src="kampungnila/fish_ikon.png" width="100" height="100"/></a>
												<a href="{{ URL::to('kampungnila/produk_sfv_kampungnila') }}"><h4 class="font-weight-bold">Produk SFV Kampung Nila</h4></a>
													<p class="px-3"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1300">
											<div class="featured-box featured-box-effect-4">
												<div class="box-content">
												<a href=""><img src="kampungnila/gapokkan.png" width="100" height="100"/></a>
												<a href=""><h4 class="font-weight-bold">GAPOKKAN SFV Kampung Nila</h4></a>
													<p class="px-3"></p>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1300">
											<div class="featured-box featured-box-effect-4">
												<div class="box-content">
												<a href="{{ URL::to('kampungnila/testimoni') }}"><img src="kampungnila/testimoni.png" width="100" height="100"/></a>
												<a href="{{ URL::to('kampungnila/testimoni') }}"><h4 class="font-weight-bold">Testimoni & Review</h4></a>
													<p class="px-3"></p>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							</div>
					<!-- <div class="row pt-5">
						<div class="col">



							<div class="row mt-3 mb-5">
								<div class="col-md-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
									<h3 class="font-weight-bold text-4 mb-2">Our Mission</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu.</p>
								</div>
								<div class="col-md-4 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="600">
									<h3 class="font-weight-bold text-4 mb-2">Our Vision</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nulla vel pellentesque consequat, ante nulla hendrerit arcu.</p>
								</div>
								<div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="800">
									<h3 class="font-weight-bold text-4 mb-2">Why Us</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel consequat, ante nulla hendrerit arcu.</p>
								</div>
							</div>

						</div>
					</div> -->
				</div>

				<section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
					<div class="container py-4">
						@foreach ($tentang as $key => $item)
						<div class="row align-items-center">
							<div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
								<div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
									<div>
										<img alt="" class="img-fluid" src="{{ URL::to($item->picture) }}">
									</div>

								</div>
							</div>
							<div class="col-md-6">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Tentang <strong class="font-weight-extra-bold">Kampung Nila Desa Kawali</strong></h2>
								</div>
								<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">{!! $item->tentang !!}</p>
							</div>
						</div>
						@endforeach
					</div>
				</section>

				<section class="section section-default border-0 my-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="750">
					<div class="container py-4">
						<div class="row align-items-center">

							<div class="col-md-6">
								<div class="overflow-hidden mb-2">
									<h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Vidio Sekilas <strong class="font-weight-extra-bold">Kampung Nila Desa Kawali</strong></h2>
								</div>
								<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400"></p>
							</div>

							<div class="col-md-6 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1000">
								<div class="owl-carousel owl-theme nav-inside mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
									<div>
									<iframe  height="500" frameborder="0" allowfullscreen=""  src="https://www.youtube.com/embed/BtsHBbM7hPo"></iframe>
									</div>

								</div>
							</div>
						</div>
					</div>
				</section>




				<div class="container appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
					<div class="row pt-5 pb-4 my-5">

						<div class="col-md-6 order-2 order-md-1 text-center text-md-left">

							<div class="owl-carousel owl-theme nav-style-1 nav-center-images-only stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 2}, '1200': {'items': 2}}, 'margin': 25, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
								@foreach ($pengelola as $key => $item)
								<div>
									<img class="img-fluid rounded-0 mb-4" src="{{ URL::to($item->picture) }}" alt="" />
									<h3 class="font-weight-bold text-color-dark text-4 mb-0">{{$item->nama}}</h3>
									<p class="text-2 mb-0">Pengelola</p>
								</div>
								@endforeach
							</div>

						</div>



						<div class="col-md-6 order-1 order-md-2 text-center text-md-left mb-5 mb-md-0">
							<h2 class="text-color-dark font-weight-normal text-6 mb-2 pb-1">Pengelola <strong class="font-weight-extra-bold">Kampung Nila</strong></h2>
							<p class="lead"></p>
							<p class="mb-4">Berikut ini adalah pengelola-pengelola dari SFV Kampung Nila Desa Kawali Kecamatan Kawali</p>
						</div>
					</div>
				</div>





				<section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
					<div class="container pb-2">
						<div class="row">
							<div class="col-lg-6 text-center text-md-left mb-5 mb-lg-0">
								<h2 class="text-color-dark font-weight-normal text-6 mb-2">Testimoni & Review <strong class="font-weight-extra-bold">Tentang SFV Kampung Nila</strong></h2>
								<p class="lead">Ini adalah testimoni atau respon yang diberikan pengunjung terhadap SFV Kampung Nila Desa Kawali. Untuk memberikan testimoni klik menu testimoni di halaman SFV Kampung Nila ini.</p>
								<div class="row justify-content-center my-5">
									<div class="col-8 text-center col-md-4">
										<img src="img/logos/logo-1.png" class="img-fluid hover-effect-3" alt="" />
									</div>
									<div class="col-8 text-center col-md-4 my-3 my-md-0">
										<img src="img/logos/logo-2.png" class="img-fluid hover-effect-3" alt="" />
									</div>
									<div class="col-8 text-center col-md-4">
										<img src="img/logos/logo-3.png" class="img-fluid hover-effect-3" alt="" />
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="owl-carousel owl-theme nav-style-1 stage-margin" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 1}, '992': {'items': 1}, '1200': {'items': 1}}, 'loop': true, 'nav': false, 'dots': false, 'stagePadding': 40, 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
									@foreach ($testimoni as $key => $item)
									<div>
										<div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark testimonial-remove-right-quote pl-md-4 mb-0">
											<div class="testimonial-author">
											<div class="rated">
												@for($i=1; $i<=$item->rating; $i++)
												<label class="star-rating-complete" title="text">{{$i}} stars</label>
												@endfor
												</div>
											</div>
												<p class="text-color-dark text-4 line-height-5 mb-0">{{$item->komentar}}</p>
											<div class="testimonial-author">
												<p><strong class="font-weight-extra-bold text-2">{{$item->nama}}</strong></p>
												<img src="{{ URL::to('/images/foto_testimoni/'. $item->avatar) }}" alt="">
											</div>
										</div>
									</div>
									@endforeach

								</div>
							</div>
						</div>
					</div>
				</section>




        </div>
    </div>




@include('layout.footer')

</body>
</html>
