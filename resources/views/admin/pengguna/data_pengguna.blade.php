@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')

<div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Data Pengguna PORPROV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Pengguna PORPROV</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="{{ route('admin/pengguna/pengguna_baru') }}" class="btn add-btn"><i class="fa fa-plus"></i> Tambah User Baru</a>
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

					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                        <th>NO</th>
                                                    <th>Foto Profile</th>
                                                    <th>Email</th>
													<th>Jenis Akun</th>
                                                    <th>Status Akun</th>
                                           
											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($user as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
											<td>
												<h2 class="table-avatar">
													<a href="" class="avatar"><img src="{{ URL::to('/images/'. $item->avatar) }}" alt="{{ $item->avatar }}" alt=""></a>
													<a href="">{{ $item->name }}</a>
												</h2>
											</td>
											<td>{{ $item->email }}</td>
											<td>
                                            @if($item->jenis_user =='Super Admin')
                                            <span class="badge bg-danger" style="font-size: 12px;">{{ $item->jenis_user }}</span>
                                            @endif

											@if($item->jenis_user =='Admin')
                                            <span class="badge bg-warning" style="font-size: 12px;">{{ $item->jenis_user }}</span>
                                            @endif

											
											@if($item->jenis_user =='Admin Pertandingan')
                                            <span class="badge bg-info" style="font-size: 12px;">{{ $item->jenis_user }}</span>
                                            @endif
                    
                   							 @if($item->jenis_user =='Admin Media')
                                            <span class="badge bg-secondary text-white" style="font-size: 12px;">{{ $item->jenis_user }}</span>
                                            @endif
                                            </td>

											<td>
                                            @if($item->status =='Active')
                                            <span class="badge bg-success" style="font-size: 12px;">{{ $item->status }}</span>
                                            @endif

											@if($item->status =='Disable')
                                            <span class="badge bg-danger" style="font-size: 12px;">{{ $item->status }}</span>
                                            @endif
                                            </td>
                                            
                        
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="{{ url('admin/pengguna/edit_pengguna/'.$item->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="{{ url('admin/add/delete_user/'.$item->id) }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
    <!-- content --> 
    @include('layouts/footer')