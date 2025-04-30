@foreach($data as $key => $item)
<div class="modal fade" id="atlet{{ $item->atlit->id_atlit }}Modal" tabindex="-1" role="dialog" aria-labelledby="atletikModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="atletikModalLabel">Detail Atlet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {{ csrf_field() }}
            <div class="modal-body">
				<div class="row">
					<div class="col-md-4 line-right center">

                         <img src="{{ URL::to('images/atlit/'. $item->atlit->avatar) }}" class="rounded-circle foto_atlet" width="250px" height="200px">

					</div>
					<div class="col-md-8 biodata">
						<ul>

							<li>Nama : <span class=" font-weight-bold" >{{ $item->atlit->nama_atlit }}</span></li>
							<li>Kelamin : <span class=" font-weight-bold" >{{ $item->atlit->jenis_kelamin }}</span></li>
						</ul>
						<div class="row mt-2">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-sm" id="list_nomor_cabor_detail" border="1" cellspacing="2" style="color:black">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary" style="color:white">CABANG OLAHRAGA : <span class="nama_cabor_detail">{{ $item->jenis_cabor->jenis_olahraga }}</span></th>
                                            </tr>
                                        </thead>
                                        <tbody><tr>
                                            @php $no = 1; @endphp
                                            @foreach($data->where('id_atlit', $item->atlit->id_atlit ) as $key => $item)
							<tr><td style="padding-left:35px">{{ $no++ }}.&nbsp;{{ $item->jenis_cabor2->nama_jenis_cabor }}</b></td></tr>
                            @endforeach
						</tr></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						<!-- <button class="btn" id="btn_download_idcard"><i class="fas fa-print"></i> Download ID Card</button> -->
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endforeach

 {{-- <div class="modal fade" id="atletModal" tabindex="-1" role="dialog"
 aria-labelledby="myModalLabel">
<div class="modal-dialog data-dialog-centerd" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">Model header Name</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="#"
                  method="post"
                  enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <span id="pass_nama" ></span>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> --}}
