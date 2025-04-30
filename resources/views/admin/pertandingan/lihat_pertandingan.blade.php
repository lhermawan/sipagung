@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
@include('layouts.image')

<div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Jadwal Pertandingan {{$data[0]->jenis_olahraga}} PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Pertandingan</a></li>
									<li class="breadcrumb-item active">{{$data[0]->jenis_olahraga}}</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" data-id="{{$data[0]->id_jenis_cabor}}" class="btn add-btn" data-toggle="modal" data-target="#add_sepakbola" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Jadwal</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
						<!-- Search Filter -->
					

                        <div class="row filter-row">
        <div class="col-sm-6 col-md-2">  
            <form class="form" method="get">

                <div class="form-group form-focus">
						
                        <input type="date" value="{{ request('from') }}"  name="from" class="form-control floating" id="from">
                        <label class="focus-label">Tanggal Pertandingan Dari</label>
                    </div>
                </div>
        

                <div class="col-sm-6 col-md-2">  
                    <div class="form-group form-focus">
                
                        <input type="date" value="{{ request('to') }}" name="to" class="form-control floating" id="to">
                        <label class="focus-label">Tanggal Pertandingan Ke</label>
                    </div>
                </div>

                <div class="col-sm-6 col-md-2">  
                    <div class="form-group form-focus">
                        <select value="{{ request('status') }}"  name="status" class="form-control floating" id="status">
                            <option value="">--Pilih Status Pertandingan--</option>
                            <option value="Belum Dimulai">Belum Dimulai</option>
                            <option value="Sedang Berlangsung">Sedang Berlangsung</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        <label class="focus-label">Status Pertandingan</label>
                    </div>
                </div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  
                        
                        
                        <div class="col-sm-6 col-md-2">  
                            <a href="{{ url('admin/pertandingan/lihat_pertandingan/'.$data[0]->id_jenis_cabor) }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
                        </div>   

                    </div>

<!-- /Search Filter -->
@include('sweet::alert')

{{-- message --}}
    {!! Toastr::message() !!}

    <script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>


                                            
					<div class="row">
                    <a href="{{ url('admin/pertandingan/export_excel') }}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Team</th>
                                                    <th>Tanggal & Jam</th>
                                                    <th>Status Pertandingan</th>
                                                    <th>SKOR</th>
                                                    <th>Menang</th>
                                                    <th>Kalah</th>
                                                    <th>Draw</th>
                                                    <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($sepakbola as $key => $item)
										<tr>
                                            <td>{{ ++$key }}</td>
                                            <td><span class="badge bg-success" style="font-size: 12px;">{{ $item->data_peserta->asal_kabkota }}</span>  VS <span class="badge bg-info" style="font-size: 12px;">{{ $item->data_pesertaa->asal_kabkota }}</span> </td>
                                            <td>
                                                <div class="user-add-shedule-list">
                                                    <h2>
                                                        <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                        <span class="username-info m-b-10">{{tanggal_indonesia($item->tanggal) }} / {{ $item->waktu }} WIB</span>
                                                        <span class="userrole-info">{{$item->jenis_cabor->nama_tempat }}</span>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </td>
                                            </td>
                                            <td>{{ $item->status_pertandingan }}</td>
                                            <td><span class="badge bg-success" style="font-size: 12px;">{{ $item->skor_peserta1 }}</span>  VS <span class="badge bg-info" style="font-size: 12px;">{{ $item->skor_peserta2 }}</span></td>
                                            <td>{{ $item->menang }}</td>
                                            <td>{{ $item->kalah }}</td>
                                            <td>{{ $item->draw }}</td>
                                            <td>
                                            <div class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                               
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/edit_pertandingan/'.$item->id_pertandingan_sepakbola) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Data</a>
                                                        <a class="dropdown-item" data-id="{{$item->id_pertandingan_sepakbola}}" data-skor1="{{$item->skor_peserta1}}" data-skor2="{{$item->skor_peserta2}}"  data-status="{{$item->status_pertandingan}}"  class="btn add-btn" data-toggle="modal" data-target="#edit_skor" style="float: right;"><i class="fa fa-pencil-o m-r-5"></i> Edit Skor</a>
                                                        <a class="dropdown-item" data-id="{{$item->id_pertandingan_sepakbola}}" data-skor1="{{$item->skor_peserta1}}" data-skor2="{{$item->skor_peserta2}}"  data-status="{{$item->status_pertandingan}}"  class="btn add-btn" data-toggle="modal" data-target="#edit_skor_draw" style="float: right;"><i class="fa fa-pencil-o m-r-5"></i> Edit Skor Draw</a>
                                                        <!-- <a class="dropdown-item" data-id="{{$data[0]->id_jenis_cabor}}" data-status="{{$item->status_pertandingan}}" class="btn add-btn" data-toggle="modal" data-target="#edit_status_pertandingan" style="float: right;"><i class="fa fa-edit-o m-r-5"></i> Edit Status</a> -->
														<a class="dropdown-item" data-id="{{$item->id_pertandingan_sepakbola}}" class="btn add-btn" data-toggle="modal" data-target="#hapus_sepakbola" style="float: right;"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                                </div>
                                                </div>
                                            </td>
                                            
                                                
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>




  <div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog">
        <div class="modal-content"></div>          
                    <img class="img-responsive" src="" id="show-img" width="100%" height="100%" /> 
        </div>
    </div>
</div>
              

    <!-- content --> 

    <div class="modal fade" id="add_sepakbola" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Jadwal Pertandingan Sepakbola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveSepakbola') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_jenis_cabor" name="id_jenis_cabor" placeholder="Jenis Cabang Olahraga" required>
                    
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Peserta 1</label>
                    <select class="form-control @error('id_data_peserta') is-invalid @enderror" name="id_data_peserta" id="id_data_peserta" required>
                                                    <option value="">---Pilih Lawan Peserta 1---</option>
                                                    @foreach ($peserta as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                                                </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Peserta 2</label>
                    <select class="form-control @error('id_data_peserta2') is-invalid @enderror" name="id_data_peserta2" id="id_data_peserta2" required>
                                                    <option value="">---Pilih Lawan Peserta 2---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                                                </select> 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Peserta 1</label>
                    <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta1" value="0" readonly required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Peserta 2</label>
                    <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta2" value="0" readonly required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Tanggal Pertandingan</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" required>
                    </div>
                </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput2">Status Pertandingan</label>
                        <input type="text" class="form-control" id="status_pertandingan" value="Belum Dimulai" name="status_pertandingan" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Link Streaming</label>
                        <textarea class="form-control" required id="link_streaming" name="link_streaming" placeholder="Jika Belum Ada Bisa Diisi Dengan Tanda ( - )"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Thumbnail</label>
                        <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*" placeholder="Thumbnail" required>
                    </div>



                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit_skor" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Skor Pertandingan Sepakbola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateSkorSepakbola') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_pertandingan_sepakbola" name="id_pertandingan_sepakbola" readonly>
                    

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 1</label>
                    <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta1" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 2</label>
                    <input type="text" class="form-control" id="skor_peserta2" name="skor_peserta2" required>
                    </div>
                </div>

                <div class="form-group">
                        <label for="formGroupExampleInput2">Status Pertandingan</label>
                        <select name="status_pertandingan" class="form-control" id="select-item">
                        <option id="status_pertandingan"  value="">--Pilih Status Pertandingan--</option>
                            <option  value="Belum Dimulai">Belum Dimulai</option>
                            <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                            <option  value="Selesai">Selesai</option>
                        </select>
                    </div>

                    <div class="form-row">
                    <div id ="no1" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang</label>
                    <select name="menang" class="form-control" id="menang">
                        <option value="-">-</option>
                        @foreach ($peserta2 as $peserta)
                            @if (old('id') == $peserta->asal_kabkota)
                                <option value="{{ $peserta->asal_kabkota }}" selected>{{ $peserta->asal_kabkota }}</option>
                                @else
                                <option value="{{ $peserta->asal_kabkota }}">{{ $peserta->asal_kabkota }}</option>
                            @endif
                        @endforeach 
                        </select>
                    </div>
                    <div id ="no2" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Kalah</label>
                    <select name="kalah" class="form-control" id="kalah">
                        <option value="-">-</option>
                        @foreach ($peserta2 as $peserta)
                            @if (old('id') == $peserta->asal_kabkota)
                                <option value="{{ $peserta->asal_kabkota }}" selected>{{ $peserta->asal_kabkota }}</option>
                                @else
                                <option value="{{ $peserta->asal_kabkota }}">{{ $peserta->asal_kabkota }}</option>
                            @endif
                        @endforeach 
                        </select>
                    </div>
                </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="edit_skor_draw" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Skor Pertandingan Sepakbola Jika Draw</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateSkorSepakbolaDraw') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_pertandingan_sepakbola" name="id_pertandingan_sepakbola" readonly>
                    

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 1</label>
                    <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta1" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 2</label>
                    <input type="text" class="form-control" id="skor_peserta2" name="skor_peserta2" required>
                    </div>
                </div>

                <div class="form-group">
                        <label for="formGroupExampleInput2">Status Pertandingan</label>
                        <select name="status_pertandingan" class="form-control" id="select-item">
                        <option id="status_pertandingan"  value="">--Pilih Status Pertandingan--</option>
                            <option  value="Belum Dimulai">Belum Dimulai</option>
                            <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                            <option  value="Selesai">Selesai</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput2">Pertandingan</label>
                        <input type="text" class="form-control" name="draw" value="Draw" readonly required>
                    </div>

                    

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- <div class="modal fade" id="edit_status_pertandingan" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Skor Pertandingan Sepakbola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateStatusSepakbola') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_pertandingan_sepakbola" name="id_pertandingan_sepakbola" readonly>

                <div class="form-group">
                        <label for="formGroupExampleInput2">Status Pertandingan</label>
                        <select name="status_pertandingan" id="status_pertandingan" class="form-control">
                        <option id="status_pertandingan"  value="">--Pilih Status Pertandingan--</option>
                            <option id="status_pertandingan" value="Belum Dimulai">Belum Dimulai</option>
                            <option id="status_pertandingan" value="Sedang Berlangsung">Sedang Berlangsung</option>
                            <option id="status_pertandingan" value="Selesai">Selesai</option>
                        </select>
                    </div>
                    

            

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->


<div class="modal fade" id="hapus_sepakbola" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Jadwal Pertandingan Sepakbola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteJadwalSepakbola') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_pertandingan_sepakbola" name="id_pertandingan_sepakbola" readonly required>
                    </div>

                  
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- content --> 

<!-- <div class="modal fade" id="update_cabor" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Data Jenis Cabang Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                        <input type="hidden" class="form-control" id="id_jenis_cabor" name="id_jenis_cabor" readonly required>
                        <input type="text" class="form-control" id="jenis_olahraga" name="jenis_olahraga" placeholder="Jenis Cabang Olahraga" required>
                    </div>

                    <div class="form-group">
                    <input type="text" id="venue2" name="venue"/>
                 
                    <img width="100" height="100" src="" id="venue" width="48" height="48">
                    </div>
                    


                    <div class="form-group">
                        <label for="formGroupExampleInput2">Alamat Venue</label>
                        <textarea class="form-control" required id="alamat" name="alamat" placeholder="Alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Kapasitas Penonton</label>
                        <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Jumlah Kapasitas Penonton" required>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan Venue</label>
                        <textarea class="form-control" required id="keterangan" name="keterangan" placeholder="Keterangan Tempat Venue Tersebut"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Kordinat Alamat Venue (PETA MAPS)</label>
                        <input type="text" class="form-control" id="kordinat" name="kordinat" placeholder="Bila tidak ada isi dengan ( - )" required>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->


    @include('layouts/footer')

<script>
    $(document).ready(function(){
        $("img").click(function(){
           var img=$(this).attr('src');
             $("#show-img").attr('src',img);
             $("#imgmodal").modal('show');
        });
    });
</script>


<script type="text/javascript">

// $('#update_cabor').on('show.bs.modal', function (event) {

// var button = $(event.relatedTarget)
// var ID = button.data('idcabor')
// var Jenis = button.data('jenis')
// var Alamat = button.data('alamatt')
// var Kapasitas = button.data('kapasitass')
// var Keterangan = button.data('keterangann')
// var Kordinat = button.data('kordinatt')
// var Venue = button.data('venue')
// var Venue2 = button.data('venue2')


// var modal = $(this)
// modal.find('.modal-body #id_jenis_cabor').val(ID)
// modal.find('.modal-body #jenis_olahraga').val(Jenis)
// modal.find('.modal-body #alamat').val(Alamat)
// modal.find('.modal-body #kapasitas').val(Kapasitas)
// modal.find('.modal-body #keterangan').val(Keterangan)
// modal.find('.modal-body #kordinat').val(Kordinat)
// modal.find('.modal-body #venue').attr('src',Venue)
// modal.find('.modal-body #venue2').val(Venue2)


// })
$('#add_sepakbola').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_jenis_cabor').val(ID)

})

$('#edit_skor').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Skor1 = button.data('skor1')
var Skor2 = button.data('skor2')
var Status = button.data('status')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_sepakbola').val(ID)
modal.find('.modal-body #skor_peserta1').val(Skor1)
modal.find('.modal-body #skor_peserta2').val(Skor2)
modal.find('.modal-body #status_pertandingan').val(Status)

})


$('#edit_skor_draw').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Skor1 = button.data('skor1')
var Skor2 = button.data('skor2')
var Status = button.data('status')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_sepakbola').val(ID)
modal.find('.modal-body #skor_peserta1').val(Skor1)
modal.find('.modal-body #skor_peserta2').val(Skor2)
modal.find('.modal-body #status_pertandingan').val(Status)

})

$('#edit_status_pertandingan').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Status = button.data('status')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_sepakbola').val(ID)
modal.find('.modal-body #status_pertandingan').val(Status)

})


$('#hapus_sepakbola').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_sepakbola').val(ID)

})

</script>

<script type="text/javascript">
$("#select-item").click(function () {
    if($(this).val() == 'Selesai'){
        $('#no1').show()
		$('#no2').show()
    } else {
        $('#no1').hide()
		$('#no2').hide()
    }
});
</script>
