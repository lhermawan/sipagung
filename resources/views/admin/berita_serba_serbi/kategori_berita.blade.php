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
								<h3 class="page-title">Kategori Berita Serba Serbi</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Kategori Berita</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <button type="button" class="btn add-btn" data-toggle="modal" data-target="#add_kategori" style="float: right;"><i class="bi bi-plus-lg"></i> Tambah Kategori Berita Baru</button>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					

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
                                                    <th>Kategori</th>
											        <th>Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                           
                        
											<td>
                                            <button type="button" class="btn btn-warning" href="#"  data-toggle="modal" data-target="#edit_kategori" class="edit-icon" data-idkate="{{$item->id_kategori_berita}}" data-nama="{{$item->nama_kategori}}"  ><i class="fa fa-edit"></i> Edit</a></button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus_kategori" class="edit-icon" data-idkate="{{$item->id_kategori_berita}}" data-nama="{{$item->nama_kategori}}"><i class="fa fa-trash"></i> Delete</a></button>
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

    <div class="modal fade" id="add_kategori" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Tambah Kategori Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('saveKategoriSerbaSerbi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>
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


<div class="modal fade" id="hapus_kategori" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deletekategoriserbaserbi') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Kategori</label>
                        <input type="text" class="form-control" id="id_kategori_berita" name="id_kategori_berita" readonly required>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" readonly required>
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

<div class="modal fade" id="edit_kategori" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Edit Data Kategori Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('update_kategori_serba_serbi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama Kategorii</label>
                        <input type="hidden" class="form-control" id="id_kategori_berita" name="id_kategori_berita" readonly required>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>
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



$('#hapus_kategori').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idkate')
var Nama = button.data('nama')


var modal = $(this)
modal.find('.modal-body #id_kategori_berita').val(ID)
modal.find('.modal-body #nama_kategori').val(Nama)

})

$('#edit_kategori').on('show.bs.modal', function (event) {


var button = $(event.relatedTarget)
var ID = button.data('idkate')
var Nama = button.data('nama')


var modal = $(this)
modal.find('.modal-body #id_kategori_berita').val(ID)
modal.find('.modal-body #nama_kategori').val(Nama)

})

</script>