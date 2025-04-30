@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar')




<div class="page-wrapper">
{{-- message --}}
{!! Toastr::message() !!}




			
            <!-- Page Content -->
            <div class="content container-fluid">

            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <h3 class="page-title">{{ Auth::user()->jenis_user }}</h3>
                            <ul class="breadcrumb">
                          
                            <li class="breadcrumb-item active">Selamat Datang {{ Auth::user()->jenis_user }} PORPROV </li>
                          
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
            
                <div class="row">
                    <div class="col-md-6 col-sm-3 col-lg-3 col-xl-2">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3></h3>
                                    <span style="font-size: 16px; color: blue"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-3 col-lg-3 col-xl-2">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3></h3>
                                    <span style="font-size: 16px; color: green">Jumlah Pengguna</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                
                    
                <!-- /Statistics Widget -->
                
            
                    
            <!-- /Page Content -->

        </div>
      
    <!-- content --> 
    @include('layouts/footer')

