
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')

<div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Detail Data Personal User</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Detail Data Personal User</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
								<a href="{{ route('user/data_personal_user') }}" class="btn add-btn"><i class="fa fa-back"></i> Kembali</a>
							</div>
                    </div>
                </div>
                <!-- /Page Header -->

                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="">
                                                <img src="{{ URL::to('/images/'. $data[0]->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0">{{ $data[0]->nama }}</h3>
                                                    <h5 class="company-role m-t-0 mb-0">{{ $data[0]->nik }}</h5>
                                                    <div class="staff-id">{{ $data[0]->jenis_kelamin}}</div>
                                                    <div class="staff-id">{{ $data[0]->tempat_lahir }}</div>
                                                        
                                                    <div class="staff-id">{{tanggal_indonesia($data[0]->tanggal_lahir) }}</div>
                                                    <div class="staff-id">{{ $data[0]->tinggi_badan }} cm, {{ $data[0]->berat_badan }} kg</div>
                                                    <div class="staff-id">{{ $data[0]->telp}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <span class="title">Agama:</span>
                                                        <span class="text">{{ $data[0]->agama}}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Status:</span>
                                                        <span class="text">{{ $data[0]->status}}</a></span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Golongan Darah:</span>
                                                        <span class="text">{{ $data[0]->gol_darah }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title">RT/RW:</span>
                                                        <span class="text">{{ $data[0]->rt }}/{{ $data[0]->rw }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Desa/Kelurahan:</span>
                                                        <span class="text">{{ $data[0]->subdistricts->subdis_name }}</span>
                                                    </li>

                                                    <li>
                                                        <span class="title">Kecamatan:</span>
                                                        <span class="text">{{ $data[0]->districts->dis_name }}</span>
                                                    </li>

                                                    <li>
                                                        <span class="title">Kabupaten/Kota:</span>
                                                        <span class="text">{{ $data[0]->cities->city_name }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="title">Provinsi:</span>
                                                        <span class="text">{{ $data[0]->provinces->prov_name }}</span>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    
    <!-- content --> 
    @include('layouts/footer')

