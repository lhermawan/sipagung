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
								<h3 class="page-title">Data Peserta Pertandingan  {{ $data2[0]->jenis_cabor2->jenis_cabor->jenis_olahraga }} / {{ $data2[0]->jenis_cabor2->nama_jenis_cabor }} / {{ $data2[0]->nama_series_atletik }}  PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="">Pertandingan {{ $data2[0]->jenis_cabor2->nama_jenis_cabor }} </a></li>
									<li class="breadcrumb-item active">{{ $data2[0]->nama_series_atletik }}</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" data-id="{{ $data2[0]->id_series_atletik }}" class="btn add-btn" data-toggle="modal" data-target="#add_peserta" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Peserta</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					

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
                                                    <th>Peserta</th>
                                                    <th>Asal</th>
                                                    <th>Hapus</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($atletik as $key => $item)
										<tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->atlit->nama_atlit }}</td>
                                            <td><span class="badge bg-success" style="font-size: 12px;">{{ $item->atlit->data_peserta->asal_kabkota }}</span></td>
                                            <td>
                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_peserta" class="edit-icon" data-id="{{$item->id_pertandingan_atletik}}"  data-name="{{$item->atlit->nama_atlit}}"  ><i class="fa fa-trash"></i> Delete</a></button>
                                            </td>
                                            
                                                
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>



                <div class="modal fade" id="hapus_peserta" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Peserta tersebut untuk kategori {{ $data2[0]->jenis_cabor2->jenis_cabor->jenis_olahraga }} / {{ $data2[0]->jenis_cabor2->nama_jenis_cabor }} / {{ $data2[0]->nama_series_atletik }} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deletePesertaAtletik') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_pertandingan_atletik" name="id_pertandingan_atletik" readonly required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nama"  readonly>
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
              
<div class="modal fade" id="add_peserta" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Peserta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('savePesertaAtletik') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    
                <input type="hidden" readonly class="form-control" id="id_series_atletik" name="id_series_atletik" required>
 
                <div class="form-check">
                        <label for="formGroupExampleInput2">Silahkan Pilih Peserta yang mengikuti {{ $data2[0]->jenis_cabor2->jenis_cabor->jenis_olahraga }} / {{ $data2[0]->jenis_cabor2->nama_jenis_cabor }} / {{ $data2[0]->nama_series_atletik }}: </label>
                        @foreach ($data3 as $peserta)
                    <div class="checkbox">
                        <label>
                        <input type="checkbox" class="form-check-input" name="id_atlit[]" value="{{$peserta->atlit->id_atlit}}"><label>{{$peserta->atlit->nama_atlit}} ({{$peserta->atlit->data_peserta->asal_kabkota}})</label><br/>
                        </label>
                     <div>
                @endforeach
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


<script type="text/javascript">

$('#add_peserta').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')


var modal = $(this)
modal.find('.modal-body #id_series_atletik').val(ID)

})


$('#edit_status_pertandingan').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var Nama = button.data('nama')


var modal = $(this)
modal.find('.modal-body #id_series_atletik').val(ID)
modal.find('.modal-body #nama_series').val(Nama)

})


$('#hapus_peserta').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('id')
var name = button.data('name')


var modal = $(this)
modal.find('.modal-body #id_pertandingan_atletik').val(ID)
modal.find('.modal-body #nama').val(name)

})

</script>
