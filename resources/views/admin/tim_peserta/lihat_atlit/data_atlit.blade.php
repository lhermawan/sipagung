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
								<h3 class="page-title">Data Atlet PORPROV XIV Asal {{$data[0]->asal_kabkota}}</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Peserta</a></li>
									<li class="breadcrumb-item active">Atlet PORPROV</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
								<a href="{{ url('admin/tim_peserta/lihat_atlit/tambah_atlit/'.$data[0]->id_data_peserta) }}" class="btn add-btn"><i class="fa fa-plus"></i> Tambah Atlet Baru</a>
							</div>
						</div>
					</div>
				
<div class="row filter-row">				
<div class="col-sm-6 col-md-2">  
<form class="form" method="get">

		<div class="form-group form-focus">
			<input type="text"  class="form-control floating" value="{{ request('nama_atlit') }}" id="nama_atlit" name="nama_atlit" placeholder="Masukan Nama Atlit">
			<label class="focus-label">Nama Atlet</label>
		</div>
	</div>

	<div class="col-sm-6 col-md-2">  
		<div class="form-group form-focus">
		
			<select name="jenis_kelamin" class="form-control floating" value="{{ request('jenis_kelamin') }}" id="jenis_kelamin">
					<option value="">--Pilih Jenis Kelamin--</option>
					<option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
					</select>

			<label class="focus-label">Jenis Kelamin</label>
		</div>
	</div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  

	<div class="col-sm-6 col-md-2">  
		<a href="{{ url('admin/tim_peserta/lihat_atlit/data_atlit/'.$data[0]->id_data_peserta) }}" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
	</div>   

</div>

<br>



					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-striped custom-table datatable">
									<thead>
										<tr>
                                        <th>NO</th>
                                                    <th>Foto Profile</th>
                                                    <th>Nama</th>
                                                    <th>Jenis Kelamin</th>
                                                    
                                                    <th>Cabang Olahraga</th>
                                           
											<th>Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($atlit as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
											<td>
                                            <a class="thumbnail" href="#"> <img class="img-responsive" src="{{ URL::to('/images/atlit/'. $item->avatar) }}" alt="{{ $item->nama_atlit }}" width="10%" height="20%"></a>
                                            <P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
											</td>
            
                                            <td>
                                            <span class="badge bg-success" style="font-size: 12px;">{{ $item->nama_atlit }}</span>
                                            </td>

											<td>{{ $item->jenis_kelamin }}</td>
                                           

                                            <td>
                                            <a type="button" class="btn btn-info"  href="{{ url('admin/tim_peserta/lihat_atlit/cabor_diikuti/'.$item->id_atlit) }}"><i class="fa fa-bars m-r-5"></i> Cabor Diikuti</a>
                                            </td>
										
											<td>
											<a type="button" class="btn btn-warning"  href="{{ url('admin/tim_peserta/lihat_atlit/edit_atlit/'.$item->id_atlit) }}"><i class="fa fa-pencil m-r-5"></i> Edit Atlet</a>
											<button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_atlit" class="edit-icon" data-idatlit="{{$item->id_atlit}}"  data-nama="{{$item->nama_atlit}}"  ><i class="fa fa-trash"></i> Delete Atlet</a></button>
                                             </td>


										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>


    <div class="modal fade" id="hapus_atlit" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Atlet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteatlit') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Atlet</label>
                        <input type="hidden" class="form-control" id="id_atlit" name="id_atlit" readonly required>
                        <input type="text" class="form-control" id="nama_atlit" name="nama_atlit" placeholder="nama_atlit" required readonly>
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

                <div class="modal fade" role="dialog" id="imgmodal">
    <div class="modal-dialog">
        <div class="modal-content"></div>          
                    <img class="img-responsive" src="" id="show-img" width="100%" height="100%" /> 
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
$('#hapus_atlit').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idatlit')
var Nama = button.data('nama')


var modal = $(this)
modal.find('.modal-body #id_atlit').val(ID)
modal.find('.modal-body #nama_atlit').val(Nama)

})

</script>