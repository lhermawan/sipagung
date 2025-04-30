@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')
<div class="page-wrapper">
			
				<!-- Page Content -->
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Jenis Data Cabang Olahraga PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Jenis Cabang Olahraga PORPROV XIV</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_cabor" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah jenis Cabor Baru</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
						<!-- Search Filter -->
					

		<div class="row filter-row">

					
						
<div class="col-sm-6 col-md-2">  
<form class="form" method="get"> 

		<div class="form-group form-focus">
	
			<input type="text" value="{{ request('nama_jenis_cabor') }}"  class="form-control floating" id="nama_jenis_cabor" name="nama_jenis_cabor" placeholder="Masukkan No Telp">
			<label class="focus-label">Jenis Cabang Olahraga</label>
		</div>
	</div>

	<div class="col-sm-6 col-md-2">  
		<div class="form-group form-focus">
		
			<select name="id_jenis_cabor" value="{{ request('id_jenis_cabor') }}" class="form-control floating" id="id_jenis_cabor">
					<option value="">--Pilih Jenis Olahraga--</option>
                    @foreach ($cabor as $olahraga)
                        <option  value="{{$olahraga->id_jenis_cabor}}">{{$olahraga->jenis_olahraga}}</option>
                         @endforeach 
                         </select>

			<label class="focus-label">Status Akun</label>
		</div>
	</div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  

	<div class="col-sm-6 col-md-2">  
		<a href="jenis_cabang_olahraga" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
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
                                                    <th>Jenis Cabor</th>
                                                    <th>Cabang Olahraga</th>
                                                    <th>Kategori</th>

                                           
											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_jenis_cabor }}</td>
                                            <td>{{ $item->jenis_cabor->jenis_olahraga}}</td>
                                            <td>{{ $item->kategori->kategori}}</td>
                        
											<td class="text-right">
                                             <button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#update_cabor" class="edit-icon" 
                                            data-idcabor2="{{$item->id_jenis_cabor2}}"
                                            data-namajenis="{{$item->nama_jenis_cabor}}"
                                            data-idcabor="{{$item->jenis_cabor->id_jenis_cabor}}"
                                            data-idkate="{{$item->kategori->id_kategori}}"
                                            ><i class="fa fa-pencil"></i> Edit</a></button>
                                            

                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_cabor" class="edit-icon" data-idcabor="{{$item->id_jenis_cabor2}}"  data-jenis="{{$item->nama_jenis_cabor}}"  ><i class="fa fa-trash"></i> Delete</a></button>
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

    <div class="modal fade" id="add_cabor" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Data Jenis Cabang Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('savejeniscabor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                        <input type="text" class="form-control" id="nama_jenis_cabor" name="nama_jenis_cabor" placeholder="Nama Jenis Cabang Olahraga" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Cabang Olahraga</label>
                        <select class="form-control @error('id_jenis_cabor') is-invalid @enderror" name="id_jenis_cabor" id="id_jenis_cabor" required>
                        <option  value="">---Pilih Jenis Cabang Olahraga---</option>
                           @foreach ($cabor as $olahraga)
                               <option  value="{{$olahraga->id_jenis_cabor}}">{{$olahraga->jenis_olahraga}}</option>
                           @endforeach 
                           </select>
                             @error('id_jenis_cabor')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput2">Kategori</label>
                        <select class="form-control @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori" required>
                        <option  value="">---Pilih Jenis Kategori---</option>
                           @foreach ($kategori as $olahraga)
                               <option  value="{{$olahraga->id_kategori}}">{{$olahraga->kategori}}</option>
                           @endforeach 
                           </select>
                             @error('id_kategori')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
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
                <h5 class="modal-title" id="modalkdp">Hapus Data Cabang Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deletejeniscabor') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Cabang Olahraga</label>
                        <input type="hidden" class="form-control" id="id_jenis_cabor2" name="id_jenis_cabor2" readonly required>
                        <input type="text" class="form-control" id="nama_jenis_cabor" name="nama_jenis_cabor" placeholder="Jenis Cabang Olahraga" required>
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



<div class="modal fade" id="update_cabor" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Data Jenis Cabang Olahraga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('admin/jenis_cabor/Jeniscaborupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                        <input type="hidden" class="form-control" id="id_jenis_cabor2" name="id_jenis_cabor2" readonly required>
                        <input type="text" class="form-control" id="nama_jenis_cabor" name="nama_jenis_cabor" placeholder="Jenis Cabang Olahraga" required>
                    </div>

                   
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Olahraga</label>
                        <select name="id_jenis_cabor" class="form-control" id="id_jenis_cabor">
                        
                        @foreach($cabor as $olahraga)
                            @if (old('id') == $olahraga->id_jenis_cabor)
                                <option id="id_jenis_cabor" value="{{ $olahraga->id_jenis_cabor }}" selected>{{ $olahraga->jenis_olahraga }}</option>
                            @else
                                <option value="{{ $olahraga->id_jenis_cabor }}">{{ $olahraga->jenis_olahraga }}</option>
                            @endif
                        @endforeach 
                        </select>
                        
                             @error('id_jenis_cabor')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                    </div>


                    <div class="form-group">
                        <label for="formGroupExampleInput">Kategori</label>
                        <select name="id_kategori" class="form-control" id="id_kategori">
                        
                        @foreach($kategori as $olahraga)
                            @if (old('id') == $olahraga->id_kategori)
                                <option id="id_kategori" value="{{ $olahraga->id_kategori }}" selected>{{ $olahraga->kategori }}</option>
                            @else
                                <option value="{{ $olahraga->id_kategori }}">{{ $olahraga->kategori }}</option>
                            @endif
                        @endforeach 
                        </select>
                        
                             @error('id_kategori')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    @include('layouts/footer')




<script type="text/javascript">

$('#update_cabor').on('show.bs.modal', function (event) {

var button = $(event.relatedTarget)
var ID = button.data('idcabor2')
var IDCabor = button.data('idcabor')
var NamaJenis = button.data('namajenis')
var IDKate = button.data('idkate')


var modal = $(this)
modal.find('.modal-body #id_jenis_cabor2').val(ID)
modal.find('.modal-body #nama_jenis_cabor').val(NamaJenis)
modal.find('.modal-body #id_jenis_cabor').val(IDCabor)
modal.find('.modal-body #id_kategori').val(IDKate)



})


$('#hapus_cabor').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idcabor')
var Jenis = button.data('jenis')


var modal = $(this)
modal.find('.modal-body #id_jenis_cabor2').val(ID)
modal.find('.modal-body #nama_jenis_cabor').val(Jenis)

})

</script>