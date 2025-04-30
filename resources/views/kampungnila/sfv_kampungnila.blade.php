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
									<span>SEMUA</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">SFV KAMPUNG NILA</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">SFV KAMPUNG NILA KAWALI</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div role="main" class="main">

			
				<div class="container container-lg py-5 my-5">
					<div class="row justify-content-center">
						<div class="col-md-10 px-lg-5">
							<div class="row">
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
					</div>
				</div>

			
				<!-- <section class="section section-no-border section-height-3 bg-color-primary my-0" >
					<div class="container">
						<div class="row counters counters-sm text-light">
							<div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter">
								<div class="counter">
									<strong data-to="18000" data-append="+">0</strong>
									<label class="text-light opacity-6 font-weight-normal pt-1">Happy Clients</label>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInDownShorter">
								<div class="counter">
									<strong data-to="3500" data-append="+">0</strong>
									<label class="text-light opacity-6 font-weight-normal pt-1">Answered Tickets</label>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3 mb-4 mb-sm-0 appear-animation" data-appear-animation="fadeInUpShorter">
								<div class="counter">
									<strong data-to="16">0</strong>
									<label class="text-light opacity-6 font-weight-normal pt-1">Pre-made Demos</label>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3 appear-animation" data-appear-animation="fadeInRightShorter">
								<div class="counter">
									<strong data-to="3000" data-append="+">0</strong>
									<label class="text-light opacity-6 font-weight-normal pt-1">Development Hours</label>
								</div>
							</div>
						</div>
					</div>
				</section> -->

				<div class="container my-5">
					<div class="row py-5">
						<div class="col">
							<div class="row align-items-center">
								<div class="col-lg-6">
                                <iframe width="500" height="300" frameborder="0" allowfullscreen=""  src="https://www.youtube.com/embed/yhyuS-27MiA"></iframe>
								</div>
								<div class="col-lg-5 text-center text-lg-left">
									<h4 class="text-6 font-weight-bold line-height-5 mt-4 mt-lg-0">Bupati Ciamis Mengunjungi Kampung Nila</h4>
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

@include('layout.footer')
</body>
</html>