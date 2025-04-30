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

				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">

							<div class="col">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<div class="overflow-hidden pb-2">
											<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Galeri PORPROV XIV 2022</h2>
										</div>
									</div>
									<div class="col-md-12 align-self-center order-1">
										<ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
											<li><a href="{{ URL::to('/') }}">Home</a></li>

											<li class="active">Galeri</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>
                <div class="container py-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">
                    <div class="container py-4">

                    <div class="row">
                        <div class="col">
                            <div class="blog-posts">

                                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-e1cec049-d57b-40f3-8215-c53902af3d9a"></div>



                            </div>
                        </div>

                    </div>


                </div>


			</div>
			@include('layout.footer')

	</body>
</html>
