@include('layout.head')

	<body class="alternative-font-4 " data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
		{{-- <div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div> --}}

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
											<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Technical Handbook</h2>
										</div>
									</div>
									<div class="col-md-12 align-self-center order-1">
										<ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
											<li><a href="{{ URL::to('/') }}">Home</a></li>

											<li class="active">Handbook</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>

				<div class="container py-5">

                    <section class="latest-games-area home-four-shop-area home-four-latest-games">
                        <div class="container pt-100 pb-120">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="table_list" class="table table-striped table-hover table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="40%">Cabang Olahraga</th>
                                                    <th class="text-center" style="vertical-align:middle" width="10%">File</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>

                                                    <td class="text-center">1</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB ATLETIK</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="{{ URL::to('file/thb/THBATLETIK.pdf') }}" target='blank_'><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">2</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB BMX</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="#"><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">3</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB MUAYTHAI</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="#"><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">4</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB PETANQUE</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="#"><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">5</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB SEPAKBOLA</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="#"><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">6</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB TENIS MEJA</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="#"><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">7</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB SOFT TENIS</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="{{ URL::to('file/thb/THBSoftTenis.pdf') }}" target='blank_'><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td class="text-center">8</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;THB WUSHU</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="#"><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

				</div>




			</div>
			@include('layout.footer')

	</body>

</html>
