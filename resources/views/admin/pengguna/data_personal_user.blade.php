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
								<h3 class="page-title">Data Personal</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Data Personal</li>
								</ul>
							</div>
							
						</div>
					</div>
					<!-- /Page Header -->
					
					

					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                <th>NO</th>
												<th>Email & Nama Akun</th>
                                                <th>Foto & NIK</th>
												<th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                               
                                           
											<th class="text-right">Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
										<td>{{ $item->users->email }} ( {{ $item->users->name }} )</td>
											<td>
												<h2 class="table-avatar">
													<a href=""><img src="{{ URL::to('/images/'. $item->image) }}" class="avatar" alt=""></a>
													<a href="">{{ $item->nik }}</a>
												</h2>
											</td>
											<td>{{ $item->nama }}</td>
											<td>{{ $item->jenis_kelamin}}</td>
											
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ url('user/data_personal_user/view/'.$item->id) }}"><i class="fa fa-file m-r-5"></i> Detail</a>
														<a class="dropdown-item" href="{{ url('user/data_personal_user/delete/'.$item->id) }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
 
    @include('layouts/footer')
