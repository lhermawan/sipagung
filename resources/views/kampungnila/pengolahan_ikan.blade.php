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
									<span>SFV KAMPUNG NILA</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">PENGOLAHAN IKAN</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">PENGOLAHAN IKAN</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<div class="container py-4">

<div class="row">
    <div class="col-lg-9 order-lg-1">
        <div class="blog-posts">
        @foreach ($data as $key => $item)
        <article class="post post-medium">
									<div class="row mb-3">
										<div class="col-lg-5">
											<div class="post-image">
												<a href="{{ url('kampungnila/detail_pengolahan_ikan/'.$item->title_slug) }}">
													<img src="{{ URL::to($item->picture) }}" width="300px" height="200px" data-appear-animation="flipInX" data-appear-animation-delay="0" data-appear-animation-duration="1s" />
												</a>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="post-content">
												<div class="overflow-hidden mb-2">
													<h2 class="word-rotator letters type font-weight-bold line-height-4 text-9 mb-0 appear-animation" data-appear-animation="maskUp">
														<span class="word-rotator-words waiting">
															<b class="is-visible custom-primary-font">{{ $item->title}}</b>

														</span>
													</h2>
												</div>
												<div class="berita_justify">
                                                <p class="mb-0"> {!! Str::limit($item->content, 330, '...') !!}</p>
                                                </div>
											</div>
										</div>
										<span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a href="{{ url('kampungnila/detail_pengolahan_ikan/'.$item->title_slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Baca Selengkapnya</a></span>
									</div>
								</article>
            @endforeach
            <ul class="pagination float-right">
            {{ $data->links() }}
            </ul>

        </div>
    </div>
</div>

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
@include('layout.footer')

</body>
</html>
