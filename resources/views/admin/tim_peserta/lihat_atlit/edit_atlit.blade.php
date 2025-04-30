@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Atlet</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Edit Atlet</li>
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
									<h4 class="card-title mb-0">Edit Atlet</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('admin/tim_peserta/lihat_atlit/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Atlit</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('id_atlit') is-invalid @enderror" readonly name="id_atlit" value="{{$data[0]->id_atlit}}" type="hidden" id="id_atlit" required>
                                                <input class="form-control @error('id_data_peserta') is-invalid @enderror" readonly name="id_data_peserta" value="{{$data[0]->id_data_peserta}}" type="hidden" id="id_data_peserta" required>
                                                <input class="form-control @error('nama_atlit') is-invalid @enderror" name="nama_atlit" value="{{$data[0]->nama_atlit}}" type="text" id="nama_atlit" placeholder="Masukkan nama lengkap" required>
                                                @error('nama_atlit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$data[0]->tanggal_lahir}}" type="date" id="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required>
                                                @error('tanggal_lahir')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                   
										
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" name="jenis_kelamin" value="{{ $data[0]->jenis_kelamin }}">
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                                <option value="Pria" {{ $data[0]->jenis_kelamin=="Pria" ? "selected" : ''}}>Pria</option>
                                                <option value="Wanita" {{ $data[0]->jenis_kelamin=="Wanita" ? "selected" : ''}}>Wanita</option>                                                
                                            </select>
                                                @error('jenis_kelamin')
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
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/atlit/'. $data[0]->avatar) }}">
                                                            </div>
                                                        <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
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
