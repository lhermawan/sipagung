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
									<span>MAP</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">DESA</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">MAP DESA {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section appear-animation set-bg"  data-setbg="{{ URL::to('/icon/silverBG.jpg') }}"  data-appear-animation="fadeIn" >
<div role="main" class="main">

<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
<!-- <div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div> -->

<div id="map" class="google-map mt-0" style="height: 500px;"></div>


</div>
@include('layouts.mapjs')
@include('layout.footer')

</body>
</html>
