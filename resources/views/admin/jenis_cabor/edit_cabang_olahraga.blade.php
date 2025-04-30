@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Cabang Olahraga</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Edit Cabang Olaharaga</li>
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
									<h4 class="card-title mb-0">Edit Cabang Olahraga</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('admin/jenis_cabor/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Olahraga</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" name="id_jenis_cabor" value="{{ $data[0]->id_jenis_cabor }}">
                                                <input class="form-control @error('name') is-invalid @enderror" name="jenis_olahraga" value="{{ $data[0]->jenis_olahraga }}" type="text" id="jenis_olahraga" placeholder="Jenis Olahraga" required>
                                                @error('jenis_olahraga')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
											<label class="col-form-label col-lg-2">Nama Tempat</label>
											<div class="col-lg-10">
												<div class="input-group">
													<input type="text" class="form-control @error('nama_tempat') is-invalid @enderror" value="{{ $data[0]->nama_tempat }}" name="nama_tempat" placeholder="Nama Tempat" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
													
                                                    @error('nama_tempat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
										</div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Venue</label>
                                            <div class="col-sm-10">
                                                        <input type="file" class="form-control"
                                                            placeholder="Name" id="first-name-icon" name="venue"/>
                                                            <div class="d-flex mr-3 rounded-circle thumb-md">
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/venue/'. $data[0]->venue) }}">
                                                            </div>
                                                        <input type="hidden" name="hidden_image" value="{{ $data[0]->venue }}">
                                                @error('venue')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

										<div class="form-group row">
											<label class="col-form-label col-lg-2">Kapasitas Penonton</label>
											<div class="col-lg-10">
												<div class="input-group">
													<input type="text" class="form-control @error('kapasitas') is-invalid @enderror" value="{{ $data[0]->kapasitas }}" name="kapasitas" placeholder="Jumlah Kapasitas Penonton" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
													
                                                    @error('kapasitas')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label col-lg-2">Alamat Venue</label>
											<div class="col-lg-10">
												<div class="input-group">
                                                    <textarea  class="form-control @error('alamat') is-invalid @enderror" value="{{ $data[0]->alamat }}" name="alamat" required>{{ $data[0]->alamat }}</textarea>
                                                    @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label col-lg-2">Kordinat (PETA MAPS)</label>
											<div class="col-lg-10">
												<div class="input-group">
                                                    <textarea  class="form-control @error('kordinat') is-invalid @enderror" value="{{ $data[0]->kordinat }}" name="kordinat" required>{{ $data[0]->kordinat }}</textarea>
                                                    @error('kordinat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
												</div>
											</div>
										</div>

                                        <div class="form-group row">
											<label class="col-form-label col-lg-2">Keterangan Venue</label>
											<div class="col-lg-10">
												<div class="input-group">
                                                    <textarea  class="form-control @error('keterangan') is-invalid @enderror" value="{{ $data[0]->keterangan }}" name="keterangan" required>{{ $data[0]->keterangan }}</textarea>
                                                    @error('keterangan')
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
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Update</button>
                                            <button class="btn btn-warning waves-effect waves-light"><a href="{{ route('admin/jenis_cabor/cabang_olahraga') }}">Batal</a></button>
                                            </div>
                                        </div>

										

										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    @include('layouts/footer')
