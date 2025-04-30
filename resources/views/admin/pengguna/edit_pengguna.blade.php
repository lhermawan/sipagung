@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit User</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Edit User</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Edit User</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('admin/add/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data[0]->name }}" type="text" id="name" placeholder="Masukkan nama lengkap">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Profile</label>
                                            <div class="col-sm-10">
                                                        <input type="file" class="form-control"
                                                            placeholder="Name" id="first-name-icon" name="image"/>
                                                            <div class="d-flex mr-3 rounded-circle thumb-md">
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/'. $data[0]->avatar) }}">
                                                            </div>
                                                        <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

										<div class="form-group row">
											<label class="col-form-label col-lg-2">Email</label>
											<div class="col-lg-10">
												<div class="input-group">
													<input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $data[0]->email }}" name="email" placeholder="Masukkan alamat email aktif" aria-label="Recipient's username" aria-describedby="basic-addon2">
													<div class="input-group-append">
														<span class="input-group-text" id="basic-addon2">example@mail.com</span>
													</div>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
										</div>


                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Jenis Akun</label>
                                            <div class="col-sm-10">
                                            <select class="form-control @error('jenis_user') is-invalid @enderror" name="jenis_user" id="jenis_user" required="" value="{{ $data[0]->jenis_user}}">
                                            <option value="{{ $data[0]->jenis_user}}" label="Jenis Akun ( {{ $data[0]->jenis_user}} )">
                                                <?php
                                                if ($data[0]->jenis_user == "Super Admin") {
                                                    echo "
                                                                    <option value='Super Admin'>Super Admin</option>
                                                                    <option value='Admin'>Admin</option>
                                                                    <option value='Pertandingan'>Admin Pertandingan</option>
                                                                ";
                                                } else if ($data[0]->jenis_user == "Admin") {
                                                    echo "
                                                                    <option value='Super Admin'>Super Admin</option>
                                                                    <option value='Admin'>Admin</option>
                                                                    <option value='Pertandingan'>Admin Pertandingan</option>
                                                                ";
                                                } else if ($data[0]->jenis_user == "Admin Pertandingan") {
                                                    echo "
                                                                    <option value='Super Admin'>Super Admin</option>
                                                                    <option value='Admin'>Admin</option>
                                                                    <option value='Pertandingan'>Admin Pertandingan</option>
                                                                ";
                                                }


                                                ?>

                                            </option>
                                        </select>
                                        @error('jenis_user')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                      
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Status Akun</label>
                                            <div class="col-sm-10">
                                            <select class="form-control @error('role_name') is-invalid @enderror" name="status" id="status" required="" value="{{ $data[0]->status}}">
                                            <option value="{{ $data[0]->status}}" label="Status Pengguna ( {{ $data[0]->status}} )">
                                                <?php
                                                if ($data[0]->status == "Active") {
                                                    echo "
                                                                    <option value='Active'>Active</option>
                                                                    <option value='Disable'>Disable</option>
                                                                ";
                                                } else if ($data[0]->status == "Disable") {
                                                    echo "
                                                                    <option value='Active'>Active</option>
                                                                    <option value='Disable'>Disable</option>
                                                                ";
                                                }


                                                ?>

                                            </option>
                                        </select>


                                                
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                       
                                        
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                            <button  tton type="reset" class="btn btn-danger waves-effect waves-light"><a href="{{ route('admin/pengguna/data_pengguna') }}">Back</a></button>
                                            </div>
                                        </div>

										

										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    @include('layouts/footer')
