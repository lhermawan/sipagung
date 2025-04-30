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
								<h3 class="page-title">Perolehan Medali Asal Tim {{$data1[0]->asal_kabkota}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a>Perolehan Medali</li>
									<li class="breadcrumb-item active">{{$data1[0]->asal_kabkota}}</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" 
                            data-id="{{$data1[0]->id_data_peserta}}"
                            data-target="#add_cabor_ikuti" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Perolahan Medali</button>
							</div>
						</div>
					</div>


                    
						<!-- Search Filter -->
					

                        <div class="row filter-row">
        <div class="col-sm-6 col-md-2">  
            <form class="form" method="get">
                    <div class="form-group form-focus">
                        <select value="{{ request('medali') }}"  name="medali" class="form-control floating" id="medali">
                            <option value="">--Cari Medali--</option>
                            <option value="Emas">Emas</option>
                            <option value="Perak">Perak</option>
                            <option value="Perunggu">Perunggu</option>
                        </select>
                        <label class="focus-label">Medali</label>
                    </div>
                </div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  
                        
                        
                        <div class="col-sm-6 col-md-2">  
                            <a href="{{ url('admin/medali/lihat_medali/'.$data1[0]->id_data_peserta) }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
                        </div>   

                    </div>

<!-- /Search Filter -->


					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Jenis Cabang Olahraga</th>
                                                    <th>Nomor Cabang Olahraga</th>
                                                    <th>Nama Atlit</th>
                                                    <th>Jenis Medali</th>
											        <th>Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                   
                                    @foreach ($data as $key => $item)
                                       
										<tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->jenis_cabor->jenis_olahraga }}</td>
                                            <td>{{ $item->nomor_cabor }}</td>
                                            <td>{{ $item->nama_atlit }}</td>
                                            

                                            @if($item->jenis_medali == "Emas")
                                            <td><span class="badge bg-success" style="font-size: 12px;color:white">{{ $item->jenis_medali }}</span></td>
                                            @endif

                                            @if($item->jenis_medali == "Perak")
                                            <td><span class="badge bg-info" style="font-size: 12px;color:white">{{ $item->jenis_medali }}</span></td>
                                            @endif

                                            @if($item->jenis_medali == "Perunggu")
                                            <td><span class="badge bg-secondary" style="font-size: 12px;color:white">{{ $item->jenis_medali }}</span></td>
                                            @endif
                                            											<td>
											<button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#edit_cabor_ikuti" class="edit-icon" data-idmedali="{{$item->id_medali}}"  data-nama="{{$item->nama_atlit}}" data-nomor="{{$item->nomor_cabor}}"  data-idjenis="{{$item->jenis_cabor->id_jenis_cabor}}" data-medali="{{$item->jenis_medali}}"  ><i class="fa fa-pencil"></i> Edit</a></button>
											<button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_cabor_ikuti" class="edit-icon" data-idmedali="{{$item->id_medali}}"  data-nama="{{$item->nama_atlit}}"  ><i class="fa fa-trash"></i> Delete</a></button>
                                             </td>


										</tr>
                                       
                                       
                                        @endforeach
                                       
                                           
									</tbody>
								</table>
                                
                                <table>
                                <tr>
                                            <th>
                                                Jumlah Perolehan Emas
                                            </th>
                                                <td>
                                                <span class="badge bg-success" style="font-size: 17px;color:white">{{$jumlah_emas}}</span>
                                                </td>
                                        </tr>
                                

                                        <tr>
                                            <th>
                                                Jumlah Perolehan Perak
                                            </th>
                                                <td>
                                                <span class="badge bg-info" style="font-size: 17px;color:white">{{$jumlah_perak}}</span>
                                                </td>
                                        </tr>

                         
                                        <tr>
                                            <th>
                                                Jumlah Perolehan Perunggu
                                            </th>
                                                <td>
                                                <span class="badge bg-secondary" style="font-size: 17px;color:white">{{$jumlah_perunggu}}</span>
                                                </td>
                                        </tr>

                                        <tr>
                                            <th>
                                                Total Keseluruhan Perolehan Medali
                                            </th>
                                                <td>
                                                <span class="badge bg-danger" style="font-size: 17px;color:white">{{$total_medali}}</span>
                                                </td>
                                        </tr>

                                </table>
							</div>
						</div>
					</div>
                </div>

<div class="modal fade" id="add_cabor_ikuti" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Pemenang Medali PORPROV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveMedali') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  
                       
                    <input type="hidden" class="form-control" id="id_data_peserta" name="id_data_peserta" readonly required>              
                   
                    <div class="form-group">
                    <label for="formGroupExampleInput">Cabang Olahraga</label>
                    <select class="form-control @error('id_jenis_cabor') is-invalid @enderror" name="id_jenis_cabor" id="id_jenis_cabor" required>
                                                    <option value="">---Pilih Cabang Olahraga---</option>
                                                    @foreach ($cabor as $caborr)
                                                        <option  value="{{$caborr->id_jenis_cabor}}">{{$caborr->jenis_olahraga}}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_jenis_cabor')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                     </div>

                    <div class="form-group">
                    <label for="formGroupExampleInput">Nomor Cabang Olahraga</label>
                    <input type="text" class="form-control" id="nomor_cabor" name="nomor_cabor" placeholder="Contoh: Lari 100 Meter" required> 
                      @error('nomor_cabor')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     </div>

                     <div class="form-group">
                    <label for="formGroupExampleInput">Nama Atlit (Diisi Jika Kategorinya Single/Ganda/Triple. Jika kategorinya Team Isi Dengan Team Putra atau Putri)</label>
                    <textarea class="form-control" name="nama_atlit" placeholder="Contoh: Nama A, Nama B, Nama C, Nama D."></textarea>
                      @error('nama_atlit')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     </div>

                    <div class="form-group">
                    <label for="formGroupExampleInput">Jenis Medali</label>
                    <select class="form-control @error('jenis_medali') is-invalid @enderror" name="jenis_medali" id="jenis_medali" required>
                                                    <option value="">---Pilih Perolehan Medali---</option>
                                                        <option value="Emas">Emas</option>
                                                        <option value="Perak">Perak</option>
                                                        <option value="Perunggu">Perunggu</option>
                                                </select>
                                                @error('jenis_medali')
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


<div class="modal fade" id="edit_cabor_ikuti" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Perolehan Medali</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateMedali') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  
                       
                    <input type="hidden" class="form-control" id="id_medali" name="id_medali" readonly required>              
                 
                   
                    <div class="form-group">
                    <label for="formGroupExampleInput">Cabang Olahraga</label>
                    <select name="id_jenis_cabor" class="form-control" id="id_jenis_cabor">
                        <option value="">---Pilih Cabang Olahraga---</option>
                        @foreach ($cabor as $caborr)
                            @if (old('id') == $caborr->id_jenis_cabor)
                                <option id="id_jenis_cabor" value="{{ $caborr->id_jenis_cabor }}" selected>{{ $caborr->id_jenis_cabor }}</option>
                            @else
                                <option value="{{ $caborr->id_jenis_cabor }}">{{ $caborr->jenis_olahraga }} </option>
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
                    <label for="formGroupExampleInput">Nomor Cabang Olahraga</label>
                    <input type="text" class="form-control" id="nomor_cabor" name="nomor_cabor" placeholder="Contoh: Lari 100 Meter" required> 
                      @error('nomor_cabor')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     </div>

                     <div class="form-group">
                    <label for="formGroupExampleInput">Nama Atlit (Diisi Jika Kategorinya Single/Ganda/Triple. Jika kategorinya Team Isi Dengan Team Putra atau Putri)</label>
                    <textarea class="form-control" id="nama_atlit" name="nama_atlit" placeholder="Contoh: Nama A, Nama B, Nama C, Nama D."></textarea>
                      @error('nama_atlit')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                     </div>

                    <div class="form-group">
                    <label for="formGroupExampleInput">Jenis Medali</label>
                    <select class="form-control @error('jenis_medali') is-invalid @enderror" name="jenis_medali" id="jenis_medali" required>
                                                    <option value="">---Pilih Perolehan Medali---</option>
                                                        <option value="Emas">Emas</option>
                                                        <option value="Perak">Perak</option>
                                                        <option value="Perunggu">Perunggu</option>
                                                </select>
                                                @error('jenis_medali')
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

    <div class="modal fade" id="hapus_cabor_ikuti" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteMedali') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_medali" name="id_medali" readonly required>
                    </div>
                    <h4> Hapus data tersebut ?</h4>

                  
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


    
<script type="text/javascript">
$('#add_cabor_ikuti').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_data_peserta').val(ID)

})

$('#edit_cabor_ikuti').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idmedali')
var IDJenis = button.data('idjenis')
var Nama = button.data('nama')
var Nomor = button.data('nomor')
var Medali = button.data('medali')



var modal = $(this)
modal.find('.modal-body #id_medali').val(ID)
modal.find('.modal-body #id_jenis_cabor').val(IDJenis)
modal.find('.modal-body #nama_atlit').val(Nama)
modal.find('.modal-body #nomor_cabor').val(Nomor)
modal.find('.modal-body #jenis_medali').val(Medali)
})


$('#hapus_cabor_ikuti').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idmedali')


var modal = $(this)
modal.find('.modal-body #id_medali').val(ID)

})

</script>