@include('layout.head')
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
		

		<div class="body">
			@include('layout.sidebar')

			<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">

							<div class="col">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<div class="overflow-hidden pb-2">
											<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Galeri Video PORPROV XIV 2022</h2>
										</div>
									</div>
									<div class="col-md-12 align-self-center order-1">
										<ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
											<li><a href="{{ URL::to('/') }}">Home</a></li>

											<li class="active">Galeri Video</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>
                <div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts">

								<div class="row">
                            @foreach($data as $a)
									<div class="col-md-4 col-lg-3">
										<article class="post post-medium border-0 pb-0 mb-5">
											<div class="post-image">
												<a class="popup-youtube " href="https://www.youtube.com/watch?v={{ $a->url }}">
                                                    <div class="portfolio-item">

                                                            <span class="thumb-info thumb-info-lighten border-radius-0">
                                                                <span class="thumb-info-wrapper border-radius-0">
                                                                    <div class="embed-responsive embed-responsive-16by9">
                                    <iframe frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/{{ $a->url }}"></iframe>
                                </div>
                                                                    <span class="thumb-info-title">
                                                                        
                                                                        <span class="thumb-info-type">{{ $a->nama_media }}</span>
                                                                    </span>
                                                                    <span class="thumb-info-action">
                                                                        <span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
                                                                    </span>
                                                                </span>
                                                            </span>

                                                    </div>

												</a>
											</div>

											<div class="post-content">

												<h5 class="font-weight-semibold text-3 line-height-2 mt-3 mb-2"><a class="popup-youtube " href="https://www.youtube.com/watch?v={{ $a->url }}">{{ $a->judul }}</a></h5>




											</div>
										</article>
									</div>
                            @endforeach

								</div>

								<div class="row">
									<div class="col">
										<ul class="pagination float-right">
                   						 {!! $data->links() !!}
               							 </ul>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>


			</div>
			@include('layout.footer')

	</body>
</html>
