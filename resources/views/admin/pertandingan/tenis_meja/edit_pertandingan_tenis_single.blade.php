@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Pertandingan Tenis Meja</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Pertandingan Tenis Meja</li>
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
									<h4 class="card-title mb-0">Edit Pertandingan Tenis Meja</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('updatePertandinganTenisMejaSingle') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Peserta 1</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('id_pertandingan_tenis_meja') is-invalid @enderror" readonly name="id_pertandingan_tenis_meja" value="{{$data[0]->id_pertandingan_tenis_meja}}" type="hidden" id="id_pertandingan_tenis_meja" required>
                                                <input class="form-control @error('id_jenis_cabor2') is-invalid @enderror" readonly name="id_jenis_cabor2" value="{{$data[0]->id_jenis_cabor2}}" type="hidden" id="id_jenis_cabor2" required>
                                                <select name="id_atlit1_tenis_meja" class="form-control" id="id_atlit1_tenis_meja">
                                                    <option value="{{ $data[0]->id_atlit1_tenis_meja}}" selected>--Pilihan Sebelumnya ( {{ $data[0]->atlit1->nama_atlit}} / {{ $data[0]->atlit1->data_peserta->asal_kabkota}})--</option>

                                                    @foreach ($data3 as $peser => $item)
                                                        @if($item->jenis_kelamin == "Pria")
                                                            <option id="id_atlit1_tenis_meja" value="{{$item->id_atlit}}">{{$item->nama_atlit}} ( {{ $item->asal_kabkota}} )</option>
                                                        @endif
                                                    @endforeach 
                                                    </select>
                                                
                                                @error('id_atlit1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Peserta 2</label>
                                            <div class="col-sm-10">
                                                <select name="id_atlit2_tenis_meja" class="form-control" id="id_atlit2_tenis_meja">
                                                    <option value="{{ $data[0]->id_atlit2_tenis_meja}}" selected>--Pilihan Sebelumnya ( {{ $data[0]->atlit2->nama_atlit}} / {{ $data[0]->atlit2->data_peserta->asal_kabkota}})--</option>

                                                    @foreach ($data3 as $peser => $item)
                                                        @if($item->jenis_kelamin == "Pria")
                                                            <option id="id_atlit2_tenis_meja" value="{{$item->id_atlit}}">{{$item->nama_atlit}} ( {{ $item->asal_kabkota}} )</option>
                                                        @endif
                                                    @endforeach 
                                                    </select>
                                                
                                                @error('id_atlit2')
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
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/tenis_meja/'. $data[0]->avatar) }}">
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
