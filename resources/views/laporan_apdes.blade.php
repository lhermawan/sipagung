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
										<b>LAPORAN ANGGARAN PENDAPATAN DESA</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">LAPORAN ANGGARAN PENDAPATAN DESA {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section appear-animation set-bg"  data-setbg="{{ URL::to('/icon/silverBG.jpg') }}"  data-appear-animation="fadeIn" >

<div class="container-fluid">
<div class="col-md-12 align-self-center p-static order-2 text-center">

<h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                        <span>DATA</span>
                        <span class="word-rotator-words bg-warning">
                            <b class="is-visible">{{ $pegawai["nama_skpd"] }}</b>
                            <b>APDES TAHUN {{ date('Y') }}</b>
                        </span>
                    </h2>
</div>
<br>
					<div class="row featured-boxes-full featured-boxes-full-scale">
                    @foreach ($data["datadesa"]["data"] as $dt)
						<div class="col-lg-3 featured-box-full featured-box-full-primary">
							<i class="far fa-money-bill-alt"></i>
							<h4 class="font-weight-normal text-5"><strong class="font-weight-extra-bold"> Rp. {{ number_format($dt['Anggaran'],0,".",".")  }}</strong></h4>
							<p class="mb-0">{{ $dt['Nama_Obyek']  }}</p>
						</div>
                    @endforeach
				</div>
</section>



@include('layout.footer')

</body>
</html>

