@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Tambah User</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a></li>
									<li class="breadcrumb-item active">Tambah User</li>
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
									<h4 class="card-title mb-0">Form Tambah User</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('admin/add/save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" id="name" placeholder="Masukkan nama lengkap" required>
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
                                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept="image/*" multiple="" required>
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
													<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan alamat email aktif" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
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
                                                <select class="form-control @error('jenis_user') is-invalid @enderror" name="jenis_user" id="jenis_user" required>
                                                    <option value="" selected disabled>--Jenis Akun--</option>
                                                    <option value="Super Admin">Super Admin</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Admin Pertandingan">Admin Pertandingan</option>
                                            		<option value="Admin Media">Admin Media</option>
                                                </select>
                                                @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                       
                                       
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Status Akun</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('role_name') is-invalid @enderror" name="status" id="status" required>
                                                    <option selected disabled>--Status Akun--</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Disable">Disable</option>
                                                </select>
                                                @error('role_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" type="password" id="password" placeholder="Masukkan password" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="Masukkan password yang sama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                                            </div>
                                        </div>

										

										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    <!-- content --> 
    @include('layouts/footer')
