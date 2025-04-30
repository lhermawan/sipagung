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
								<h3 class="page-title">Data Tim Peserta PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Tim Peserta PORPROV XIV</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_peserta" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Tim Peserta</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
						<!-- Search Filter -->
					

		<div class="row filter-row">

					
						
<div class="col-sm-6 col-md-2">  
<form class="form" method="get">
		<div class="form-group form-focus">
		
			<select name="asal_kabkota" value="{{ request('asal_kabkota') }}" class="form-control floating" id="asal_kabkota">
            <option value="">Asal Tim</option>
                                                    <option value="Kabupaten Bandung">Kabupaten Bandung</option>
                                                    <option value="Kabupaten Bandung Barat">Kabupaten Bandung Barat</option>
                                                    <option value="Kabupaten Bekasi">Kabupaten Bekasi</option>
                                                    <option value="Kabupaten Bogor">Kabupaten Bogor</option>
                                                    <option value="Kabupaten Ciamis">Kabupaten Ciamis</option>
                                                    <option value="Kabupaten Cianjur">Kabupaten Cianjur</option>
                                                    <option value="Kabupaten Cirebon">Kabupaten Cirebon</option>
                                                    <option value="Kabupaten Garut">Kabupaten Garut</option>
                                                    <option value="Kabupaten Indramayu">Kabupaten Indramayu</option>
                                                    <option value="Kabupaten Karawang">Kabupaten Karawang</option>
                                                    <option value="Kabupaten Kuningan">Kabupaten Kuningan</option>
                                                    <option value="Kabupaten Majalengka">Kabupaten Majalengka</option>
                                                    <option value="Kabupaten Pangandaran">Kabupaten Pangandaran</option>
                                                    <option value="Kabupaten Purwakarta">Kabupaten Purwakarta</option>
                                                    <option value="Kabupaten Subang">Kabupaten Subang</option>
                                                    <option value="Kabupaten Sukabumi">Kabupaten Sukabumi</option>
                                                    <option value="Kabupaten Sumedang">Kabupaten Sumedang</option>
                                                    <option value="Kabupaten Tasikmalaya">Kabupaten Tasikmalaya</option>
                                                    <option value="Kota Bandung">Kota Bandung</option>
                                                    <option value="Kota Banjar">Kota Banjar</option>
                                                    <option value="Kota Bekasi">Kota Bekasi</option>
                                                    <option value="Kota Bogor">Kota Bogor</option>
                                                    <option value="Kota Cimahi">Kota Cimahi</option>
                                                    <option value="Kota Cirebon">Kota Cirebon</option>
                                                    <option value="Kota Depok">Kota Depok</option>
                                                    <option value="Kota Sukabumi">Kota Sukabumi</option>
                                                    <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
					</select>

			<label class="focus-label">Kabupaten/Kota</label>
		</div>
	</div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  

	<div class="col-sm-6 col-md-2">  
		<a href="peserta" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
	</div>   

</div>

<br>

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
                                                    <th>Logo</th>
                                                    <th>Tim Peserta</th>
         											<th>Medali</th>
                                                    <th>Atlit</th>
                                                    <th>Edit</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                            <td>{{ ++$key }}</td>
                                    
                                            <td>
                                            <a class="thumbnail" href="#"> <img class="img-responsive" src="{{ URL::to('/images/tim_peserta/'. $item->logo) }}" alt="{{ $item->asalkabkota }}" width="10%" height="20%"></a>
                                            <P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
                                            </td>

                                            <td>{{ $item->asal_kabkota }}</td>
        									
        									 <td>
                                            <a type="button" class="btn btn-info"  href="{{ url('admin/medali/lihat_medali/'.$item->id_data_peserta) }}"><i class="fa fa-diamond m-r-5"></i> Lihat Perolehan Medali</a>
                                            </td>

                                            <td>
                                            <a type="button" class="btn btn-success"  href="{{ url('admin/tim_peserta/lihat_atlit/data_atlit/'.$item->id_data_peserta) }}"><i class="fa fa-users m-r-5"></i> Lihat Atlit</a>
                                            </td>

											<td>
                                            <a type="button" class="btn btn-warning"  href="{{ url('admin/tim_peserta/edit_peserta/'.$item->id_data_peserta) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            
                                            <!-- <button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#update_cabor" class="edit-icon" 
                                            data-idcabor="{{$item->id_jenis_cabor}}"
                                            data-jenis="{{$item->jenis_olahraga}}"
                                            data-alamatt="{{$item->alamat}}"
                                            data-kapasitass="{{$item->kapasitas}}"
                                            data-keterangann="{{$item->keterangan}}"
                                            data-kordinatt="{{$item->kordinat}}"
                                            data-venue="{{ URL::to('/images/venue/'. $item->venue) }}"
                                            data-venue2="{{$item->venue}}"
                                            ><i class="fa fa-pencil"></i> Edit</a></button> -->

                                            <!-- <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_cabor" class="edit-icon" data-idcabor="{{$item->id_jenis_cabor}}"  data-jenis="{{$item->jenis_olahraga}}"  ><i class="fa fa-trash"></i> Delete</a></button> -->
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

    <div class="modal fade" id="add_peserta" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Data Peserta PORPROV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('savepeserta') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Asal TIM Peserta</label>
                                             <select class="form-control @error('role_name') is-invalid @enderror" data-live-search="true" name="asal_kabkota" id="asal_kabkota" required>
                                                    <option value="">Asal Tim Peserta</option>
                                                    <option value="Kabupaten Bandung">Kabupaten Bandung</option>
                                                    <option value="Kabupaten Bandung Barat">Kabupaten Bandung Barat</option>
                                                    <option value="Kabupaten Bekasi">Kabupaten Bekasi</option>
                                                    <option value="Kabupaten Bogor">Kabupaten Bogor</option>
                                                    <option value="Kabupaten Ciamis">Kabupaten Ciamis</option>
                                                    <option value="Kabupaten Cianjur">Kabupaten Cianjur</option>
                                                    <option value="Kabupaten Cirebon">Kabupaten Cirebon</option>
                                                    <option value="Kabupaten Garut">Kabupaten Garut</option>
                                                    <option value="Kabupaten Indramayu">Kabupaten Indramayu</option>
                                                    <option value="Kabupaten Karawang">Kabupaten Karawang</option>
                                                    <option value="Kabupaten Kuningan">Kabupaten Kuningan</option>
                                                    <option value="Kabupaten Majalengka">Kabupaten Majalengka</option>
                                                    <option value="Kabupaten Pangandaran">Kabupaten Pangandaran</option>
                                                    <option value="Kabupaten Purwakarta">Kabupaten Purwakarta</option>
                                                    <option value="Kabupaten Subang">Kabupaten Subang</option>
                                                    <option value="Kabupaten Sukabumi">Kabupaten Sukabumi</option>
                                                    <option value="Kabupaten Sumedang">Kabupaten Sumedang</option>
                                                    <option value="Kabupaten Tasikmalaya">Kabupaten Tasikmalaya</option>
                                                    <option value="Kota Bandung">Kota Bandung</option>
                                                    <option value="Kota Banjar">Kota Banjar</option>
                                                    <option value="Kota Bekasi">Kota Bekasi</option>
                                                    <option value="Kota Bogor">Kota Bogor</option>
                                                    <option value="Kota Cimahi">Kota Cimahi</option>
                                                    <option value="Kota Cirebon">Kota Cirebon</option>
                                                    <option value="Kota Depok">Kota Depok</option>
                                                    <option value="Kota Sukabumi">Kota Sukabumi</option>
                                                    <option value="Kota Tasikmalaya">Kota Tasikmalaya</option>
                                                </select>
                                                @error('asalkabkota')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" placeholder="Foto Logo" required>
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


<div class="modal fade" id="hapus_cabor" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Data Jenis Cabang Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deletecabor') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                        <input type="hidden" class="form-control" id="id_jenis_cabor" name="id_jenis_cabor" readonly required>
                        <input type="text" class="form-control" id="jenis_olahraga" name="jenis_olahraga" placeholder="Jenis Cabang Olahraga" required>
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


$('#hapus_cabor').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idcabor')
var Jenis = button.data('jenis')


var modal = $(this)
modal.find('.modal-body #id_jenis_cabor').val(ID)
modal.find('.modal-body #jenis_olahraga').val(Jenis)

})

</script>