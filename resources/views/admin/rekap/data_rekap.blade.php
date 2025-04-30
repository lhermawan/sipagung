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
								<h3 class="page-title">Data Rekap Pertandingan PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Pertandingan</a></li>
									<li class="breadcrumb-item active">Rekap</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_sepakbola" style="float: right;"><i class="bi bi-plus-lg"></i> Upload Data Rekap</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
						<!-- Search Filter -->
					

                        <div class="row filter-row">
        <div class="col-sm-6 col-md-2">  
            <form class="form" method="get" action="{{ route('admin/rekap/data_rekap') }}">

                    <div class="form-group form-focus">
                        <select value="id_jenis_cabor" name="id_jenis_cabor" class="form-control floating" id="id_jenis_cabor">
                            <option value="">--Jenis Cabor--</option>
                            <option value="">---Pilih Jenis Cabang Olahraga---</option>
                                                    @foreach ($jenis_cabor as $cabor)
                                                        <option value="{{$cabor->id_jenis_cabor}}">{{$cabor->jenis_olahraga}}</option>
                                                    @endforeach
                           
                        </select>
                        <label class="focus-label">Cabor</label>
                    </div>
                </div>




                    <div class="col-sm-6 col-md-1">  
                        <button type="submit" class="btn btn-success btn-block"> Cari </a></button>
                    </div>   
                    </form>  
                        
                        
                        <div class="col-sm-6 col-md-2">  
                            <a href="{{ route('admin/rekap/data_rekap') }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
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
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Cabang Olahraga</th>
                                                    <th>Kategori</th>
                                                    <th>Nomor Pertandingan</th>
                                                    <th>Tanggal & Waktu Dimulai Pertandingan</th>
         											<th>Keterangan</th>
                                                    <th>File</th>
                                                    <th>Aksi</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                            <td>{{ ++$key }}</td>
                                            <td><span class="badge bg-success" style="font-size: 12px;">{{ $item->jenis_cabor->jenis_olahraga }}</span> </td>
                                            <td><span class="badge bg-warning" style="font-size: 12px;">{{ $item->kategori->kategori }}</span></td>
                                            <td>{{ $item->nomor_kategori_cabor }}</td>
                                            <td>
                                                <div class="user-add-shedule-list">
                                                    <h2>
                                                        <a href="#" data-toggle="modal" data-target="#edit_schedule" style="border:2px dashed #1eb53a">
                                                        <span class="username-info m-b-10">{{tanggal_indonesia($item->tanggal) }} / {{ $item->waktu }} WIB</span>
                                                        </a>
                                                    </h2>
                                                </div>
                                            </td>
         									<td>{{ $item->keterangan }}</td>
                                            <td><a href="{{ url('admin/rekap/download_file/'.$item->id_rekap) }}" type="button" class="btn btn-info"><i class="fa fa-cloud-download"></i> Download</a></td>
                                            <td> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_sepakbola" class="edit-icon" data-id="{{$item->id_rekap}}"><i class="fa fa-trash"></i> Hapus</a></button>
                                            </td>
                                            
                                                
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>



    <div class="modal fade" id="add_sepakbola" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Upload Rekap Pertandingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveRekap') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Jenis Cabang Olahraga</label>
                    <select class="form-control @error('id_jenis_cabor') is-invalid @enderror" name="id_jenis_cabor" id="id_jenis_cabor" required>
                                                    <option value="">---Pilih Jenis Cabang Olahraga---</option>
                                                    @foreach ($jenis_cabor as $cabor)
                                                        <option  value="{{$cabor->id_jenis_cabor}}">{{$cabor->jenis_olahraga}}</option>
                                                    @endforeach
                                                </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="formGroupExampleInput2">Kategori</label>
                    <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori" required>
                                                    <option value="">---Pilih Kategori---</option>
                                                    @foreach ($kategori as $kate)
                                                        <option  value="{{$kate->id_kategori}}">{{$kate->kategori}}</option>
                                                    @endforeach
                                                </select> 
                    </div>
                </div>

                <div class="form-group">
                        <label for="formGroupExampleInput2">Nomor Pertandingan</label>
                        <input type="text" class="form-control" id="nomor_kategori_cabor" name="nomor_kategori_cabor" required>
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
                        <label for="formGroupExampleInput2">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan"  name="keterangan" required>
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput2">File</label>
                        <input type="file" class="form-control" id="file" name="file" placeholder="File" required>
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
                <h5 class="modal-title" id="modalkdp">Hapus Rekap Pertandingan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteRekap') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_rekap" name="id_rekap" readonly required>
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


$('#hapus_sepakbola').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_rekap').val(ID)

})

</script>

