@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Pertandingan Atletik</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Pertandingan Atletik</li>
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
									<h4 class="card-title mb-0">Edit Pertandingan Atletik</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('updatePertandinganAtletik') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
   
                               
                                        <input class="form-control @error('id_series_atletik') is-invalid @enderror" readonly name="id_series_atletik" value="{{$data[0]->id_series_atletik}}" type="hidden" id="id_series_atletik" required>
                                        <input class="form-control @error('id_jenis_cabor2') is-invalid @enderror" readonly name="id_jenis_cabor2" value="{{$data[0]->id_jenis_cabor2}}" type="hidden" id="id_jenis_cabor2" required>
                        
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Pertandingan Atletik</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('nama_series_atletik') is-invalid @enderror" name="nama_series_atletik" value="{{$data[0]->nama_series_atletik}}" type="text" id="nama_series_atletik" placeholder="" required>
                                                @error('nama_series_atletik')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Pertandingan</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$data[0]->tanggal}}" type="date" id="tanggal" placeholder="Masukkan Tanggal Pertandingan" required>
                                                @error('tanggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Waktu Pertandingan</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{$data[0]->waktu}}" type="time" id="waktu" placeholder="Masukkan Waktu Pertandingan" required>
                                                @error('waktu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Link Streaming</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control @error('link_streaming') is-invalid @enderror" name="link_streaming" value="{{$data[0]->link_streaming}}" required>{{$data[0]->link_streaming}}</textarea>
                                                @error('link_streaming')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                   
									
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Thumbnail</label>
                                            <div class="col-sm-10">
                                                        <input type="file" class="form-control"
                                                            placeholder="Name" id="first-name-icon" name="image"/>
                                                            <div class="d-flex mr-3 rounded-circle thumb-md">
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/atletik/'. $data[0]->avatar) }}">
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
                                            <button  tton type="reset" class="btn btn-danger waves-effect waves-light"><a href="{{ route('admin/pertandingan/data_pertandingan') }}">Back</a></button>
                                            </div>
                                        </div>

										

										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    @include('layouts/footer')
