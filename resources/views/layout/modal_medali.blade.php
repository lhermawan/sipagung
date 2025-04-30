@foreach($data as $key => $item)
<div class="modal fade" id="medaliModal{{ $item->id_data_peserta }}" tabindex="-1" role="dialog" aria-labelledby="medaliModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="medaliModalLabel">Detail Rekap Perolehan Medali</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {{ csrf_field() }}
            <div class="modal-body">
				<div class="row">
					<div class="col-md-4 line-right center">

                         <img src="{{ URL::to('/images/tim_peserta/'. $item->data_peserta->logo) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0 item-center" >

					</div>
					<div class="col-md-8 biodata">

						<div class="row mt-2">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table class="table table-sm" id="list_nomor_cabor_detail" border="1" cellspacing="2" style="color:black">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-center" style="color:white" colspan="4">Medali Emas  <span ></span></th>

                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-center" style="color:white">No <span ></span></th>
                                                <th class="bg-primary" style="color:white">Cabang Olahraga  <span ></span></th>
                                                <th class="bg-primary" style="color:white">Atlet  <span ></span></th>
                                                <th class="bg-primary" style="color:white">Kategori  <span ></span></th>
                                            </tr>
                                        </thead>
                                        <tbody><tr>
                                            @php $no = 1; @endphp
                                            @foreach($data->where('id_data_peserta',$item->id_data_peserta)->where('jenis_medali', 'Emas' ) as $key => $item)
							<tr><td class="text-center">{{ $no++ }}</b></td>
                                <td style="">{{ $item->jenis_cabor->jenis_olahraga }}</b></td>
                                <td style="">{{ $item->nama_atlit }}</b></td>
                                <td style="">{{ $item->nomor_cabor }}</b></td>
                            </tr>
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

@foreach($data as $key => $item)
<div class="modal fade" id="medaliperakModal{{ $item->id_data_peserta }}" tabindex="-1" role="dialog" aria-labelledby="medaliModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="medaliModalLabel">Detail Medali</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {{ csrf_field() }}
            <div class="modal-body">
				<div class="row">
					<div class="col-md-4 line-right center">

                         <img src="{{ URL::to('/images/tim_peserta/'. $item->data_peserta->logo) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0 item-center" >

					</div>
					<div class="col-md-8 biodata">

						<div class="row mt-2">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table class="table table-sm" id="list_nomor_cabor_detail" border="1" cellspacing="2" style="color:black">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-center" style="color:white" colspan="4">Medali Perak  <span ></span></th>

                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-center" style="color:white">No <span ></span></th>
                                                <th class="bg-primary" style="color:white">Cabang Olahraga  <span ></span></th>
                                                <th class="bg-primary" style="color:white">Atlet  <span ></span></th>
                                                <th class="bg-primary" style="color:white">Kategori  <span ></span></th>
                                            </tr>
                                        </thead>
                                        <tbody><tr>
                                            @php $no = 1; @endphp
                                            @foreach($data->where('id_data_peserta',$item->id_data_peserta)->where('jenis_medali', 'Perak' ) as $key => $item)
							<tr><td class="text-center">{{ $no++ }}</b></td>
                                <td style="">{{ $item->jenis_cabor->jenis_olahraga }}</b></td>
                                <td style="">{{ $item->nama_atlit }}</b></td>
                                <td style="">{{ $item->nomor_cabor }}</b></td>
                            </tr>
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
@foreach($data as $key => $item)
<div class="modal fade" id="medaliperungguModal{{ $item->id_data_peserta }}" tabindex="-1" role="dialog" aria-labelledby="medaliModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="medaliModalLabel">Detail Medali</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            {{ csrf_field() }}
            <div class="modal-body">
				<div class="row">
					<div class="col-md-4 line-right center">

                         <img src="{{ URL::to('/images/tim_peserta/'. $item->data_peserta->logo) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0 item-center" >

					</div>
					<div class="col-md-8 biodata">

						<div class="row mt-2">
                            <div class="col-md-12">
                                <div class="table-responsive">

                                    <table class="table table-sm" id="list_nomor_cabor_detail" border="1" cellspacing="2" style="color:black">
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-center" style="color:white" colspan="4">Medali Perunggu  <span ></span></th>

                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <th class="bg-primary text-center" style="color:white">No <span ></span></th>
                                                <th class="bg-primary" style="color:white">Cabang Olahraga  <span ></span></th>
                                                <th class="bg-primary" style="color:white">Atlet  <span ></span></th>
                                                <th class="bg-primary" style="color:white">Kategori  <span ></span></th>
                                            </tr>
                                        </thead>
                                        <tbody><tr>
                                            @php $no = 1; @endphp
                                            @foreach($data->where('id_data_peserta',$item->id_data_peserta)->where('jenis_medali', 'Perunggu' ) as $key => $item)
							<tr><td class="text-center">{{ $no++ }}</b></td>
                                <td style="">{{ $item->jenis_cabor->jenis_olahraga }}</b></td>
                                <td style="">{{ $item->nama_atlit }}</b></td>
                                <td style="">{{ $item->nomor_cabor }}</b></td>
                            </tr>
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
