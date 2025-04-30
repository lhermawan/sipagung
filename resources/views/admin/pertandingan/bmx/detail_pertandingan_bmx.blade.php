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
                            <button type="button" data-idcabor2="{{$data2[0]->id_jenis_cabor2}}" class="btn add-btn" data-toggle="modal" data-target="#add_bmx" style="float: right;"><i class="bi bi-plus-lg"></i> Input Jadwal Pertandingan</button>
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
                            <a href="{{ url('admin/pertandingan/bmx/detail_pertandingan_bmx/'.$data2[0]->id_jenis_cabor2) }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
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
                                            <th>Judul Series</th>
											<th>Peserta</th>
                                            <th>Status Pertandingan</th>
											<th>Jadwal</th>
                                            <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($bmx as $key => $item)
                                        <tr>
											<td>{{ ++$key }}</td>
                                            <td>{{$item->nama_series_bmx }}</td>
                                            <td>
                                            <a type="button" class="btn btn-success"  href="{{ url('admin/pertandingan/bmx/lihat_peserta_bmx/'.$item->id_series_bmx) }}"><i class="fa fa-users m-r-5"></i> Lihat Peserta</a>
                                            </td>
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
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/bmx/edit_pertandingan_bmx/'.$item->id_series_bmx) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Data</a>
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/bmx/edit_skor_pertandingan_bmx/'.$item->id_series_bmx) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Skor</a>
												<a class="dropdown-item" data-id="{{$item->id_series_bmx}}" class="btn add-btn" data-toggle="modal" data-target="#hapus_bmx" style="float: right;"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
                                            <th>Judul Series</th>
											<th>Peserta</th>
                                            <th>Pemenang 1 & Skor</th>
                                            <th>Pemenang 2 & Skor</th>
                                            <th>Pemenang 3 & Skor</th>
                                            <th>Status Pertandingan</th>
											<th>Jadwal</th>
                                            <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($bmx2 as $key => $item)
                                        <tr>
											<td>{{ ++$key }}</td>
                                            <td>{{$item->nama_series_bmx }}</td>
                                            <td>
                                            <a type="button" class="btn btn-success"  href="{{ url('admin/pertandingan/bmx/lihat_peserta_bmx/'.$item->id_series_bmx) }}"><i class="fa fa-users m-r-5"></i> Lihat Peserta</a>
                                            </td>
                                            <td><span class="badge bg-success" style="font-size: 16px;">{{$item->bmx_menang1->nama_atlit }} ( Skor {{$item->skor_pemenang1 }})</span></td>
                                            <td><span class="badge bg-info" style="font-size: 16px;">{{$item->bmx_menang2->nama_atlit }} ( Skor {{$item->skor_pemenang2 }})</span></td>
                                            @if(empty($item->id_peserta_menang_bmx3 == ""))
                                            <td><span class="badge bg-danger" style="font-size: 16px;">{{$item->bmx_menang3->nama_atlit }} (Skor {{$item->skor_pemenang3 }})</span></td>
                                            @else
                                            <td>TIDAK ADA</p>
                                            @endif
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
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/bmx/edit_pertandingan_bmx/'.$item->id_series_bmx) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Data</a>
                                                <a class="dropdown-item" href="{{ url('admin/pertandingan/bmx/edit_skor_pertandingan_bmx/'.$item->id_series_bmx) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Skor</a>
												<a class="dropdown-item" data-id="{{$item->id_series_bmx}}" class="btn add-btn" data-toggle="modal" data-target="#hapus_bmx" style="float: right;"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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

    <div class="modal fade" id="add_bmx" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Jadwal Pertandingan BMX {{$data2[0]->nama_jenis_cabor}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveSeriesBMX') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_jenis_cabor2" name="id_jenis_cabor2" required>

                
                <div class="form-group">
                        <label for="formGroupExampleInput2">Judul Series BMX</label>
                        <input type="text" class="form-control" id="nama_series_bmx" name="nama_series_bmx" required>
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

<div class="modal fade" id="hapus_bmx" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Jadwal Pertandingan BMX {{$data2[0]->nama_series_bmx}} tersebut?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteJadwalBMX') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_series_bmx" name="id_series_bmx" readonly required>
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
            <form action="{{ route('updateSkorPertandinganBMX') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_series_bmx" name="id_series_bmx" readonly>
    

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
                    <label for="formGroupExampleInput2">Tim Peserta Menang Ke 1</label>
                    <select name="id_peserta_menang_bmx1" class="form-control" id="id_peserta_menang_bmx1">
                        <option value="">-</option>             
                             @foreach ($data3 as $peserta)
                                <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                            @endforeach 
                        </select>
                    </div>
                    <div id ="no2" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Skor Peserta Menang Ke 1</label>
                    <input type="text" class="form-control" id="skor_pemenang1" name="skor_pemenang1" required>
                    </div>
                </div>


                <div class="form-row">
                    <div id ="no3" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang 2</label>
                    <select name="id_peserta_menang_bmx2" class="form-control" id="id_peserta_menang_bmx2">
                        <option value="">-</option>             
                        @foreach ($data3 as $peserta)
                                <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                        @endforeach 
                        </select>
                    </div>
                    <div id ="no4" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Skor Peserta Menang Ke 2</label>
                    <input type="text" class="form-control" id="skor_pemenang2" name="skor_pemenang2" required>
                    </div>
                </div>


                <div class="form-row">
                    <div id ="no5" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang</label>
                    <select name="id_peserta_menang_bmx3" class="form-control" id="id_peserta_menang_bmx3">
                        <option value="">-</option>             
                        @foreach ($data3 as $peserta)
                                <option value="{{$peserta->atlit->id_atlit}}">{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</option>
                        @endforeach 
                        </select>
                    </div>
                    <div id ="no6" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Skor Peserta Menang Ke 3</label>
                    <input type="text" class="form-control" id="skor_pemenang3" name="skor_pemenang3" required>
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
$('#add_bmx').on('show.bs.modal', function (event) {


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
var Status = button.data('status')


var modal = $(this)
modal.find('.modal-body #id_series_bmx').val(ID)
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


$('#hapus_bmx').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_series_bmx').val(ID)

})

</script>

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
