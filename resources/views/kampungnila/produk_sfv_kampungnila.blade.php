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
									<span>SEMUA</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">PRODUK SFV KAMPUNG NILA</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">{{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<div role="main" class="main">

                <div class="container">
                <div class="row align-items-center">
						<div class="col-lg-7 text-center text-lg-left">
							<h2 class="font-weight-bold text-8 line-height-2 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="500"><span class="text-5">Produk SFV Kampung Nila Desa Kawali</span></h2>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="500">
								<div class="owl-carousel owl-theme nav-inside nav-style-1 nav-light mt-2" data-plugin-options="{'items': 1, 'margin': 10, 'nav': true, 'dots': false, 'animateOut': 'fadeOut', 'autoplay': true, 'autoplayTimeout': 6000, 'loop': true}">
                                    @foreach ($paket as $key => $item)
                                    <div>
                                        <a href="{{ url('kampungnila/detail_produk_sfv_kampungnila/'.$item->title_slug) }}">
										<div class="img-thumbnail border-0 p-0 d-block">
											<img src="{{ URL::to($item->picture) }}" width="100" height="500" alt="">
										</div>
                                        </a>
									</div>
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>



</div>

<section class="section section-height-3 bg-color-grey m-0 border-0 appear-animation" data-appear-animation="fadeIn" data-plugin-options="{'accY': -150}">
<div class="container py-4">
    <h4 class="mb-3 text-4 text-uppercase">Semua Produk SFV <strong class="font-weight-extra-bold">Kampung Nila Desa Kawali</strong></h4>
    <div class="row">
        @foreach ($paket as $key => $item)
        <div class="col-12 col-sm-6 col-lg-3 mb-4">
            <div class="portfolio-item">
                <a href="{{ url('kampungnila/detail_produk_sfv_kampungnila/'.$item->title_slug) }}">
                    <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                        <span class="thumb-info-wrapper border-radius-0">
                            <img src="{{ URL::to($item->picture) }}" width="300px" height="200px" alt="">
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner">{{$item->judul}}</span>
                                <span class="thumb-info-type">{{$item->jenis_paket}}</span>
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
    {{ $paket->links() }}
</div>
</section>
             
@include('layout.footer')

</body>
</html>
