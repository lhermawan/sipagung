@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Pertandingan Pentaque</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Pertandingan Pentaque</li>
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
									<h4 class="card-title mb-0">Edit Pertandingan Pentaque</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('updatePertandinganPentaqueSingle') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <input class="form-control @error('id_pertandingan_pentaque') is-invalid @enderror" name="id_pertandingan_pentaque" value="{{$data[0]->id_pertandingan_pentaque}}" type="hidden" id="id_pertandingan_pentaque" placeholder="Masukkan Nama Series" required>
                                        <input class="form-control @error('id_jenis_cabor2') is-invalid @enderror" name="id_jenis_cabor2" value="{{$data[0]->id_jenis_cabor2}}" type="hidden" id="id_jenis_cabor2" required>

                                        <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Nama Series</label>
                                                <input class="form-control @error('nama_series') is-invalid @enderror" name="nama_series" value="{{$data[0]->nama_series}}" type="text" id="nama_series" placeholder="Masukkan Nama Series" required>
                                                @error('keterangan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Keterangan</label>
                                                <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{$data[0]->keterangan}}" required>{{$data[0]->keterangan}}</textarea>
                                                @error('keterangan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        </div>
                                        

                                        <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Tanggal Pertandingan</label>
                                               <input class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$data[0]->tanggal}}" type="date" id="tanggal" placeholder="Masukkan Tanggal Pertandingan" required>
                                                @error('tanggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Waktu Pertandingan</label>
                                            <input class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{$data[0]->waktu}}" type="time" id="waktu" placeholder="Masukkan Waktu Pertandingan" required>
                                                @error('waktu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Link Streaming</label>
                                                <textarea class="form-control @error('link_streaming') is-invalid @enderror" name="link_streaming" value="{{$data[0]->link_streaming}}" required>{{$data[0]->link_streaming}}</textarea>
                                                @error('link_streaming')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div class="form-group col-md-6">
                                            <label for="inputPassword4">Thumbnail</label>
                                            <input type="file" class="form-control"
                                                            placeholder="Name" id="first-name-icon" name="image"/>
                                                            <div class="d-flex mr-3 rounded-circle thumb-md">
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/pentaque/'. $data[0]->avatar) }}">
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
                                            <div class="form-group col-md-6">
                                            </div>
                                            <div class="form-group col-md-6">
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
