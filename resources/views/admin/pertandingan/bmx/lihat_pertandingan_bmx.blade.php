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
								<li class="nav-item"><a class="nav-link active" href="#putra" data-toggle="tab">Putra</a></li>
								<li class="nav-item"><a class="nav-link" href="#putri" data-toggle="tab">Putri</a></li>
							</ul>
						</div>
					</div>
                    
                    <div class="tab-content">
                    <div id="putra" class="tab-pane active">
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
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/bmx/detail_pertandingan_bmx/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
			
				</div>

  

                <div id="putri" class="tab-pane">
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
                                        
                                            
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/bmx/detail_pertandingan_bmx/'.$item->id_jenis_cabor2) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            

                                           
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
				
            </div>
    </div>
</div>


   

    @include('layouts/footer')