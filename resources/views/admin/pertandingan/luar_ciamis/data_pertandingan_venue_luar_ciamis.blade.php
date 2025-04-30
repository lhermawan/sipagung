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
								<h3 class="page-title">Data Pertandingan PORPROV Luar Venue Ciamis XIV</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href=""></a></li>
									<li class="breadcrumb-item active">Pertandingan PORPROV Luar Venue Ciamis XIV</li>
								</ul>
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
                                                    <th>Cabang Olahraga</th>
                                                    <th>Pertandingan</th>
										</tr>
									</thead>
									<tbody>
                             
                                    @foreach ($data as $key => $item)
										<tr>
                                        <td>{{ ++$key }}</td>
                                            <td>{{ $item->jenis_olahraga }}</td>
                                            @if($item->id_jenis_cabor == "1")
                                            <td><a type="button" hidden class="btn btn-info"   href="{{ url('admin/pertandingan/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

                                            @if($item->id_jenis_cabor == "2")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/bmx/lihat_pertandingan_bmx/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "3")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/muaythai/lihat_pertandingan_muaythai/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "4")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/atletik/lihat_pertandingan_atletik/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "5")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/soft_tenis/lihat_pertandingan_soft_tenis/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "6")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/tenis_meja/lihat_pertandingan_tenis_meja/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "7")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/pentaque/lihat_pertandingan_pentaque/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            @endif

											@if($item->id_jenis_cabor == "8")
                                            <td><a type="button" hidden class="btn btn-info"  href="{{ url('admin/pertandingan/wushu/lihat_pertandingan_wushu/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "9")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "10")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "11")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "12")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "13")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                        
                                            @if($item->id_jenis_cabor == "14")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "15")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "16")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "17")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "18")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "19")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "20")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif


                                            @if($item->id_jenis_cabor == "21")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif


                                            @if($item->id_jenis_cabor == "22")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "23")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            @if($item->id_jenis_cabor == "24")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif


                                            @if($item->id_jenis_cabor == "25")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "26")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "27")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "28")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "29")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "30")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "31")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "32")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "33")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                            
                                            @if($item->id_jenis_cabor == "34")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif


                                            
                                            @if($item->id_jenis_cabor == "35")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif


                                            @if($item->id_jenis_cabor == "36")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif
											@if($item->id_jenis_cabor == "37")
                                            <td><a type="button" class="btn btn-info"  href="{{ url('admin/pertandingan/luar_ciamis/lihat_pertandingan/'.$item->id_jenis_cabor) }}"><i class="fa fa-eye m-r-5"></i> Lihat</a></td>
                                            
                                            @endif

                                        
                                            

										</tr>
                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>

    @include('layouts/footer')
