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
										<b>REGULASI</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">DATA REGULASI {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{ URL::to('/icon/silverBGPendidikan.png') }}">
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
                                                    <th class="left" style="vertical-align:middle" width="10%">JUDUL</th>
                                                    <th class="left" style="vertical-align:middle" width="10%">JENIS</th>
                                                    <th class="text-center" style="vertical-align:middle" width="10%">FILE</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            @php $no = 1; @endphp
						                    @foreach ($regulasi as $key => $item)


                                                <tr>

                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">

                                                    </a>&nbsp;&nbsp;{{ $item->judul}}</td>

                                                    <td class="left">
                                                    </a>&nbsp;&nbsp;{{ $item->jenis}}</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        <a href="/{{ $item->file}}" target='blank_'><img class="img-fluid" src="{{ URL::to('asset/img/pdf.png') }}" class="img-fluid rounded" width="30" height="30" alt="Project Image">
                                                        &nbsp;&nbsp;Download File</a>
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{ $regulasi->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

				</div>

</section>

</section>
@include('layout.footer')

</body>
</html>

