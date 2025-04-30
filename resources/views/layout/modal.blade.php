<div class="modal fade" id="atletikModal" tabindex="-1" role="dialog" aria-labelledby="atletikModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="atletikModalLabel">Cabang Olahraga Atletik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser" class="tab-pane active">
                                        <video width="100%" height="100%" autoplay muted loop controls>
										  	<source src="{{URL::to('asset/video/infografis/Atletik.mp4') }}" type="video/mp4">
										</video>
                                </div>
                                <div id="kategori" class="tab-pane ">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "4")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                            </div>
                                <div id="jadwal" class="tab-pane">
                                    <div class="row mt-5">
                                        <div class="col">
                                            <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                                <h2 class="text-center"> <span class="inverted">Stadion Prabu Lingga Buana</span></h2><br>
                                                <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">08 November 2022 - 18 November 2022</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="ms-content">
                                                @foreach($atletik as $s)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>
                                                <section class="call-to-action call-to-action-dark mb-5">
                                                    <div class="col-sm-12 col-lg-9">
                                                        <div class="call-to-action-content">
                                                            <h3>{{ $s->nama_series_atletik }} </h3>
                                                            <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($s->tanggal) }} / {{ $s->waktu }} WIB</p>
                                                        </div>
                                                    </div>

                                                </section>
                                                @endforeach

                                                @foreach($atletik_berlangsung as $s)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>
                                                <section class="call-to-action call-to-action-dark mb-5">
                                                    <div class="col-sm-9 col-lg-9">
                                                        <div class="call-to-action-content">
                                                            <h3>{{ $s->nama_series_atletik }} </h3>
                                                            <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($s->tanggal) }} / {{ $s->waktu }} WIB</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-lg-3">
                                                         @if($s->link_streaming == "-")
                                                                    <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$s->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif
                                                    </div>
                                                    </div>
                                                </section>
                                                @endforeach

                                                @foreach($atletik_selesai as $s)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>

                                                    <div class="table-responsive">

                                                        <table id="table_list" class="table table-striped table-hover table-bordered ">

                                                            <thead class="thead-dark">
                                                                <h5 class="font-weight-extra-bold" style=" color: rgb(0, 0, 0); ">Hasil Pertandingan {{ $s->nama_series_atletik }}</h5>
                                                                <tr>
                                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                                    <th class="left" style="vertical-align:middle" width="20%">Nama Atlit</th>
                                                                    <th class="left" style="vertical-align:middle" width="20%">Kabupaten/Kota</th>
                                                                    <th class="text-center" style="vertical-align:middle" width="10%">Skor</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>

                                                                    <td class="text-center">1</td>
                                                                    <td class="left">

                                                                    &nbsp;&nbsp;{{ $s->atletik_menang1->nama_atlit }}</td>
                                                                    <td class="left">

                                                                        &nbsp;&nbsp;{{ $s->atletik_menang1->data_peserta->asal_kabkota }}</td>
                                                                    <td class="text-center" style="font-size:16px">
                                                                        {{ $s->skor_pemenang1 }}
                                                                    </td>

                                                                </tr>
                                                                <tr>

                                                                    <td class="text-center">2</td>
                                                                    <td class="left">

                                                                    </a>&nbsp;&nbsp;{{ $s->atletik_menang2->nama_atlit }}</td>
                                                                    <td class="left">

                                                                        &nbsp;&nbsp;{{ $s->atletik_menang2->data_peserta->asal_kabkota }}</td>
                                                                    <td class="text-center" style="font-size:16px">
                                                                        {{ $s->skor_pemenang2 }}
                                                                    </td>

                                                                </tr>
                                                                <tr>

                                                                    <td class="text-center">3</td>
                                                                    <td class="left">

                                                                    </a>&nbsp;&nbsp;{{ $s->atletik_menang3->nama_atlit }}</td>
                                                                    <td class="left">

                                                                        &nbsp;&nbsp;{{ $s->atletik_menang3->data_peserta->asal_kabkota }}</td>
                                                                    <td class="text-center" style="font-size:16px">
                                                                        {{ $s->skor_pemenang3 }}
                                                                    </td>

                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bmxModal" tabindex="-1" role="dialog" aria-labelledby="bmxModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="bmxModalLabel">Cabang Olahraga BMX</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser1" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori1" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal1" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali1" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser1" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/BMX.mp4') }}" type="video/mp4">
                                    </video>
                            </div>
                                <div id="kategori1" class="tab-pane ">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "2")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="jadwal1" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">Sirkuit BMX Ciamis</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">08 November 2022 - 10 November 2022</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">

                                                @foreach($bmx as $s)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>
                                                <section class="call-to-action call-to-action-dark mb-5">
                                                    <div class="col-sm-12 col-lg-9">
                                                        <div class="call-to-action-content">
                                                            <h3>{{ $s->nama_series_bmx }} </h3>
                                                            <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($s->tanggal) }} / {{ $s->waktu }} WIB</p>
                                                        </div>
                                                    </div>

                                                </section>
                                                @endforeach

                                                @foreach($bmx_berlangsung as $s)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>
                                                <section class="call-to-action call-to-action-dark mb-5">
                                                    <div class="col-sm-9 col-lg-9">
                                                        <div class="call-to-action-content">
                                                            <h3>{{ $s->nama_series_bmx }} </h3>
                                                            <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($s->tanggal) }} / {{ $s->waktu }} WIB</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-lg-3">
                                                        @if($s->link_streaming == "-")
                                                                    <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$s->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif
                                                    </div>
                                                </section>
                                                @endforeach

                                                @foreach($bmx_selesai as $s)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>

                                                    <div class="table-responsive">

                                                        <table id="table_list" class="table table-striped table-hover table-bordered ">

                                                            <thead class="thead-dark">
                                                                <h5 class="font-weight-extra-bold" style=" color: rgb(0, 0, 0); ">Hasil Pertandingan {{ $s->nama_series_bmx }}</h5>
                                                                <tr>
                                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                                    <th class="left" style="vertical-align:middle" width="20%">Nama Atlit</th>
                                                                    <th class="left" style="vertical-align:middle" width="20%">Kabupaten/Kota</th>
                                                                    <th class="text-center" style="vertical-align:middle" width="10%">Skor</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>

                                                                    <td class="text-center">1</td>
                                                                    <td class="left">

                                                                    &nbsp;&nbsp;{{ $s->bmx_menang1->nama_atlit }}</td>
                                                                    <td class="left">

                                                                        &nbsp;&nbsp;{{ $s->bmx_menang1->data_peserta->asal_kabkota }}</td>
                                                                    <td class="text-center" style="font-size:16px">
                                                                        {{ $s->skor_pemenang1 }}
                                                                    </td>

                                                                </tr>
                                                                <tr>

                                                                    <td class="text-center">2</td>
                                                                    <td class="left">

                                                                    </a>&nbsp;&nbsp;{{ $s->bmx_menang2->nama_atlit }}</td>
                                                                    <td class="left">

                                                                        &nbsp;&nbsp;{{ $s->bmx_menang2->data_peserta->asal_kabkota }}</td>
                                                                    <td class="text-center" style="font-size:16px">
                                                                        {{ $s->skor_pemenang2 }}
                                                                    </td>

                                                                </tr>
                                                                <tr>

                                                                    <td class="text-center">3</td>
                                                                    <td class="left">

                                                                    </a>&nbsp;&nbsp;{{ $s->bmx_menang3->nama_atlit }}</td>
                                                                    <td class="left">

                                                                        &nbsp;&nbsp;{{ $s->bmx_menang3->data_peserta->asal_kabkota }}</td>
                                                                    <td class="text-center" style="font-size:16px">
                                                                        {{ $s->skor_pemenang3 }}
                                                                    </td>

                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali1" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="muaythaiModal" tabindex="-1" role="dialog" aria-labelledby="muaythaiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="muaythaiModalLabel">Cabang Olahraga Muay Thai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser2" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori2" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal2" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali2" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser2" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/Muaythai.mp4') }}" type="video/mp4">
                                    </video>
                            </div>
                                <div id="kategori2" class="tab-pane ">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "3")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="jadwal2" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">Gelanggang Galuh Taruna</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">16 November 2022 - 17 November 2022</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">
                                                @foreach($muaythai as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit1->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->atlit1->data_peserta->asal_kabkota }}</h6><br>{{$p->atlit1->nama_atlit }}
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>{{$p->jenis_cabor2->nama_jenis_cabor }}
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta2 }}</h4>
                                                                    <div class="mc-op">{{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit2->data_peserta->logo) }}" alt="">
                                                                    <h6>{{ $p->atlit2->data_peserta->asal_kabkota }}</h6><br>{{$p->atlit2->nama_atlit }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach
                                                @foreach($muaythai_berlangsung as $p)
                								<h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>

                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit1->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->atlit1->data_peserta->asal_kabkota }}</h6><br>{{$p->atlit1->nama_atlit }}
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>{{$p->jenis_cabor2->nama_jenis_cabor }}
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta2 }}</h4>
                                                                    <div class="mc-op">{{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>
                                                                    @if($p->link_streaming == "-")
                                                                    <div class="mc-op">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="mc-op"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif
                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit2->data_peserta->logo) }}" alt="">
                                                                    <h6>{{ $p->atlit2->data_peserta->asal_kabkota }}</h6><br><br>{{$p->atlit2->nama_atlit }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($muaythai_selesai as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit1->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->atlit1->data_peserta->asal_kabkota }}</h6><br>
                                                                    <p>{{ $p->atlit1->nama_atlit }}</p>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>{{$p->jenis_cabor2->nama_jenis_cabor }}
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta2 }}</h4>

                                                                <h6>MENANG</h6>
																		<div class="mc-op"> <a class="btn btn-danger" role="button">{{ $p->muaythai_menang->nama_atlit }}</a></div>
                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit2->data_peserta->logo) }}" alt="">
                                                                    <h6>{{ $p->atlit2->data_peserta->asal_kabkota }}</h6><br>
                                                                    <p>{{ $p->atlit2->nama_atlit }}</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali2" class="tab-pane">
                                    <div class="table-responsive">
                                        <table id="table_list" class="table table-striped table-hover table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="65%">Participant</th>
                                                    <th class="left" style="vertical-align:middle" width="65%">Kabupaten/Kota</th>
                                                    <th class="text-center" style="vertical-align:middle" width="10%">PTS<br></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach($muaythai_klasemen as $p)

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="text-center">{{ $p->atlit1->nama_atlit  }}

                                                    </a>&nbsp;&nbsp;{{ $p->atlit1->data_peserta->asal_kabkota }}</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        0
                                                    </td>
                                                    <td class="text-center">{{  $p->atlit2->nama_atlit }}

                                                    </a>&nbsp;&nbsp;{{ $p->atlit2->data_peserta->asal_kabkota  }}</td>
                                                    <td class="text-center" style="font-size:16px">
                                                        0
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="petanqueModal" tabindex="-1" role="dialog" aria-labelledby="petanqueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="petanqueModalLabel">Cabang Olahraga Petanque</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser3" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori3" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal3" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali3" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser3" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/Pentaque.mp4') }}" type="video/mp4">
                                    </video>
                            </div>
                                <div id="kategori3" class="tab-pane">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "7")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="jadwal3" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">Taman Lokasana</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">08 November 2022 - 14 November 2022</span>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">

                                                @foreach($petanque as $p)
                                                @if($p->jenis_cabor2->id_kategori == "1" or $p->jenis_cabor2->id_kategori == "2")
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>

                                               <section class="call-to-action call-to-action-dark mb-5">
                                                   <div class="col-sm-9 col-lg-9">
                                                       <div class="call-to-action-content">
                                                           <h3>{{ $p->nama_series }} </h3>
                                                           <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</p>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-3 col-lg-3">
                                                        @if($p->link_streaming == "-")
                                                                   <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                   @else
                                                                   <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                   @endif
                                                   </div>

                                               </section>
                                               @else
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim1->logo) }}" alt="" >
                                                                    <h6>{{ $p->peserta_tim1->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim2->logo) }}" alt="">
                                                                    <h6>{{ $p->peserta_tim2->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
@endif
                                                @endforeach

                                                @foreach($petanque_berlangsung as $p)
                                                 @if($p->jenis_cabor2->id_kategori == "1" or $p->jenis_cabor2->id_kategori == "2")
                                                 <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>

                                                <section class="call-to-action call-to-action-dark mb-5">
                                                    <div class="col-sm-9 col-lg-9">
                                                        <div class="call-to-action-content">
                                                            <h3>{{ $p->nama_series }} </h3>
                                                            <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-lg-3">
                                                         @if($p->link_streaming == "-")
                                                                    <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif
                                                    </div>

                                                </section>
                                                @else
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>

                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim1->logo) }}" alt="" >
                                                                    <h6>{{ $p->peserta_tim1->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>
                                                                    @if($p->link_streaming == "-")
                                                                    <div class="mc-op">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="mc-op"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim2->logo) }}" alt="">
                                                                    <h6>{{ $p->peserta_tim2->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                               @endif
                                                @endforeach

                                                @foreach($petanque_selesai as $p)
                                                @if($p->jenis_cabor2->id_kategori == "1" or $p->jenis_cabor2->id_kategori == "2")
                                                 <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>

                                                <section class="call-to-action call-to-action-dark mb-5">
                                                    <div class="col-sm-9 col-lg-9">
                                                        <div class="call-to-action-content">
                                                            <h3>{{ $p->nama_series }} </h3>
                                                            <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 col-lg-3">
                                                         @if($p->link_streaming == "-")
                                                                    <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif
                                                    </div>

                                                </section>
                                                @else
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim1->logo) }}" alt="" >
                                                                    <h6>{{ $p->peserta_tim1->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim2->logo) }}" alt="">
                                                                    <h6>{{ $p->peserta_tim2->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali3" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="sepakbolaModal" tabindex="-1" role="dialog" aria-labelledby="sepakbolaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sepakbolaModalLabel">Cabang Olahraga Sepakbola</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser4" data-toggle="tab" class="text-center">Infografis</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal4" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali4" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser4" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/Sepakbola.mp4') }}" type="video/mp4">
                                    </video>
                            </div>

                                <div id="jadwal4" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">Stadion Galuh</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">30 Oktober 2022 - 16 November 2022</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">

                                                @foreach($sepakbola as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->data_peserta->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta2 }}</h4>
                                                                    <div class="mc-op">{{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->data_pesertaa->logo) }}" alt="">
                                                                    <h6>{{ $p->data_pesertaa->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($sepakbola_berlangsung as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->data_peserta->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op">{{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>
                                                                    @if($p->link_streaming == "-")
                                                                    <div class="mc-op">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="mc-op"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif
                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->data_pesertaa->logo) }}" alt="">
                                                                    <h6>{{ $p->data_pesertaa->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($sepakbola_selesai as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->data_peserta->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta2 }}</h4>
                                                                    <div class="mc-op">{{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->data_pesertaa->logo) }}" alt="">
                                                                    <h6>{{ $p->data_pesertaa->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali4" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tenismejaModal" tabindex="-1" role="dialog" aria-labelledby="tenismejaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tenismejaModalLabel">Cabang Olahraga Tenis Meja</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser5" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori5" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal5" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali5" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser5" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/Tenis-Meja.mp4') }}" type="video/mp4">
                                    </video>
                            </div>
                                <div id="kategori5" class="tab-pane ">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "6")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="jadwal5" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">Gedung Indoor Tenis Lapang</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">03 November 2022 - 13 November 2022</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">
                                                @foreach($tenis_meja as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >

                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($tenis_meja_berlangsung as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >

                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>
                                                                    @if($p->link_streaming == "-")
                                                                    <div class="mc-op">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="mc-op"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif

                                                                </td>
                                                                <td class="right-team">

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($tenis_meja_selesai as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >

                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali5" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="softtenisModal" tabindex="-1" role="dialog" aria-labelledby="softtenisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="softtenisModalLabel">Cabang Olahraga Soft Tennis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser6" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori6" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal6" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali6" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser6" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/Soft-Tenis.mp4') }}" type="video/mp4">
                                    </video>
                            </div>
                                <div id="kategori6" class="tab-pane ">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "5")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="jadwal6" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">GOR Galuh Tenis Ciamis</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">12 November 2022 - 18 November 2022</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">
                                                @foreach($soft_tenis as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim1->logo) }}" alt="" >
                                                                    <h6>{{ $p->peserta_tim1->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim2->logo) }}" alt="">
                                                                    <h6>{{ $p->peserta_tim2->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($soft_tenis_berlangsung as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim1->logo) }}" alt="" >
                                                                    <h6>{{ $p->peserta_tim1->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>
                                                                    @if($p->link_streaming == "-")
                                                                    <div class="mc-op">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="mc-op"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim2->logo) }}" alt="">
                                                                    <h6>{{ $p->peserta_tim2->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach

                                                @foreach($soft_tenis_selesai as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim1->logo) }}" alt="" >
                                                                    <h6>{{ $p->peserta_tim1->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div>
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->peserta_tim2->logo) }}" alt="">
                                                                    <h6>{{ $p->peserta_tim2->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali6" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="wushuModal" tabindex="-1" role="dialog" aria-labelledby="wushuModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="wushuModalLabel">Cabang Olahraga Wushu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tabs">
                            <ul class="nav nav-tabs nav-justified flex-column flex-md-row">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#teaser7" data-toggle="tab" class="text-center">Infografis</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#kategori7" data-toggle="tab" class="text-center">Kategori</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#jadwal7" data-toggle="tab" class="text-center">Jadwal</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="#medali7" data-toggle="tab" class="text-center">Perolehan Medali</a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="teaser7" class="tab-pane active">
                                    <video width="100%" height="100%" autoplay muted loop controls>
                                          <source src="{{URL::to('asset/video/infografis/Wushu.mp4') }}" type="video/mp4">
                                    </video>
                            </div>
                                <div id="kategori7" class="tab-pane ">
                                    <div class="table-responsive">

                                        <table id="table_list" class="table table-striped table-hover table-bordered ">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                    <th class="left" style="vertical-align:middle" width="20%">Jenis Cabor</th>
                                                    {{-- <th class="left" style="vertical-align:middle" width="20%">Kategori</th> --}}

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($kategori as $key => $item)

                                                @if($item->id_jenis_cabor == "8")

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td class="left">
                                                    &nbsp;&nbsp;{{ $item->nama_jenis_cabor }}</td>
                                                    {{-- <td class="left">
                                                        &nbsp;&nbsp;{{ $item->kategori->kategori }}</td> --}}
                                                </tr>
                                                @else

                                                @endif
                                                @endforeach
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="jadwal7" class="tab-pane">
                                    <div class="heading heading-border heading-middle-border heading-middle-border-center text-center">
                                        <h2 class="text-center"> <span class="inverted">SMAN 1 Kawali</span></h2><br>
                                        <span class="highlighted-word highlighted-word-animation-1 highlighted-word-animation-1-2 highlighted-word-animation-1 highlighted-word-animation-1-no-rotate alternative-font-4 font-weight-semibold line-height-2 pb-2">12 November 2022 - 17 November 2022</span>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ms-content">
                                                @foreach($wushu as $p)
                                                @if($p->jenis_cabor2->id_kategori == "4" or $p->jenis_cabor2->id_kategori == "10")
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>

                                               <section class="call-to-action call-to-action-dark mb-5">
                                                   <div class="col-sm-9 col-lg-9">
                                                       <div class="call-to-action-content">
                                                           <h3>{{ $p->nama_series }} </h3>
                                                           <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</p>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-3 col-lg-3">
                                                        @if($p->link_streaming == "-")
                                                                   <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                   @else
                                                                   <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                   @endif
                                                   </div>

                                               </section>
                                               @else
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit1->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->atlit1->data_peserta->asal_kabkota }}</h6><br><br>{{$p->atlit1->nama_atlit }}
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div><br>{{$p->jenis_cabor2->nama_jenis_cabor }}
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta1 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit2->data_peserta->logo) }}" alt="">
                                                                    <h6>{{ $p->atlit2->data_peserta->asal_kabkota }}</h6><br><br>{{$p->atlit2->nama_atlit }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
@endif
                                                @endforeach

                                                @foreach($wushu_berlangsung as $p)
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                @if($p->jenis_cabor2->id_kategori == "4" or $p->jenis_cabor2->id_kategori == "10")
                                                
                                               <section class="call-to-action call-to-action-dark mb-5">
                                                   <div class="col-sm-9 col-lg-9">
                                                       <div class="call-to-action-content">
                                                           <h3>{{ $p->nama_series }} </h3>{{$p->jenis_cabor2->nama_jenis_cabor }}
                                                           <p class="mb-0 opacity-7">Pertandingan Dimulai Pada {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</p>
                                                       </div>
                                                   </div>
                                                   <div class="col-sm-3 col-lg-3">
                                                        @if($p->link_streaming == "-")
                                                                   <div class="call-to-action-btn">  Belum Ada link Streaming</div>
                                                                   @else
                                                                   <div class="call-to-action-btn"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                   @endif
                                                   </div>

                                               </section>
                                               @else
                                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit1->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $p->atlit1->data_peserta->asal_kabkota }}</h6>
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $p->status_pertandingan }}</div><br>{{$p->jenis_cabor2->nama_jenis_cabor }}
                                                                    <h4>{{ $p->skor_peserta1 }} &nbsp;&nbsp; VS &nbsp;&nbsp; {{ $p->skor_peserta2 }}</h4>
                                                                    <div class="mc-op"> {{tanggal_indonesia($p->tanggal) }} / {{ $p->waktu }} WIB</div>
                                                                    @if($p->link_streaming == "-")
                                                                    <div class="mc-op">  Belum Ada link Streaming</div>
                                                                    @else
                                                                    <div class="mc-op"> <a class="btn btn-danger" href="{{$p->link_streaming }}" target="_blank" role="button">Tonton Siaran Langsung</a></div>
                                                                    @endif

                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $p->atlit2->data_peserta->logo) }}" alt="">
                                                                    <h6>{{ $p->atlit2->data_peserta->asal_kabkota }}</h6>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                                    @endif
                                                @endforeach

                                                @foreach($wushu_selesai as $s)
                                                @if($s->jenis_cabor2->id_kategori == "4" or $s->jenis_cabor2->id_kategori == "10")
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $s->status_pertandingan }}</h4>

                                                <div class="table-responsive">

                                                    <table id="table_list" class="table table-striped table-hover table-bordered ">

                                                        <thead class="thead-dark">
                                                            <h5 class="font-weight-extra-bold" style=" color: rgb(0, 0, 0); ">Hasil Pertandingan {{ $s->nama_series }} ({{ $s->keterangan }})</h5>
                                                            <tr>
                                                                <th class="text-center" style="vertical-align:middle" width="5%">No.</th>
                                                                
                                                                <th class="left" style="vertical-align:middle" width="20%">Kabupaten/Kota</th>
                                                                <th class="text-center" style="vertical-align:middle" width="10%">Skor</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <tr>

                                                                <td class="text-center">1</td>
                                                                
                                                                <td class="left">

                                                                    &nbsp;&nbsp;{{ $s->peserta_wushu_menang1->asal_kabkota }}</td>
                                                                <td class="text-center" style="font-size:16px">
                                                                    {{ $s->skor_peserta1 }}
                                                                </td>

                                                            </tr>
                                                            <tr>

                                                                <td class="text-center">2</td>
                                                                
                                                                <td class="left">

                                                                    &nbsp;&nbsp;{{ $s->peserta_wushu_menang2->asal_kabkota }}</td>
                                                                <td class="text-center" style="font-size:16px">
                                                                    {{ $s->skor_peserta2 }}
                                                                </td>

                                                            </tr>
                                                            <tr>

                                                                <td class="text-center">3</td>
                                                                
                                                                <td class="left">

                                                                    &nbsp;&nbsp;{{ $s->peserta_wushu_menang3->asal_kabkota }}</td>
                                                                <td class="text-center" style="font-size:16px">
                                                                    {{ $s->skor_peserta3 }}
                                                                </td>

                                                            </tr>



                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <h4 class="font-weight-bold text-center" style=" color: rgb(0, 0, 0); text-shadow: rgb(151, 139, 139) 0.1em 0.1em 0.2em">Pertandingan {{ $p->status_pertandingan }}</h4>
                                                <div class="mc-table">
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                <td class="left-team" >
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $s->atlit1->data_peserta->logo) }}" alt="" >
                                                                    <h6>{{ $s->atlit1->data_peserta->asal_kabkota }}</h6><br><p>{{ $s->atlit1->nama_atlit }}
                                                                </td>
                                                                <td class="mt-content">
                                                                    <div class="mc-op">{{ $s->status_pertandingan }}</div>{{$s->jenis_cabor2->nama_jenis_cabor }}
                                                                    <h4> &nbsp;&nbsp; VS &nbsp;&nbsp; </h4>

																			<h6>MENANG</h6>
																		<div class="mc-op"> <a class="btn btn-danger" role="button">{{ $s->wushu_menang->nama_atlit }}</a></div>
                                                                </td>
                                                                <td class="right-team">
                                                                    <img src="{{ URL::to('/images/tim_peserta/'. $s->atlit2->data_peserta->logo) }}" alt="">
                                                                    <h6>{{ $s->atlit2->data_peserta->asal_kabkota }}</h6><br><br><p>{{ $s->atlit2->nama_atlit }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="medali7" class="tab-pane">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popupModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
<div class="embed-responsive embed-responsive-16by9">
										<iframe frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/7sohUgOOD4Q"></iframe>
									</div>


        </div>

      </div>
    </div>
  </div>

