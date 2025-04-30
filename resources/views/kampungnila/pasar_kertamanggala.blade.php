@include('layout.head')
<style>
        .berita_justify {
        text-align: justify;
        text-justify: inter-word;
        }
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

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12 align-self-center p-static order-2 text-center">


            <h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">

									<span class="word-rotator-words bg-primary">
										<b class="is-visible">PASAR IKAN KERTAMANGGALA</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">PASAR IKAN KERTAMANGGALA</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div role="main" class="main">

<div class="container pt-5">
    @foreach ($tentang as $key => $item)
    <div class="row py-4 mb-2">

        <div class="col-md-7 order-2">
            <div class="overflow-hidden">
                <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Pasar Ikan Kertamanggala</h2>
            </div>
            <div class="overflow-hidden mb-3">
                <p class="font-weight-bold text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">Pasar Ikan</p>
            </div>
            <!-- <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700"></p> -->
            <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">{!! $item->tentang !!}</p>
            <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
            <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                <div class="col-lg-6">
                    <a href="https://maps.app.goo.gl/wytxiRqWbfYoKutF8" target="_BLANK" class="btn btn-modern btn-dark mt-3">Lihat Lokasi</a>
                    <!-- <a href="#" class="btn btn-modern btn-primary mt-3">Hire Me</a> -->
                </div>
            </div>
        </div>
        <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
            <img src="{{ URL::to($item->picture) }}" class="img-fluid mb-2" alt="">
        </div>
        @endforeach
    </div>
</div>

<section class="section section-default border-0 mt-5 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="1200">
    <div class="container py-4">

        <div class="row featured-boxes featured-boxes-style-4">
		<div class="col-md-3 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInRightShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="{{ URL::to('kampungnila/nila_profile.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Profile Kampung Nila</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampung_nila') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Profile Kampung Nila <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-3 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInRightShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="{{ URL::to('kampungnila/nila_market.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Pasar Ikan Kertamanggala</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/pasar_kertamanggala') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Pasar Ikan Kertamanggala <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-3 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInLeftShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
                                        <img src="{{ URL::to('kampungnila/nila_mart.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Nila Mart</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/nila_mart') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Nila Mart <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-3 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInLeftShorter">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
											<img src="{{ URL::to('kampungnila/nila_tour.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Mina Eduwisata</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/minaeduwisata') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Mina Eduwisata <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-3 mb-2 pb-2 px-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
                                        <img src="{{ URL::to('kampungnila/nila_budidaya.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Budi Daya Ikan</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/budidaya') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Budi Daya Ikan <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
								<div class="col-md-3 px-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
                                        <img src="{{ URL::to('kampungnila/nila_pengolahan.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Pengolahan Ikan</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/pengolahan_ikan') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Pengolahan Ikan <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
                                <div class="col-md-3 px-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
                                        <img src="{{ URL::to('kampungnila/nila_resto.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Resto</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/resto') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Resto <i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
                                <div class="col-md-3 px-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
									<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-centered-info thumb-info-no-zoom thumb-info-slide-info-hover">
										<span class="thumb-info-wrapper thumb-info-wrapper-no-opacity">
                                        <img src="{{ URL::to('kampungnila/nila_fishing.png') }}" height="200" width="50" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-slide-info-hover-1">
													<span class="thumb-info-inner text-4">Kolam Pemancingan Lembah Ereng</span>
												</span>
												<span class="thumb-info-slide-info-hover-2">
													<span class="thumb-info-inner text-2">
														<a href="{{ URL::to('kampungnila/kolam_pemancingan_lembah_ereng') }}" target="_BLANK" class="d-inline-flex align-items-center btn btn-light text-color-dark font-weight-bold px-4 btn-py-2 text-1 rounded">Kolam Pemancingan Lembah Ereng<i class="fa fa-arrow-right ml-2 pl-1 text-3"></i></a>
													</span>
												</span>
											</span>
										</span>
									</span>
								</div>
        </div>

    </div>
</section>


</div>

@include('layout.footer')
</body>
</html>
