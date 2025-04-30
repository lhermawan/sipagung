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
										<b>Budidaya Ikan Nila</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">Budidaya Ikan Nila</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div role="main" class="main">


<div id="revolutionSliderCarouselContainer" class="rev_slider_wrapper fullwidthbanner-container mb-4" data-alias="" style="background: #f3f3f2; height: 600px;">
    
    <div id="revolutionSliderCarousel" class="rev_slider fullwidthabanner" data-version="5.4.8">
       
        <ul>
        @foreach ($data as $key => $item)
            <li data-index="rs-1" data-transition="fade" data-slotamount="7" data-easein="default" data-easeout="default" data-masterspeed="300" data-rotate="0" data-saveperformance="off" data-title="" data-description="">
                <img src="{{ URL::to($item->picture) }}" alt="{{$item->jenis_ikan}}" data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
            </li>
         @endforeach
        </ul>
       
    </div>


    
</div>

                <div class="container py-4">
					<h4 class="mb-3 text-4 text-uppercase">Semua Jenis Ikan <strong class="font-weight-extra-bold">Budidaya Kampung Nila</strong></h4>
					<div class="row">
                        @foreach ($data as $key => $item)
						<div class="col-12 col-sm-6 col-lg-3 mb-4">
							<div class="portfolio-item">
								<a href="{{ url('kampungnila/detail_budidaya/'.$item->title_slug) }}">
									<span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
										<span class="thumb-info-wrapper border-radius-0">
											<img src="{{ URL::to($item->picture) }}" width="300px" height="200px" alt="">
											<span class="thumb-info-title">
												<span class="thumb-info-inner">{{$item->jenis_ikan}}</span>
												<span class="thumb-info-type">Jenis Ikan</span>
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
                    {{ $data->links() }}
				</div>

              

				<section class="call-to-action call-to-action-default with-button-arrow content-align-center call-to-action-in-footer call-to-action-in-footer-margin-top">
					<div class="container">
						<div class="row">
							<div class="col-md-9 col-lg-9">
								<div class="call-to-action-content">
									<h2 class="font-weight-normal text-6 mb-0">Ingin tahu <strong class="font-weight-extra-bold">lokasi</strong> dari Kampung Nila Desa Kawali <strong class="font-weight-extra-bold"></strong></h2>
									<!-- <p class="mb-0">The <strong class="font-weight-extra-bold">Best</strong> HTML Site Template on ThemeForest</p> -->
								</div>
							</div>
							<div class="col-md-3 col-lg-3">
								<div class="call-to-action-btn">
									<a href="https://maps.app.goo.gl/8wKDZ3dDiebsNbZL9" target="_blank" class="btn btn-dark btn-lg text-3 font-weight-semibold px-4 py-3">Klik di sini</a><span class="arrow hlb d-none d-md-block" data-appear-animation="rotateInUpLeft" style="top: -40px; left: 70%;"></span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
            

          

            <br>

@include('layout.footer')
</body>
</html>