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
								<h3 class="page-title">Cabang Olahraga Yang Diikuti Oleh {{$atlit[0]->nama_atlit}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Peserta</a></li>
									<li class="breadcrumb-item active">Asal Tim {{$atlit[0]->data_peserta->asal_kabkota}}</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" 
                            data-id="{{$atlit[0]->id_atlit}}"
                            data-target="#add_cabor_ikuti" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Cabang Olahraga Diikuti</button>
							</div>
						</div>
					</div>


					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                                    <th>NO</th>
                                                    <th>Cabang Olahraga</th>
                                                    <th>Jenis Cabang Olahraga</th>
                                                    <th>Kategori</th>
											        <th>Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                   
                                    @foreach ($data as $key => $item)
                                       
										<tr>
                                            <td>{{ ++$key }}</td>
											<td>{{ $item->jenis_cabor->jenis_olahraga }}</td>
                                            <td>{{ $item->jenis_cabor2->nama_jenis_cabor }}</td>
                                            <td>{{ $item->jenis_cabor2->kategori->kategori }}</td>
                                            
										
											<td>
											<button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#edit_cabor_ikuti" class="edit-icon" data-idcabor="{{$item->id_cabor_diikuti}}"  data-idatlit="{{$item->id_atlit}}" data-idjenis="{{$item->jenis_cabor->id_jenis_cabor}}" data-idjenis2="{{$item->jenis_cabor2->id_jenis_cabor2}}"  ><i class="fa fa-pencil"></i> Edit</a></button>
											<button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_cabor_ikuti" class="edit-icon" data-idcabor="{{$item->id_cabor_diikuti}}"  data-nama="{{$item->nama_atlit}}"  ><i class="fa fa-trash"></i> Delete</a></button>
                                             </td>


										</tr>
                                       
                                       
                                        @endforeach
                                           
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>

<div class="modal fade" id="add_cabor_ikuti" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Cabang Olaharag Peserta PORPROV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveCaborDiikuti') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  
                       
                        <input type="hidden" class="form-control" id="id_atlit" name="id_atlit" readonly required>              
                   
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
                    <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                    <select class="form-control @error('id_jenis_cabor2') is-invalid @enderror" name="id_jenis_cabor2" id="id_jenis_cabor2" required>
                                                        <option value="">---Pilih Jenis Cabang Olahraga---</option>
                                                </select>
                                                @error('id_jenis_cabor2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                     </div>

                    <div class="form-group">
                    <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                    <select class="form-control @error('id_jenis_cabor2') is-invalid @enderror" id="id_kategori" required>
                                                        <option value="">---Pilih Jenis Cabang Olahraga---</option>
                                                </select>
                                                @error('id_jenis_cabor2')
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
                <h5 class="modal-title" id="modalkdp">Edit Cabang Olahraga Peserta PORPROV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('updateCaborDiikuti') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  
                       
                    <input type="hidden" class="form-control" id="id_atlit" name="id_atlit" readonly required>              
                    <input type="hidden" class="form-control" id="id_cabor_diikuti" name="id_cabor_diikuti" readonly required>
                 
                   
                    <div class="form-group">
                    <label for="formGroupExampleInput">Cabang Olahraga</label>
                    <select name="id_jenis_cabor" class="form-control" id="id_jenis_cabor3">
                        <option value="">---Pilih Cabang Olahraga---</option>
                        @foreach ($cabor as $caborr)
                            @if (old('id') == $caborr->id_jenis_cabor)
                                <option id="id_jenis_cabor3" value="{{ $caborr->id_jenis_cabor }}" selected>{{ $caborr->id_jenis_cabor }}</option>
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
                    <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                    <select class="form-control @error('id_jenis_cabor4') is-invalid @enderror" name="id_jenis_cabor2" id="id_jenis_cabor4" required>
                                                        <option value="">---Pilih Jenis Cabang Olahraga---</option>
                                                </select>
                                                @error('id_jenis_cabor4')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                     </div>

                     div class="form-group">
                    <label for="formGroupExampleInput">Jenis Cabang Olahraga</label>
                    <select class="form-control @error('id_jenis_cabor2') is-invalid @enderror" id="id_kategori4" required>
                                                        <option value="">---Pilih Jenis Cabang Olahraga---</option>
                                                </select>
                                                @error('id_kategori4')
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
                <h5 class="modal-title" id="modalkdp">Hapus Cabang Olahraga Peserta PORPROV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteCaborDiikuti') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                       
                        <input type="hidden" class="form-control" id="id_cabor_diikuti" name="id_cabor_diikuti" readonly required>
                       
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


    
<script type="text/javascript">
$('#add_cabor_ikuti').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_atlit').val(ID)

})

$('#edit_cabor_ikuti').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idcabor')
var Idatlit = button.data('idatlit')
var Jenis = button.data('idjenis')
var Jenis2 = button.data('idjenis2')



var modal = $(this)
modal.find('.modal-body #id_cabor_diikuti').val(ID)
modal.find('.modal-body #id_atlit').val(Idatlit)
modal.find('.modal-body #id_jenis_cabor3').val(Jenis)
modal.find('.modal-body #id_jenis_cabor4').val(Jenis2)
})


$('#hapus_cabor_ikuti').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idcabor')


var modal = $(this)
modal.find('.modal-body #id_cabor_diikuti').val(ID)

})

</script>


<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
  <script>
    $('#id_jenis_cabor').change(function(){
    var id_jenis_cabor = $(this).val();
    if(id_jenis_cabor ){
        $.ajax({
           type:"GET",
           url:"/getJenisCabor2?id_jenis_cabor="+id_jenis_cabor,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#id_jenis_cabor2").empty();
                $("#id_kategori").empty();
                $("#id_jenis_cabor2").append('<option>---Sekarang Silahkan Pilih Jenis Cabang Olahraga---</option>');
                $("#id_kategori").append('<option>---Pilih Kategori---</option>');
                $.each(res,function(nama,kode){
                    $("#id_jenis_cabor2").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#id_jenis_cabor2").empty();
               $("#id_kategori").empty();
            }
           }
        });
    }else{
        $("#id_jenis_cabor2").empty();
        $("#id_kategori").empty();
    }
   });

   $('#id_jenis_cabor2').change(function(){
    var id_jenis_cabor2 = $(this).val();    
    if(id_jenis_cabor2){
        $.ajax({
           type:"GET",
           url:"/getKategori?id_jenis_cabor2="+id_jenis_cabor2,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#id_kategori").empty();
                $("#id_kategori").append('<option>---Pilih kategori---</option>');
                $.each(res,function(nama,kode){
                    $("#id_kategori").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#id_kategori").empty();
            }
           }
        });
    }else{
        $("#id_kategori").empty();
    }      
   });

</script>


<script>
    $('#id_jenis_cabor3').change(function(){
    var id_jenis_cabor3 = $(this).val();
    if(id_jenis_cabor3 ){
        $.ajax({
           type:"GET",
           url:"/getJenisCabor2?id_jenis_cabor="+id_jenis_cabor3,
           dataType: 'JSON',
           success:function(res){
            if(res){
                $("#id_jenis_cabor4").empty();
                $("#id_kategori4").empty();
                $("#id_jenis_cabor4").append('<option>---Sekarang Silahkan Pilih Jenis Cabang Olahraga---</option>');
                $("#id_kategori4").append('<option>---Pilih Kategori---</option>');
                $.each(res,function(nama,kode){
                    $("#id_jenis_cabor4").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#id_jenis_cabor4").empty();
               $("#id_kategori4").empty();
            }
           }
        });
    }else{
        $("#id_jenis_cabor4").empty();
        $("#id_kategori4").empty();
    }
   });

   $('#id_jenis_cabor4').change(function(){
    var id_jenis_cabor4 = $(this).val();    
    if(id_jenis_cabor4){
        $.ajax({
           type:"GET",
           url:"/getKategori?id_jenis_cabor2="+id_jenis_cabor4,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#id_kategori4").empty();
                $("#id_kategori4").append('<option>---Pilih kategori---</option>');
                $.each(res,function(nama,kode){
                    $("#id_kategori4").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#id_kategori4").empty();
            }
           }
        });
    }else{
        $("#id_kategori4").empty();
    }      
   });

</script>