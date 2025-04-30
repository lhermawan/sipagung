@include('layout.head')
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">


		<div class="body">
			@include('layout.sidebar')

			<div role="main" class="main">
				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-md-12 align-self-center p-static order-2 text-center ">
							<h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
									<span>SEJARAH</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">{{ $pegawai["nama_skpd"] }}</b>
										<b>DESA</b>
									</span>
								</h2>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-dark d-block text-center">
									<li><a href="{{ URL::to('/') }}">Home</a></li>
									<li class="active">SEJARAH DESA</li>
								</ul>
							</div>
						</div>
					</div>
				</section>



				<div class="container pb-1">



					<div class="row mb-2">
						<div class="col-lg-10">
							<div class="overflow-hidden">
								<!-- <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="250">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non <span class="alternative-font">metus.</span> pulvinar. Sociis natoque penatibus et magnis dis parturient montes.
								</p> -->
							</div>
						</div>
						<div class="col-lg-2 appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="450">
							<!-- <a href="#" class="btn btn-modern btn-primary mt-1">Join Our Team!</a> -->
						</div>
					</div>
				</div>
				<section class="section appear-animation set-bg"  data-setbg="{{ URL::to('/icon/silverBG.jpg') }}" data-appear-animation="fadeIn" data-appear-animation-delay="750">
					<div class="container py-4">
					@foreach ($sejarah as $key => $item)

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
									<h2 class="text-color-dark font-weight-normal text-5 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="1200">SEJARAH<strong class="font-weight-extra-bold"> {{ $pegawai["nama_skpd"] }}</strong></h2>
								</div>
								<p class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">{!! $item->sejarah !!}</p>
								<!-- <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">Consectetur adipiscing elit. Aliquam iaculis sit amet enim ac sagittis. Curabitur eget leo varius, elementum mauris eget, egestas quam.</p> -->
							</div>
						</div>
						@endforeach
					</div>
				</section>

			@include('layout.footer')

	</body>
</html>
