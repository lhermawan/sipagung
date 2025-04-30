@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
@include('layouts.image')
<div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Data Pertandingan PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Pertandingan PORPROV XIV</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					
					
						<!-- Search Filter -->
					
<!-- 
		<div class="row filter-row">

					
						
<div class="col-sm-6 col-md-2">  
<form class="form" method="get" action="">

		<div class="form-group form-focus">
	
			<input type="number"  class="form-control floating" id="telp" name="telp" placeholder="Masukkan No Telp">
			<label class="focus-label">Nomer Telepon/Hp</label>
		</div>
	</div>

	<div class="col-sm-6 col-md-2">  
		<div class="form-group form-focus">
		
			<select name="status_akun" class="form-control floating" id="status_akun">
					<option value="">--Pilih Status Akun--</option>
					<option value="Active">Active</option>
                    <option value="Disable">Disable</option>
					</select>

			<label class="focus-label">Status Akun</label>
		</div>
	</div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  

	<div class="col-sm-6 col-md-2">  
		<a href="user/management" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
	</div>   

</div>

<br> -->

<!-- /Search Filter -->
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


                                            
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Cabang Olahraga</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->jenis_olahraga }}</td>
                                        
                                            @if($item->id_jenis_cabor == "1")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

                                            @if($item->id_jenis_cabor == "2")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/bmx/lihat_pertandingan_bmx/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "3")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/muaythai/lihat_pertandingan_muaythai/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "4")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/atletik/lihat_pertandingan_atletik/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "5")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/soft_tenis/lihat_pertandingan_soft_tenis/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "6")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/lihat_pertandingan_tenis_meja/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "7")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/pentaque/lihat_pertandingan_pentaque/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "8")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/wushu/lihat_pertandingan_wushu/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											


										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>

    @include('layouts/footer')
