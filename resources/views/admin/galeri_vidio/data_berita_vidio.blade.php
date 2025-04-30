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
								<h3 class="page-title">Data Galeri Vidio PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Data Galeri Vidio PORPROV XIV</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <a href="{{ route('admin/galeri_vidio/tambah_berita_vidio') }}" class="btn add-btn"><i class="fa fa-plus"></i> Tambah Vidio</a>
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
                                                    <th>Nama Pengaupload</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal</th>
                                                    <th>Link URL</th>
                                           
											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_media }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ tanggal_indonesia($item->tanggal) }}</td>
											<td>{{ $item->url }}</td>
                                            
                        
											<td class="text-right">
                                            <a type="button" class="btn btn-warning"  href="{{ url('admin/galeri_vidio/edit_berita_vidio/'.$item->id_vidio_galeri) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    
                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_berita" class="edit-icon" data-idberita="{{$item->id_vidio_galeri}}" data-judul="{{$item->judul}}"><i class="fa fa-trash"></i> Hapus</a></button>
                                            </td>
										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>



<div class="modal fade" id="hapus_berita" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Galeri Vidio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteGaleri') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Apalah kamu yakin akan menghapus galeri vidio dengan judul tersebut?</label>
                        <input type="hidden" class="form-control" id="id_vidio_galeri" name="id_vidio_galeri" readonly required>
                        <input type="text" class="form-control" id="judul" name="judul"readonly required>
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


$('#hapus_berita').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idberita')
var Title = button.data('judul')


var modal = $(this)
modal.find('.modal-body #id_vidio_galeri').val(ID)
modal.find('.modal-body #judul').val(Title)

})

</script>