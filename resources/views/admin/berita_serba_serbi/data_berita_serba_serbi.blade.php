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
								<h3 class="page-title">Data Berita Serba Serbi PORPROV XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Berita Serba Serbi PORPROV XIV</li>
								</ul>
							</div>
							<div class="col-auto float-right ml-auto">
                            <a href="{{ route('admin/berita_serba_serbi/tambah_berita_serba_serbi') }}" class="btn add-btn"><i class="fa fa-plus"></i> Tambah Berita</a>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					
						<!-- Search Filter -->
					
<!-- 
		<div class="row filter-row">

					
						
<div class="col-sm-6 col-md-2">  
<form class="form" method="get" action="">

		<div class="form-group form-focus">
	
			<input type="number"  class="form-control floating" id="telp" name="telp" placeholder="Masukkan No Telp">
			<label class="focus-label">Nomer Telepon/Hp</label>
		</div>
	</div>

	<div class="col-sm-6 col-md-2">  
		<div class="form-group form-focus">
		
			<select name="status_akun" class="form-control floating" id="status_akun">
					<option value="">--Pilih Status Akun--</option>
					<option value="Active">Active</option>
                    <option value="Disable">Disable</option>
					</select>

			<label class="focus-label">Status Akun</label>
		</div>
	</div>




	<div class="col-sm-6 col-md-1">  
		<button type="submit" class="btn btn-success btn-block"> Cari </a></button>
	</div>   
	</form>  

	<div class="col-sm-6 col-md-2">  
		<a href="user/management" button type="submit" class="btn btn-info btn-block"> Refresh </a></button>
	</div>   

</div>

<br> -->

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
                                                    <th>Judul Berita</th>
                                                    <th>Foto Berita</th>
                                                    
                                                    <th>Tanggal Waktu</th>
                                                    <th>Status Posting</th>
                                                    <th> Lihat Berita</th>
                                           
											<th class="text-right">Edit Delete</th>
										</tr>
									</thead>
									<tbody>
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->kategori_berita_serba_serbi->nama_kategori }}</td>
                                            <td>{{ $item->title }}</td>
                                           

                                            <td>
                                            <a class="thumbnail" href="#"> <img class="img-responsive" src="{{ URL::to('/images/berita_serba_serbi/'. $item->avatar) }}" alt="{{ $item->title }}" width="10%" height="20%"></a>
                                            <P style="color:red;">(Klik Gambar Untuk Memperbesar)</p>
                                            </td>

                                            <td>{{ tanggal_indonesia($item->tanggal) }} {{ $item->waktu }}</td>
											<td>{{ $item->post_status }}</td>

                                            <td>
                                            <a type="button" class="btn btn-info" target="_BLANK" href="{{ url('news/detail_serba_serbi/'.$item->title_slug) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a>
                                            </td>
                                            
                        
											<td class="text-right">
                                            <a type="button" class="btn btn-warning"  href="{{ url('admin/berita_serba_serbi/edit_berita_serba_serbi/'.$item->id_berita) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                            <button type="button" class="btn btn-danger" href="#"  data-toggle="modal" data-target="#hapus_berita" class="edit-icon" data-idberita="{{$item->id_berita}}" data-title="{{$item->title}}"><i class="fa fa-trash"></i> Hapus</a></button>
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
              

    

<div class="modal fade" id="hapus_berita" tabindex="-1" aria-labelledby="modalkdp" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalkdp">Hapus Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
            <form action="{{ route('deleteberitaserbaserbi') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                    <div class="form-group">
                        <label for="formGroupExampleInput">Apalah kamu yakin akan menghapus berita dengan judul tersebut?</label>
                        <input type="hidden" class="form-control" id="id_berita" name="id_berita" readonly required>
                        <input type="text" class="form-control" id="title" name="title"readonly required>
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
var Title = button.data('title')


var modal = $(this)
modal.find('.modal-body #id_berita').val(ID)
modal.find('.modal-body #title').val(Title)

})

</script>