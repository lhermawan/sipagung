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
									<span>IDM</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">{{ $pegawai["nama_skpd"] }}</b>
										<b>DESA</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">INDEKS DESA MEMBANGUN {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{ URL::to('/icon/silverBGPendidikan.png') }}">

    <div role="main" class="main">


        <div class="container py-2">
            <div class="row">
                <div class="col">
                <form action="/idm/{{$year}}"  method="GET">
                                <div class="input-group">

                                    <select class="form-select w-150" name="ptahun" id="ptahun">
                                        <option value="">Pilih Tahun</option>
                                        @foreach($tahun as $thn)
                                            <option value="{{ $thn }}" {{ $year == $thn ? 'selected="selected"' : '' }}>{{ $thn }}</option>
                                        @endforeach

                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary"> Cari!</button> </div>
                            </form>
                </div>
            </div>

            <div class="row">

        <div class="featured-boxes featured-boxes-flat">
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-primary featured-box-effect-2">
									<div class="box-content box-content-border-bottom">
										<i class="icon-featured fa fa-book"></i>
										<h4 class="font-weight-normal text-6 mt-3">SKOR <strong class="font-weight-extra-bold">IDM SAAT INI</strong></h4>
										<p class="mb-2 mt-2 text-4"><b>{{ number_format($summaries->SKOR_SAAT_INI, 4) }}</b></p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-secondary featured-box-effect-2">
									<div class="box-content box-content-border-bottom">
										<i class="icon-featured fa fa-book-open"></i>
										<h4 class="font-weight-normal text-6 mt-3">STATUS <strong class="font-weight-extra-bold">IDM</strong></h4>
										<p class="mb-2 mt-2 text-4">{{ $summaries->STATUS }}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-tertiary featured-box-effect-2">
									<div class="box-content box-content-border-bottom">
										<i class="icon-featured far fa-star"></i>
										<h4 class="font-weight-normal text-6 mt-3"><strong class="font-weight-extra-bold">TARGET</strong> STATUS</h4>
										<p class="mb-2 mt-2 text-4">{{ $summaries->TARGET_STATUS }}</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-quaternary featured-box-effect-2">
									<div class="box-content box-content-border-bottom">
										<i class="icon-featured far fa-edit"></i>
										<h4 class="font-weight-normal text-6 mt-3">SKOR <strong class="font-weight-extra-bold">IDM MINIMAL</strong></h4>
										<p class="mb-2 mt-2 text-4">{{ number_format($summaries->SKOR_MINIMAL, 4)}}</p>
									</div>
								</div>
							</div>
						</div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>


        <div class="container py-2">
                    <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="col-12 table-responsive">

                            <table class="table table-bordered">
                                <tbody>
                                @foreach ($identitas as $data)
                                    <tr> <th>Provinsi</th>  <td>{{ $data->nama_provinsi }}</td> </tr>
                                    <tr> <th>Kabupaten</th> <td>{{ $data->nama_kab_kota}}</td> </tr>
                                    <tr> <th>Kecamatan</th> <td>{{ $data->nama_kecamatan}}</td> </tr>
                                    <tr> <th>Desa</th>      <td>{{ $data->nama_desa}}</td> </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="col-md-12 col-lg-8">
                        <div id="container"></div>
                    </div>
                </div>

        </div>

        <div class="container py-5">
                        <div class="container pt-100 pb-120">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="table_list" class="table table-striped table-hover table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <td >No</td>
                                                    <td >INDIKATOR IDM</td>
                                                    <td >SKOR</td>
                                                    <td >KETERANGAN</td>
                                                    <td >KEGIATAN YANG DAPAT DILAKUKAN</td>
                                                    <td >+NILAI</td>
                                                    <td colspan="6">YANG DAPAT MELAKSANAKAN KEGIATAN  </td>

                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>PUSAT</td>
                                                    <td>PROVINSI</td>
                                                    <td>KABUPATEN</td>
                                                    <td>DESA</td>
                                                    <td>CSR</td>
                                                    <td>LAINNYA</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @foreach ($row as $data)


                                                <tr>
                                                    <td>{{ $data->NO }}</td>
                                                    <td>{{ $data->INDIKATOR }}</td>
                                                    <td>{{ $data->SKOR }}</td>
                                                    <td>{{ $data->KETERANGAN }}</td>
                                                    <td>{{ $data->KEGIATAN }}</td>
                                                    <td>{{ $data->NILAI }}</td>
                                                    <td>{{ $data->PUSAT }}</td>
                                                    <td>{{ $data->PROV }}</td>
                                                    <td>{{ $data->KAB }}</td>
                                                    <td>{{ $data->DESA }}</td>
                                                    <td>{{ $data->CSR }}</td>
                                                    <td>{{ $data->LAINNYA }}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

				</div>
                </div>


</section>
@include('layout.footer')
@include('layout.idmjs')
</body>
</html>
