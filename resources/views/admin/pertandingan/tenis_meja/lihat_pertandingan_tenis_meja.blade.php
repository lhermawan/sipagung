@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
@include('layouts.image')

<div class="page-wrapper">

					
@include('sweet::alert')

{{-- message --}}
    {!! Toastr::message() !!}

    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
							<h3 class="page-title">Data Pertandingan {{ $data[0]->jenis_olahraga }} PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a>Pertandingan</li>
									<li class="breadcrumb-item active">{{ $data[0]->jenis_olahraga }}</li>
								</ul>
							</div>
							
						</div>
					</div>

                    <div class="card">
						<div class="card-body">
							<!-- <h4 class="card-title">Solid justified</h4> -->
							<ul class="nav nav-tabs nav-tabs-solid nav-justified">
								<li class="nav-item"><a class="nav-link active" href="#single_putra" data-toggle="tab">Single Putra</a></li>
								<li class="nav-item"><a class="nav-link" href="#single_putri" data-toggle="tab">Single Putri</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#berlangsung" data-toggle="tab">Pertandingan Sedang Berlangsung</a></li> -->
								<li class="nav-item"><a class="nav-link" href="#ganda_campuran" data-toggle="tab">Ganda Campuran</a></li>
								<li class="nav-item"><a class="nav-link" href="#ganda_putra" data-toggle="tab">Ganda Putra</a></li>
								<li class="nav-item"><a class="nav-link" href="#ganda_putri" data-toggle="tab">Ganda Putri</a></li>
								<li class="nav-item"><a class="nav-link" href="#beregu_putra" data-toggle="tab">Beregu Putra</a></li>
								<li class="nav-item"><a class="nav-link" href="#beregu_putri" data-toggle="tab">Beregu Putri</a></li>
								<!-- <li class="nav-item"><a class="nav-link" href="applied-jobs.html">Applied</a></li>
								<li class="nav-item"><a class="nav-link" href="interviewing.html">Interviewing</a></li>
								<li class="nav-item"><a class="nav-link" href="offered-jobs.html">Offered</a></li>
								<li class="nav-item"><a class="nav-link" href="visited-jobs.html">Visitied </a></li>
								<li class="nav-item"><a class="nav-link" href="archived-jobs.html">Archived </a></li> -->
							</ul>
						</div>
					</div>
                    
                    <div class="tab-content">
                    <div id="single_putra" class="tab-pane active">
                    <br>

                    <!-- /Page Header -->
					
					<!-- Content Starts -->
					<!-- Search Filter -->
					
							<div class="row">
								<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
													<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data1 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_tenis_single/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
			
				</div>



                <div id="single_putri" class="tab-pane">
                    <br>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data2 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_tenis_single_putri/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>


				<div id="ganda_campuran" class="tab-pane">
                    <br>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data3 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_tenis_meja_ganda_campuran/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>


				<div id="ganda_putra" class="tab-pane">
                    <br>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data4 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_tenis_ganda_putra/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>

				<div id="ganda_putri" class="tab-pane">
                    <br>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data5 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_tenis_ganda_putri/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>
				<!-- /Page Content -->

				<div id="beregu_putra" class="tab-pane">
                    <br>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data6 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_beregu_putra/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
            </div>

			<div id="beregu_putri" class="tab-pane">
                    <br>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
										<th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
													<th>Kategori</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data7 as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
											<td>{{ $item->kategori->kategori }}</td>
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/detail_pertandingan_beregu_putri/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
    </div>
</div>


   

    @include('layouts/footer')

