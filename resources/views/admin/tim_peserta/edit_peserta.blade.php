@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Tim Peserta</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Edit Tim Peserta</li>
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
									<h4 class="card-title mb-0">Edit Tim Peserta PORPROV</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('admin/tim_peserta/update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                   
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Asal Tim Peserta</label>
                                            <div class="col-sm-10">
                                            <input type="hidden" name="id_data_peserta" value="{{ $data[0]->id_data_peserta }}">
                                            <select id="asal_kabkota" name="asal_kabkota" class="form-control">
                                                <option value="Kabupaten Bandung" {{ $data[0]->asal_kabkota=="Kabupaten Bandung" ? "selected" : ''}}>Kabupaten Bandung</option>
                                                <option value="Kabupaten Bandung Barat" {{ $data[0]->asal_kabkota=="Kabupaten Bandung Barat" ? "selected" : ''}}>Kabupaten Bandung Barat</option>
                                                <option value="Kabupaten Bekasi" {{ $data[0]->asal_kabkota=="Kabupaten Bekasi" ? "selected" : ''}}>Kabupaten Bekasi</option>
                                                <option value="Kabupaten Bogor" {{ $data[0]->asal_kabkota=="Kabupaten Bogor" ? "selected" : ''}}>Kabupaten Bogor</option>
                                                <option value="Kabupaten Ciamis" {{ $data[0]->asal_kabkota=="Kabupaten Ciamis" ? "selected" : ''}}>Kabupaten Ciamis</option>
                                                <option value="Kabupaten Cianjur" {{ $data[0]->asal_kabkota=="Kabupaten Cianjur" ? "selected" : ''}}>Kabupaten Cianjur</option>
                                                <option value="Kabupaten Cirebon" {{ $data[0]->asal_kabkota=="Kabupaten Cirebon" ? "selected" : ''}}>Kabupaten Cirebon</option>
                                                <option value="Kabupaten Garut" {{ $data[0]->asal_kabkota=="Kabupaten Garut" ? "selected" : ''}}>Kabupaten Garut</option>
                                                <option value="Kabupaten Indramayu" {{ $data[0]->asal_kabkota=="Kabupaten Indramayu" ? "selected" : ''}}>Kabupaten Indramayu</option>
                                                <option value="Kabupaten Karawang" {{ $data[0]->asal_kabkota=="Kabupaten Karawang" ? "selected" : ''}}>Kabupaten Karawang</option>
                                                <option value="Kabupaten Kuningan" {{ $data[0]->asal_kabkota=="Kabupaten Kuningan" ? "selected" : ''}}>Kabupaten Kuningan</option>
                                                <option value="Kabupaten Majalengka" {{ $data[0]->asal_kabkota=="Kabupaten Majalengka" ? "selected" : ''}}>Kabupaten Majalengka</option>
                                                <option value="Kabupaten Pangandaran" {{ $data[0]->asal_kabkota=="Kabupaten Pangandaran" ? "selected" : ''}}>Kabupaten Pangandaran</option>
                                                <option value="Kabupaten Purwakarta" {{ $data[0]->asal_kabkota=="Kabupaten Purwakarta" ? "selected" : ''}}>Kabupaten Purwakarta</option>
                                                <option value="Kabupaten Subang" {{ $data[0]->asal_kabkota=="Kabupaten Subang" ? "selected" : ''}}>Kabupaten Subang</option>
                                                <option value="Kabupaten Sukabumi" {{ $data[0]->asal_kabkota=="Kabupaten Sukabumi" ? "selected" : ''}}>Kabupaten Sukabumi</option>
                                                <option value="Kabupaten Sumedang" {{ $data[0]->asal_kabkota=="Kabupaten Sumedang" ? "selected" : ''}}>Kabupaten Sumedang</option>
                                                <option value="Kabupaten Tasikmalaya" {{ $data[0]->asal_kabkota=="Kabupaten Tasikmalaya" ? "selected" : ''}}>Kabupaten Tasikmalaya</option>
                                                <option value="Kota Bandung" {{ $data[0]->asal_kabkota=="Kota Bandung" ? "selected" : ''}}>Kota Bandung</option> 
                                                <option value="Kota Banjar" {{ $data[0]->asal_kabkota=="Kota Banjar" ? "selected" : ''}}>Kota Banjar</option>
                                                <option value="Kota Bekasi" {{ $data[0]->asal_kabkota=="Kota Bekasi" ? "selected" : ''}}>Kota Bekasi</option>
                                                <option value="Kota Bogor" {{ $data[0]->asal_kabkota=="Kota Bogor" ? "selected" : ''}}>Kota Bogor</option> 
                                                <option value="Kota Cimahi" {{ $data[0]->asal_kabkota=="Kota Cimahi" ? "selected" : ''}}>Kota Cimahi</option>
                                                <option value="Kota Cirebon" {{ $data[0]->asal_kabkota=="Kota Cirebon" ? "selected" : ''}}>Kota Cirebon</option>
                                                <option value="Kota Depok" {{ $data[0]->asal_kabkota=="Kota Depok" ? "selected" : ''}}>Kota Depok</option>
                                                <option value="Kota Sukabumi" {{ $data[0]->asal_kabkota=="Kota Sukabumi" ? "selected" : ''}}>Kota Sukabumi</option>
                                                <option value="Kota Tasikmalaya" {{ $data[0]->asal_kabkota=="Kota Tasikmalaya" ? "selected" : ''}}>Kota Tasikmalaya</option>                                                   
                                            </select>
                                                @error('asal_kabkota')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Logo</label>
                                            <div class="col-sm-10">
                                                        <input type="file" class="form-control"
                                                            placeholder="Name" id="first-name-icon" name="logo"/>
                                                            <div class="d-flex mr-3 rounded-circle thumb-md">
                                                                <img class="" width="100" height="100" src="{{ URL::to('/images/tim_peserta/'. $data[0]->logo) }}">
                                                            </div>
                                                        <input type="hidden" name="hidden_image" value="{{ $data[0]->logo }}">
                                                @error('logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

										
                                        
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Update</button>
                                            <button class="btn btn-warning waves-effect waves-light"><a href="{{ route('admin/tim_peserta/peserta') }}">Batal</a></button>
                                            </div>
                                        </div>

										

										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    @include('layouts/footer')
