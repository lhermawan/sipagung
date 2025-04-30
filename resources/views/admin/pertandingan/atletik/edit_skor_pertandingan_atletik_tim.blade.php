@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 

<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Skor Pertandingan Atletik</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html"></a>Dashboard</li>
									<li class="breadcrumb-item active">Edit Skor Pertandingan Atletik</li>
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
									<h4 class="card-title mb-0">Edit Skor Pertandingan Atletik</h4>
								</div>
								<div class="card-body">
                                <form class="form form-horizontal" action="{{ route('updateSkorPertandinganAtletikTim') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Status Pertandingan</label>
                                     
                                                <input class="form-control @error('id_series_atletik') is-invalid @enderror" readonly name="id_series_atletik" value="{{$data3[0]->id_series_atletik}}" type="hidden" id="id_pertandingan_atletik" required>
                                                <select name="status_pertandingan" class="form-control" id="select-item">
                                                    <option id="status_pertandingan"  value="">--Pilih Status Pertandingan--</option>
                                                        <option  value="Belum Dimulai">Belum Dimulai</option>
                                                        <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                                                        <option  value="Selesai">Selesai</option>
                                                    </select>
                                                    
                                                
                                                @error('status_pertandingan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                        </div>

                                    <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div id="no1" class="form-group col-md-6" style="display:none">
                                                <label for="inputEmail4">Pemenang Ke 1</label>
                                                    <select name="id_data_peserta_menang1" class="form-control" id="id_data_peserta_menang1">
                                                    <option value="">--Pilih Pemenang--</option>

                                                @foreach ($data3 as $peser => $item)
                                                            <option id="id_data_peserta_menang1" value="{{$item->id_data_peserta }}">{{ $item->asal_kabkota}}</option>
                                                    @endforeach 
                                                    </select>
                                                    
                                                
                                                @error('id_peserta_menang_atletik1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div id="no2" class="form-group col-md-6" style="display:none">
                                            <label for="inputPassword4">Skor Peserta Pemenang 1</label>
                                                    <input type="text" class="form-control" id="skor_pemenang1" name="skor_pemenang1" >
                                                @error('skor_pemenang1')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div id="no3" class="form-group col-md-6" style="display:none">
                                                <label for="inputEmail4">Pemenang Ke 2</label>
                                     
                                                    <select name="id_data_peserta_menang2" class="form-control" id="id_data_peserta_menang2">
                                                    <option value="">--Pilih Pemenang--</option>

                                                @foreach ($data3 as $peser => $item)
                                                            <option id="id_atlit" value="{{$item->id_data_peserta }}">{{ $item->asal_kabkota}}</option>
                                                    @endforeach 
                                                    </select>
                                                    
                                                
                                                @error('id_peserta_menang_atletik2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div id="no4" class="form-group col-md-6" style="display:none">
                                            <label for="inputPassword4">Skor Peserta Pemenang 2</label>
                                                    <input type="text" class="form-control" id="skor_pemenang2" name="skor_pemenang2"  >
                                                @error('skor_pemenang2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <!-- <label class="col-sm-2 col-form-label">Peserta 1</label> -->
                                            <div id="no5" class="form-group col-md-6" style="display:none">
                                                <label for="inputEmail4">Pemenang Ke 3</label>
                                     
                                                    <select name="id_data_peserta_menang3" class="form-control" id="id_data_peserta_menang3">
                                                    <option value="">--Pilih Pemenang--</option>

                                                @foreach ($data3 as $peser => $item)
                                                            <option id="id_atlit" value="{{$item->id_data_peserta }}"> {{ $item->asal_kabkota}}</option>
                                                    @endforeach 
                                                    </select>
                                                    
                                                
                                                @error('id_data_peserta_menang3')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            

                                            <div id="no6" class="form-group col-md-6" style="display:none">
                                            <label for="inputPassword4">Skor Peserta Pemenang 3</label>
                                                    <input type="text" class="form-control" id="skor_pemenang3" name="skor_pemenang3" >
                                                @error('skor_pemenang3')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="form-group col-md-6">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                            <button  tton type="reset" class="btn btn-danger waves-effect waves-light"><a href="{{ route('admin/pertandingan/data_pertandingan') }}">Back</a></button>
                                            </div>
                                            <div class="form-group col-md-6">
                                           
                                            </div>
                                        </div>
										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    @include('layouts/footer')


    <script type="text/javascript">
$("#select-item").click(function () {
    if($(this).val() == 'Selesai'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
        $('#no4').show()
        $('#no5').show()
        $('#no6').show()
    } else {
        $('#no1').hide()
		$('#no2').hide()
        $('#no3').hide()
        $('#no4').hide()
        $('#no5').hide()
        $('#no6').hide()
    }
});
</script>
