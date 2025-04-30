@include('layout.head')
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
									<span>DATA</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">{{ $pegawai["nama_skpd"] }}</b>
										<b>APARATUR</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">APARATUR {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{ URL::to('/icon/silverBG2.png') }}">
                    
<div class="container py-2">

					<ul class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
						<!-- <li class="nav-item active" data-option-value="*"><a class="nav-link text-1 text-uppercase active" href="#">Show All</a></li>
						<li class="nav-item" data-option-value=".websites"><a class="nav-link text-1 text-uppercase" href="#">Websites</a></li>
						<li class="nav-item" data-option-value=".logos"><a class="nav-link text-1 text-uppercase" href="#">Logos</a></li>
						<li class="nav-item" data-option-value=".brands"><a class="nav-link text-1 text-uppercase" href="#">Brands</a></li>
						<li class="nav-item" data-option-value=".medias"><a class="nav-link text-1 text-uppercase" href="#">Medias</a></li> -->
					</ul>

					<div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
						<div class="row portfolio-list sort-destination" data-sort-id="portfolio">
							
                        @foreach ($data["pegawaidesa"]["data"] as $datapegawai)
							<div class="col-sm-6 col-lg-3 isotope-item brands">
								<div class="portfolio-item">
									<a href="portfolio-single-wide-slider.html">
										<span class="thumb-info thumb-info-lighten border-radius-0">
											<span class="thumb-info-wrapper border-radius-0">
												<img src="{{$link}}/data/foto/pegawai/{{ $datapegawai['foto_pegawai'] }}" height="325px" width="100px" alt="">

												<span class="thumb-info-title">
													<span class="thumb-info-inner" data-appear-animation="zoomInDown" data-appear-animation-delay="0" data-appear-animation-duration="2s">{{ $datapegawai['nama_lengkap'] }}</span>
													<span class="thumb-info-type" data-appear-animation="zoomInDown" data-appear-animation-delay="0" data-appear-animation-duration="2s">{{ $datapegawai['jabatan'] }}</span>
												</span>
												<span class="thumb-info-action">
													<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
												</span>
											</span>
										</span>
									</a>
								</div>
							</div>
                        @endforeach

						
							
						</div>
					</div>

				</div>

</div>
</section>
@include('layout.footer')

</body>
</html>
