@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
@include('layouts.image')

<div class="page-wrapper">

					
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
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Data Peserta Pertandingan {{ $data2[0]->jenis_cabor->jenis_olahraga }} {{ $data2[0]->nama_jenis_cabor }} {{ $data2[0]->kategori->kategori }} PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a>Pertandingan {{ $data2[0]->jenis_cabor->jenis_olahraga }}</li>
									<li class="breadcrumb-item active">{{ $data2[0]->nama_jenis_cabor }}</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" data-idcabor2="{{$data2[0]->id_jenis_cabor2}}" class="btn add-btn" data-toggle="modal" data-target="#add_muaythai" style="float: right;"><i class="bi bi-plus-lg"></i> Input Jadwal Pertandingan</button>
							</div>
						</div>
					</div>

                    <div class="card">
						<div class="card-body">
							<!-- <h4 class="card-title">Solid justified</h4> -->
							<ul class="nav nav-tabs nav-tabs-solid nav-justified">
								<li class="nav-item"><a class="nav-link active" href="#peserta" data-toggle="tab">Peserta</a></li>
								<li class="nav-item"><a class="nav-link" href="#jadwal" data-toggle="tab">Jadwal Pertandingan </a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#berlangsung" data-toggle="tab">Pertandingan Sedang Berlangsung</a></li> -->
								<li class="nav-item"><a class="nav-link" href="#hasil" data-toggle="tab">Hasil Akhir Pertandingan</a></li>
								<!-- <li class="nav-item"><a class="nav-link" href="applied-jobs.html">Applied</a></li>
								<li class="nav-item"><a class="nav-link" href="interviewing.html">Interviewing</a></li>
								<li class="nav-item"><a class="nav-link" href="offered-jobs.html">Offered</a></li>
								<li class="nav-item"><a class="nav-link" href="visited-jobs.html">Visitied </a></li>
								<li class="nav-item"><a class="nav-link" href="archived-jobs.html">Archived </a></li> -->
							</ul>
						</div>
					</div>
                    
                    <div class="tab-content">
                    <div id="peserta" class="tab-pane active">
                    <br>
                    <div class="row staff-grid-row">
                    @foreach ($data3 as $key => $item)
						<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
							<div class="profile-widget">
								<div class="profile-img">
									<a href="#" class="avatar"><img src="{{ URL::to('/images/atlit/'. $item->atlit->avatar) }}" width="50" height="80" alt="{{ $item->atlit->nama_atlit }}"></a>
								</div>
								
								<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="">{{ $item->atlit->nama_atlit }}</a></h4>
								<div class="small text-muted"><span class="badge bg-info" style="font-size: 12px; color:white;">{{ $item->atlit->data_peserta->asal_kabkota }}</span></div>
							</div>
                       
						</div>
                        @endforeach
					</div>
                    </div>


                    <div id="jadwal" class="tab-pane">
                    <br>

                    <!-- /Page Header -->
					
					<!-- Content Starts -->
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
                        </select>
                        <label class="focus-label">Status Pertandingan</label>
                    </div>
                </div>




                        <div class="col-sm-6 col-md-1">  
                            <button type="submit" class="btn btn-success btn-block"> Cari </a></button>
                        </div>   
                        </form>  
                                            
                        
                        <div class="col-sm-6 col-md-2">  
                            <a href="{{ url('admin/pertandingan/muaythai/detail_pertandingan_muaythai/'.$data2[0]->id_jenis_cabor2) }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
                        </div>   

                    </div>
					<!-- Search Filter -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>No</th>
											<th>Peserta 1 VS Peserta 2</th>
                                            <th>Asal Tim</th>
                                            <th>Status Pertandingan</th>
											<th>Jadwal</th>
                                            <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($muaythai as $key => $item)
                                        <tr>
											<td>{{ ++$key }}</td>
                                            <td>{{$item->atlit1->nama_atlit }}  VS {{$item->atlit2->nama_atlit }}</td>
                                            <td><span class="badge bg-info" style="font-size: 12px; color:black;">{{$item->atlit1->data_peserta->asal_kabkota }} </span> VS <span class="badge bg-success" style="font-size: 12px; color:black;">{{$item->atlit2->data_peserta->asal_kabkota }}</span></td>
                                            <td>{{$item->status_pertandingan }}</td>
                                            <td>
                                                <div class="user-add-shedule-list">
                                                    <h2>
                                                        <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                        <span class="username-info m-b-10">{{tanggal_indonesia($item->tanggal) }} / {{ $item->waktu }} WIB</span>
                                                        <span class="userrole-info">{{$item->jenis_cabor2->jenis_cabor->nama_tempat }}</span>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </td>

                                            <td> 
                                            <div class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/muaythai/edit_pertandingan_muaythai/'.$item->id_pertandingan_muaythai) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Data</a>
                                                <a class="dropdown-item" data-id="{{$item->id_pertandingan_muaythai}}" data-skor1="{{$item->skor_peserta1}}" data-skor2="{{$item->skor_peserta2}}"  data-status="{{$item->status_pertandingan}}"  class="btn add-btn" data-toggle="modal" data-target="#edit_skor" style="float: right;"><i class="fa fa-pencil-o m-r-5"></i> Edit Skor</a>
												<a class="dropdown-item" data-id="{{$item->id_pertandingan_muaythai}}" class="btn add-btn" data-toggle="modal" data-target="#hapus_muaythai" style="float: right;"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                            </td>
                                                </div>
                                                </div>
										    </tr>

                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>



                <div id="hasil" class="tab-pane">
                    <br>

                    <!-- /Page Header -->
					
					<!-- Content Starts -->

					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
											<th>No</th>
											<th>Peserta 1 VS Peserta 2</th>
                                            <th>Asal Tim</th>
                                            <th>Status Pertandingan</th>
                                            <th>Jadwal</th>
                                            <th>Skor</th>
                                            <th>Menang</th>
                                            <th>Kalah</th>
											<th>Jadwal</th>
                                            <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($muaythai2 as $key => $item)
                                        <tr>
											<td>{{ ++$key }}</td>
                                            <td>{{$item->atlit1->nama_atlit }}  VS {{$item->atlit2->nama_atlit }}</td>
                                            <td><span class="badge bg-info" style="font-size: 12px; color:black;">{{$item->atlit1->data_peserta->asal_kabkota }} </span> VS <span class="badge bg-success" style="font-size: 12px; color:black;">{{$item->atlit2->data_peserta->asal_kabkota }}</span></td>
                                            <td>{{$item->status_pertandingan }}</td>
                                            <td>
                                                <div class="user-add-shedule-list">
                                                    <h2>
                                                        <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                        <span class="username-info m-b-10">{{tanggal_indonesia($item->tanggal) }} / {{ $item->waktu }} WIB</span>
                                                        <span class="userrole-info">{{$item->jenis_cabor2->jenis_cabor->nama_tempat }}</span>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-info" style="font-size: 12px;">{{ $item->skor_peserta1 }}</span>  VS <span class="badge bg-success" style="font-size: 12px;">{{ $item->skor_peserta2 }}</span></td>
                                            <td>{{$item->muaythai_menang->nama_atlit }}</td>
                                            <td>{{$item->muaythai_kalah->nama_atlit }}</td>

                                            <td> 
                                            <div class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/muaythai/edit_pertandingan_muaythai/'.$item->id_pertandingan_muaythai) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Data</a>
                                                <!-- <a class="dropdown-item" data-id="{{$item->id_pertandingan_muaythai}}" data-skor1="{{$item->skor_peserta1}}" data-skor2="{{$item->skor_peserta2}}"  data-status="{{$item->status_pertandingan}}"  class="btn add-btn" data-toggle="modal" data-target="#edit_skor" style="float: right;"><i class="fa fa-pencil-o m-r-5"></i> Edit Skor</a> -->
												<a class="dropdown-item" data-id="{{$item->id_pertandingan_muaythai}}" class="btn add-btn" data-toggle="modal" data-target="#hapus_muaythai" style="float: right;"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
                                            </td>
                                                </div>
                                                </div>
										    </tr>

                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /Content End -->
					
                </div>
				<!-- /Page Content -->
				
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

    <div class="modal fade" id="add_muaythai" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Jadwal Pertandingan Muaythai {{$data2[0]->nama_jenis_cabor}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveMuaythai') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_jenis_cabor2" name="id_jenis_cabor2" required>
                    
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Peserta 1</label>
                    <select class="form-control @error('id_atlit1') is-invalid @enderror" name="id_atlit1" id="id_atlit1" required>
                                                    <option value="">---Pilih Lawan Peserta 1---</option>
                                                    @foreach ($data3 as $peserta)
                                                        <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                                                    @endforeach
                                                </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Peserta 2</label>
                    <select class="form-control @error('id_data_peserta2') is-invalid @enderror" name="id_atlit2" id="id_atlit2" required>
                                                    <option value="">---Pilih Lawan Peserta 2---</option>
                                                    @foreach ($data3 as $peserta)
                                                        <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                                                    @endforeach
                                                </select> 
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Total Peserta 1</label>
                    <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta1" value="0" readonly required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Skor Total Peserta 2</label>
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

<div class="modal fade" id="hapus_muaythai" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Jadwal Pertandingan Muaythai {{$data2[0]->nama_jenis_cabor}} tersebut?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteJadwalMuaythai') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_pertandingan_muaythai" name="id_pertandingan_muaythai" readonly required>
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


<div class="modal fade" id="edit_skor" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Skor Pertandingan Sepakbola</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateSkorPertandinganMuaythai') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_pertandingan_muaythai" name="id_pertandingan_muaythai" readonly>
                    

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
                    <select name="id_peserta_menang" class="form-control" id="id_peserta_menang">
                        <option value="-">-</option>             
                        @foreach ($data3 as $peserta)
                            @if (old('id') == $peserta->atlit->id_atlit)
                            <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                                @else
                                <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                            @endif
                        @endforeach 
                        </select>
                    </div>
                    <div id ="no2" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Kalah</label>
                    <select name="id_peserta_kalah" class="form-control" id="id_peserta_kalah">
                    <option value="-">-</option>             
                        @foreach ($data3 as $peserta)
                            @if (old('id') == $peserta->atlit->id_atlit)
                            <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                                @else
                                <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
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
$('#add_muaythai').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idcabor2')
var IDKate = button.data('idkate')


var modal = $(this)
modal.find('.modal-body #id_jenis_cabor2').val(ID)
modal.find('.modal-body #id_kategori').val(IDKate)

})

$('#edit_skor').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Skor1 = button.data('skor1')
var Skor2 = button.data('skor2')
var Status = button.data('status')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_muaythai').val(ID)
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


$('#hapus_muaythai').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_muaythai').val(ID)

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
