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
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Nomor Kategori Cabor</th>
                                                    <th>Peserta 1</th>
                                                    <th>VS</th>
                                                    <th>Peserta 2</th>
                                                    <th>Tanggal & Jam</th>
                                                    <th>Status Pertandingan</th>
                                                    <th>SKOR</th>
                                                    <th>Ke 1</th>
                                                    <th>Ke 2</th>
                                                    <th>Ke 3</th>
                                                    <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($pertandingan_luar as $key => $item)
										<tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{$item->nomor_kategori_cabor }}</td>
                                            @if(empty($item->id_data_peserta_luar1 == ""))
                                            <td><span class="badge bg-success" style="font-size: 12px;">{{ $item->peserta_luar1->asal_kabkota }}</span> <br>
                                            @else
                                            <td><a type="button" class="btn btn-success"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_peserta_luar_ciamis/'.$item->id_series_luar) }}"><i class="fa fa-users m-r-5"></i> Input Peserta</a></td>
                                            @endif

                                            @if(empty($item->nama_atlit1 == ""))
                                            {{ $item->nama_atlit1 }}
                                            <br>
                                            @else
                                            @endif

                                            @if(empty($item->nama_atlit1a == ""))
                                            {{ $item->nama_atlit1a }}
                                            <br>
                                            @else
                                            @endif

                                            @if(empty($item->nama_atlit1b == ""))
                                            {{ $item->nama_atlit1b }}
                                            <br>
                                            @else
                                            @endif
                                        
                                        </td>
                                            <td></td>
                                            @if(empty($item->id_data_peserta_luar1 == ""))
                                            <td><span class="badge bg-info" style="font-size: 12px;">{{ $item->peserta_luar2->asal_kabkota }}</span><br>
                                            @else
                                            <td></td>
                                            @endif
                                            @if(empty($item->nama_atlit2 == ""))
                                            {{ $item->nama_atlit2 }}
                                            <br>
                                            @else
                                            @endif

                                            @if(empty($item->nama_atlit2a == ""))
                                            {{ $item->nama_atlit2a }}
                                            <br>
                                            @else
                                            @endif

                                            @if(empty($item->nama_atlit2b == ""))
                                            {{ $item->nama_atlit2b }}
                                            <br>
                                            @else
                                            @endif
                                        </td>
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
                                            <td><span class="badge bg-success" style="font-size: 12px;">{{ $item->skor_peserta1 }}</span> / <span class="badge bg-info" style="font-size: 12px;">{{ $item->skor_peserta2 }} </span> / <span class="badge bg-info" style="font-size: 12px;">{{ $item->skor_peserta3 }}</span></td>
                                            @if(empty($item->id_data_peserta_menang_luar1 == ""))
                                            <td>{{ $item->peserta_menang1->asal_kabkota }}</td>
                                            @else
                                            <td></td>
                                            @endif

                                            @if(empty($item->id_data_peserta_menang_luar2 == ""))
                                            <td>{{ $item->peserta_menang2->asal_kabkota }}</td>
                                            @else
                                            <td></td>
                                            @endif

                                            @if(empty($item->id_data_peserta_menang_luar3 == ""))
                                            <td>{{ $item->peserta_menang3->asal_kabkota }}</td>
                                            @else
                                            <td></td>
                                            @endif
                                           
                                            <td>
                                            <div class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                
                                               
                                                <!-- <a class="dropdown-item" href="{{ url('admin/pertandingan/luar_ciamis/edit_pertandingan/'.$item->id_pertandingan_sepakbola) }}"><i class="fa fa-edit-o m-r-5"></i> Edit Data</a> -->
                                                <a class="dropdown-item" data-id="{{$item->id_series_luar}}" data-tanggal="{{$item->tanggal}}" data-waktu="{{$item->waktu}}" data-keterangan="{{$item->keterangan}}" data-nomor="{{$item->nomor_kategori_cabor}}"  data-link="{{$item->link_streaming}}" class="btn add-btn" data-toggle="modal" data-target="#edit_informasi" style="float: right;"><i class="fa fa-pencil-o m-r-5"></i> Edit Informasi</a>
                                                <a class="dropdown-item" data-id="{{$item->id_series_luar}}" data-skor1="{{$item->skor_peserta1}}" data-skor2="{{$item->skor_peserta2}}"  data-status="{{$item->status_pertandingan}}"  class="btn add-btn" data-toggle="modal" data-target="#edit_skor" style="float: right;"><i class="fa fa-pencil-o m-r-5"></i> Edit Skor</a>
                                                        <!-- <a class="dropdown-item" data-id="{{$data[0]->id_jenis_cabor}}" data-status="{{$item->status_pertandingan}}" class="btn add-btn" data-toggle="modal" data-target="#edit_status_pertandingan" style="float: right;"><i class="fa fa-edit-o m-r-5"></i> Edit Status</a> -->
														<a class="dropdown-item" data-id="{{$item->id_series_luar}}" class="btn add-btn" data-toggle="modal" data-target="#hapus_sepakbola" style="float: right;"><i class="fa fa-trash-o m-r-5"></i> Hapus</a>
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
                <h5 class="modal-title" id="modalkdp">Tambah Jadwal Pertandingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('savePertandinganLuar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_jenis_cabor" name="id_jenis_cabor" placeholder="Jenis Cabang Olahraga" required>
                
                <div class="form-group">
                        <label for="formGroupExampleInput2">Kategori</label>
                        <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" id="select-item-kategori" required>
                                                    <option value="">---Pilih Kategori---</option>
                                                    @foreach ($kategori as $peserta)
                                                        <option  value="{{$peserta->id_kategori}}" >{{$peserta->kategori}}</option>
                                                    @endforeach
                                                </select> 
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nomor Cabor</label>
                        <input type="text" class="form-control" id="nomor_kategori_cabor"  name="nomor_kategori_cabor" placeholder="Jika tidak ada isi dengan tanda ( - )" required="">
                    </div>


                <div class="form-row">
                <div id ="no1" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Peserta 1</label>
                    <select class="form-control @error('id_data_peserta_luar1') is-invalid @enderror" name="id_data_peserta_luar1" id="id_data_peserta_luar1">
                                                    <option value="">---Pilih Lawan Peserta 1---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                                                </select>
                    </div>
                    <div id ="no2" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Peserta 2</label>
                    <select class="form-control @error('id_data_peserta_luar2') is-invalid @enderror" name="id_data_peserta_luar2" id="id_data_peserta_luar2">
                                                    <option value="">---Pilih Lawan Peserta 2---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                                                </select> 
                    </div>
                </div>

                <div class="form-row">
                <div id ="no3" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Nama Atlit Peserta 1</label>
                    <input type="text" class="form-control" id="nama_atlit1"  name="nama_atlit1" placeholder="Nama Atlit Peserta Ke 1" >
                    </div>
                    <div id ="no4" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Nama Atlit Peserta 2</label>
                    <input type="text" class="form-control" id="nama_atlit2"  name="nama_atlit2" placeholder="Nama Atlit Peserta Ke 2" >
                    </div>
                </div>

                <div class="form-row">
                <div id ="no5" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Nama Atlit Peserta 1</label>
                    <input type="text" class="form-control" id="nama_atlit1a"  name="nama_atlit1a" placeholder="Nama Atlit Peserta Ke 1" >
                    </div>
                    <div id ="no6" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Nama Atlit Peserta 2</label>
                    <input type="text" class="form-control" id="nama_atlit2a"  name="nama_atlit2a" placeholder="Nama Atlit Peserta Ke 2" >
                    </div>
                    
                </div>

                <div class="form-row">
                <div id ="no7" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Nama Atlit Peserta 1</label>
                    <input type="text" class="form-control" id="nama_atlit1b"  name="nama_atlit1b" placeholder="Nama Atlit Peserta Ke 1" >
                    </div>
                    <div id ="no8" class="form-group col-md-6" style="display:none">
                    <label for="formGroupExampleInput2">Nama Atlit Peserta 2</label>
                    <input type="text" class="form-control" id="nama_atlit2b"  name="nama_atlit2b" placeholder="Nama Atlit Peserta Ke 2" >
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
                        <select name="status_pertandingan" class="form-control" id="select-item-menang">
                        <option id="status_pertandingan"  value="">--Status Pertandingan--</option>
                            <option  value="Belum Dimulai">Belum Dimulai</option>
                            <!-- <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                            <option  value="Selesai">Selesai (Single/Team/Ganda/Triple)</option>
                            <option  value="Selesai Beregu">Selesai (Beregu/Balap)</option> -->
                        </select>
                    </div>

                    <div class="form-row">
                    <div id ="skor1" class="form-group col-md-4" style="display:none">
                        <label for="formGroupExampleInput2">Skor Peserta 1</label>
                        <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta1">
                        </div>
                        <div id ="skor2" class="form-group col-md-4" style="display:none">
                        <label for="formGroupExampleInput2">Skor Peserta 2</label>
                        <input type="text" class="form-control" id="skor_peserta2" name="skor_peserta2">
                        </div>
                        <div id ="skor3" class="form-group col-md-4" style="display:none">
                        <label for="formGroupExampleInput2">Skor Peserta 3</label>
                        <input type="text" class="form-control" id="skor_peserta3" name="skor_peserta3">
                        </div>
                    </div>

                    <div class="form-row">
                    <div id ="no_menang1" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang Ke 1</label>
                    <select name="id_data_peserta_menang_luar1" class="form-control" id="id_data_peserta_menang_luar1 ">
                        <option value="">--Pilih Pemenangnya---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                        </select>
                    </div>
                    <div id ="no_menang2" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang Ke 2</label>
                    <select name="id_data_peserta_menang_luar2" class="form-control" id="id_data_peserta_menang_luar2">
                        <option value="">--Pilih Pemenangnya---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                        </select>
                    </div>

                    <div id ="no_menang3" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang Ke 3</label>
                    <select name="id_data_peserta_menang_luar3" class="form-control" id="id_data_peserta_menang_luar3">
                        <option value="">--Pilih Pemenangnya---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                        </select>
                    </div>

                    </div>

                    
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Keterangan Pertandingan</label>
                        <textarea class="form-control" name="keterangan" placeholder="Info Grup: misal GRUP A atau Bisa Berupa Keterangan Lainnya"></textarea>
                    </div>

                    

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Link Streaming (Jika Tidak ada isi dengan -)</label>
                        <textarea class="form-control" required id="link_streaming" name="link_streaming" placeholder="Jika Belum Ada Bisa Diisi Dengan Tanda ( - )"></textarea>
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
                <h5 class="modal-title" id="modalkdp">Edit Skor Pertandingan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateSkorPertandinganLuar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="d_series_luar" name="id_series_luar" readonly>
                    

               

                

                <div class="form-group">
                        <label for="formGroupExampleInput2">Status Pertandingan</label>
                        <select name="status_pertandingan" class="form-control" id="select-item">
                        <option id="status_pertandingan"  value="">--Pilih Status Pertandingan--</option>
                            <option  value="Belum Dimulai">Belum Dimulai</option>
                            <option  value="Sedang Berlangsung">Sedang Berlangsung</option>
                            <option  value="Selesai">Selesai (Single/Team/Ganda/Triple)</option>
                            <option  value="Selesai Beregu">Selesai (Beregu/Balap)</option>
                        </select>
                    </div>

                  


                    <div class="form-row">
                    <div id ="no_a1" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang 1</label>
                    <select name="id_data_peserta_menang_luar1" class="form-control" id="id_data_peserta_menang_luar1 ">
                        <option value="">--Pilih Pemenangnya---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                        </select>
                    </div>
                    <div id ="no_b1" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang 2</label>
                    <select name="id_data_peserta_menang_luar2" class="form-control" id="id_data_peserta_menang_luar2">
                        <option value="">--Pilih Pemenangnya---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                        </select>
                    </div>
                    <div id ="no_c1" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Tim Peserta Menang 3</label>
                    <select name="id_data_peserta_menang_luar3" class="form-control" id="id_data_peserta_menang_luar3">
                        <option value="">--Pilih Pemenangnya---</option>
                                                    @foreach ($peserta2 as $peserta)
                                                        <option  value="{{$peserta->id_data_peserta}}">{{$peserta->asal_kabkota}}</option>
                                                    @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="form-row">
                    <div id ="no_a" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 1</label>
                    <input type="text" class="form-control" id="skor_peserta1" name="skor_peserta1">
                    </div>
                    <div id ="no_b" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 2</label>
                    <input type="text" class="form-control" id="skor_peserta2" name="skor_peserta2">
                    </div>
                    <div id ="no_c" class="form-group col-md-4" style="display:none">
                    <label for="formGroupExampleInput2">Skor Tim Peserta 2</label>
                    <input type="text" class="form-control" id="skor_peserta3" name="skor_peserta3">
                    </div>
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

<div class="modal fade" id="edit_informasi" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Informasi Pertandingan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateInformasiPertandinganLuar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="d_series_luar" name="id_series_luar" readonly>

                <div class="form-group">
                        <label for="formGroupExampleInput2">Nomor Cabor</label>
                        <input type="text" class="form-control" id="nomor_kategori_cabor"  name="nomor_kategori_cabor" placeholder="Jika tidak ada isi dengan tanda ( - )" required="">
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
                        <label for="formGroupExampleInput2">Keterangan Pertandingan</label>
                        <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Info Grup: misal GRUP A atau Bisa Berupa Keterangan Lainnya"></textarea>
                    </div>

                    

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Link Streaming (Jika Tidak ada isi dengan -)</label>
                        <textarea class="form-control" required id="link_streaming" name="link_streaming" placeholder="Jika Belum Ada Bisa Diisi Dengan Tanda ( - )"></textarea>
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


<div class="modal fade" id="hapus_sepakbola" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Jadwal Pertandingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteJadwalPertandinganLuar') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_series_luar" name="id_series_luar" readonly required>
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
modal.find('.modal-body #d_series_luar').val(ID)
modal.find('.modal-body #skor_peserta1').val(Skor1)
modal.find('.modal-body #skor_peserta2').val(Skor2)
modal.find('.modal-body #status_pertandingan').val(Status)

})

$('#edit_informasi').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Tanggal = button.data('tanggal')
var Waktu = button.data('waktu')
var Keterangan = button.data('keterangan')
var Link = button.data('link')
var Nomor = button.data('nomor')


var modal = $(this)
modal.find('.modal-body #d_series_luar').val(ID)
modal.find('.modal-body #tanggal').val(Tanggal)
modal.find('.modal-body #waktu').val(Waktu)
modal.find('.modal-body #keterangan').val(Keterangan)
modal.find('.modal-body #link_streaming').val(Link)
modal.find('.modal-body #nomor_kategori_cabor').val(Nomor)

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
modal.find('.modal-body #id_series_luar').val(ID)

})

</script>

<script type="text/javascript">
$("#select-item-menang").click(function () {
    if($(this).val() == 'Selesai'){
        $('#no_menang1').show()
        $('#skor1').show()
		$('#no_menang2').show()
        $('#skor2').show()
        $('#no_menang3').hide()
        $('#skor3').hide()
    } else if($(this).val() == 'Selesai Beregu'){
        $('#no_menang1').show()
		$('#no_menang2').show()
        $('#no_menang3').show()
        $('#skor1').show()
        $('#skor2').show()
        $('#skor3').show()
    }else {
        $('#no_menang1').hide()
        $('#no_menang2').hide()
        $('#no_menang3').hide()
        $('#skor1').hide()
        $('#skor2').hide()
        $('#skor3').hide()
    }
});
</script>

<script type="text/javascript">
$("#select-item").click(function () {
    if($(this).val() == 'Selesai'){
        $('#no_a').show()
		$('#no_b').show()
        $('#no_c').hide()
        $('#no_a1').show()
        $('#no_b1').show()
        $('#no_c1').hide()
    } else if($(this).val() == 'Selesai Beregu'){
        $('#no_a').show()
		$('#no_b').show()
        $('#no_c').show()
        $('#no_a1').show()
        $('#no_b1').show()
        $('#no_c1').show()
    }else {
        $('#no_a').hide()
		$('#no_b').hide()
        $('#no_c').hide()
        $('#no_a1').hide()
        $('#no_b1').hide()
        $('#no_c1').hide()
    }
});
</script>


<script type="text/javascript">
$("#select-item-kategori").click(function () {
    if($(this).val() == '1'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
		$('#no4').show()
        $('#no5').hide()
		$('#no6').hide()
    }else if($(this).val() == '2'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
		$('#no4').show()
        $('#no5').hide()
		$('#no6').hide()
    }else if($(this).val() == '3'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
		$('#no4').show()
        $('#no5').show()
        $('#no6').show()
    } else if($(this).val() == '4'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').hide()
		$('#no4').hide()
        $('#no5').hide()
        $('#no6').hide()
    }else if($(this).val() == '5'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
		$('#no4').show()
        $('#no5').show()
        $('#no6').show()
    }else if($(this).val() == '6'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
		$('#no4').show()
        $('#no5').show()
        $('#no6').show()
    }else if($(this).val() == '7'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').show()
		$('#no4').show()
        $('#no5').show()
        $('#no6').show()
        $('#no7').show()
        $('#no8').show()
    }else if($(this).val() == '8'){
        $('#no1').hide()
		$('#no2').hide()
        $('#no3').hide()
		$('#no4').hide()
        $('#no5').hide()
        $('#no6').hide()
        $('#no7').hide()
        $('#no8').hide()
    }else if($(this).val() == '9'){
        $('#no1').hide()
		$('#no2').hide()
        $('#no3').hide()
		$('#no4').hide()
        $('#no5').hide()
        $('#no6').hide()
        $('#no7').hide()
        $('#no8').hide()
    }else if($(this).val() == '10'){
        $('#no1').show()
		$('#no2').show()
        $('#no3').hide()
		$('#no4').hide()
        $('#no5').hide()
        $('#no6').hide()
    }else {
        $('#no1').hide()
		$('#no2').hide()
        $('#no3').hide()
		$('#no4').hide()
        $('#no5').hide()
        $('#no6').hide()
        $('#no7').hide()
        $('#no8').hide()
    }
});
</script>
