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
									<span></span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">Gapokkan SFV KAMPUNG NILA</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">Gapokkan SFV KAMPUNG NILA KAWALI</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<div class="container py-4">
    <section class="section appear-animation set-bg"  data-setbg="{{ URL::to('/icon/silverBG.jpg') }}" data-appear-animation="fadeIn" data-appear-animation-delay="750">
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
                        <h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">Gapokkan SFV KAMPUNG NILA<strong class="font-weight-extra-bold"> KAWALI</strong></h2>
                    </div>
                    <p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">{!! $item->tentang !!}</p>
                     {{-- <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> --}}
                </div>
            </div>
            @endforeach
        </div>
    </section>


    <div class="container py-4">
        <h4 class="mb-3 text-4 text-uppercase">Semua Kelompok <strong class="font-weight-extra-bold">Pokdakan SFV Kamppung Nila Kawali</strong></h4>
        <div class="row">
            <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark" data-plugin-options="{'items': 4, 'margin': 10, 'loop': true, 'nav': true, 'dots': false, 'autoplay': true, 'autoplayTimeout': 3000}">
            @foreach ($gapokkan as $key => $item)
            <div class="">
                <div class="portfolio-item">
                    <a href="{{ url('kampungnila/detail_gapokkan/'.$item->title_slug) }}">
                        <span class="thumb-info thumb-info-lighten thumb-info-no-borders border-radius-0">
                            <span class="thumb-info-wrapper border-radius-0">
                                <img src="{{ URL::to($item->picture) }}" width="300px" height="200px" alt="">
                                <span class="thumb-info-title">
                                    <span class="thumb-info-inner">{{$item->title}}</span>
                                    <span class="thumb-info-type">{{$item->ketua_kelompok}}</span>
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

</div>



</div>
@include('layout.footer')

</body>
</html>
