@include('layout.head')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<style>
     .rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .star-rating-complete{
            color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
         .rated {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rated:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rated:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ffc700;
         }
         .rated:not(:checked) > label:before {
         content: '★ ';
         }
         .rated > input:checked ~ label {
         color: #ffc700;
         }
         .rated:not(:checked) > label:hover,
         .rated:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rated > input:checked + label:hover,
         .rated > input:checked + label:hover ~ label,
         .rated > input:checked ~ label:hover,
         .rated > input:checked ~ label:hover ~ label,
         .rated > label:hover ~ input:checked ~ label {
         color: #c59b08;
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
										<b class="is-visible">Testimoni & Review Kampung Nila</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">Testimoni & Review Kampung Nila {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container py-2">

					<div class="row">
						<div class="col-lg-3 order-2 order-lg-1">
								<img src="{{URL::to('images/people.png') }}"/>
						</div>
						<div class="col-lg-9 order-1 order-lg-2">

							<div class="overflow-hidden mb-1">
								<h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Berikan Testimoni & Review</strong></h2>
							</div>
							<div class="overflow-hidden mb-4 pb-3">
								<p class="mb-0">Testimoni & Review untuk fasilitas dan pengelolaan SFV Kampung Nila Desa Kawali </p>
							</div>
							{{-- message --}}
                    		{!! Toastr::message() !!}
							<div class="accordion accordion-modern" id="accordion">
								<div class="card card-default">
									<div class="card-header">
										<h4 class="card-title m-0">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Testimoni & Review
											</a>
										</h4>
									</div>
									<div id="collapseOne" class="collapse show">
										<div class="card-body">
											<form action="{{ route('saveTestimoni') }}" method="POST" enctype="multipart/form-data">
											@csrf
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Nama Anda</label>
														<input type="text" name="nama" placeholder="Nama Anda" class="form-control" required>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Email</label>
														<input type="email" name="email" placeholder="email Anda" class="form-control" required>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Bagaimana tanggapan anda mengenai SFV Kampung Nila Desa Kawali ini? </label>
														<textarea name="komentar" name="komentar" class="form-control" required></textarea>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<input type="hidden" value="Deactive" name="status" class="form-control" required>
													</div>
												</div>
												<div class="form-row">
													<div class="form-group col">
														<label class="font-weight-bold text-dark text-2">Foto</label>
														<input type="file" name="avatar" id="avatar" accept="image/*" multiple="" required>
													</div>
												</div>


												<div class="form-row">
													<div class="form-group col">
													<label class="font-weight-bold text-dark text-2">Berikan Bintang Anda </label>
														<div class="rate">
															<input type="radio" id="star5" class="rate" name="rating" value="5"/>
															<label for="star5" title="text">5 stars</label>
															<input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
															<label for="star4" title="text">4 stars</label>
															<input type="radio" id="star3" class="rate" name="rating" value="3"/>
															<label for="star3" title="text">3 stars</label>
															<input type="radio" id="star2" class="rate" name="rating" value="2">
															<label for="star2" title="text">2 stars</label>
															<input type="radio" id="star1" class="rate" name="rating" value="1"/>
															<label for="star1" title="text">1 star</label>
														</div>
													</div>
												</div>

												<div class="form-row">
													<div class="form-group col">
														<input type="submit" value="Submit" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>



				</div>

				<br>
				<br>
				<br>

@include('layout.footer')

</body>
</html>
