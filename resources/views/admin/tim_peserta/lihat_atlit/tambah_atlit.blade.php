@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Tambah Atlet </h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a></li>
									<li class="breadcrumb-item active">Atlet</li>
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
									<h4 class="card-title mb-0">Form Tambah Atlet</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('saveAtlit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Atlit</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('id_data_peserta') is-invalid @enderror" readonly name="id_data_peserta" value="{{$data[0]->id_data_peserta}}" type="hidden" id="id_data_peserta" required>
                                                <input class="form-control @error('nama_atlit') is-invalid @enderror" name="nama_atlit" value="{{ old('nama_atlit') }}" type="text" id="nama_atlit" placeholder="Masukkan nama lengkap" required>
                                                @error('nama_atlit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        

                                   
										
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('role_name') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" required>
                                                    <option selected disabled>--Jenis Kelamin--</option>
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                                @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Atlet</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar" id="avatar" accept="image/*" multiple="" required>
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
