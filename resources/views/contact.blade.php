@include('layout.head')
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">
			@include('layout.sidebar')
            <div role="main" class="main">

<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12 align-self-center p-static order-2 text-center">

            <h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
									<span>KONTAK</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">PELAYANAN</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">KONTAK {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section appear-animation set-bg"  data-setbg="{{ URL::to('/icon/silverBG.jpg') }}"  data-appear-animation="fadeIn" >
<div role="main" class="main">

<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
<!-- <div id="googlemaps" class="google-map mt-0" style="height: 500px;"></div> -->

<div id="map" class="google-map mt-0" style="height: 500px;"></div>

<div class="container">
@if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <div class="row py-4">
        <div class="col-lg-6">

            <div class="overflow-hidden mb-1">
                <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">FORM</strong> KONTAK</h2>
            </div>
            <div class="overflow-hidden mb-4 pb-3">
                <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">INFO KONTAK {{ $pegawai["nama_skpd"] }} </p>
            </div>

            <form class="contact-form" method="post" action="{{ route('savekontak') }}">

            @csrf
                <div class="form-row">
                    <div class="form-group col-lg-6">
                        <label class="required font-weight-bold text-dark text-2">Nama</label>
                        <input type="text" class="form-control" data-msg-required="Harap Masukkan Nama Anda." name="name" id="name" required value="{{old('name')}}" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="required font-weight-bold text-dark text-2">Email Address</label>
                        <input type="email" class="form-control"data-msg-required="Harap Masukkan Email Anda."name="email" id="email" value="{{old('email')}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="font-weight-bold text-dark text-2">No. HP</label>
                        <input type="number" class="form-control" data-msg-required="Harap Masukkan Nomor HP Anda."name="phone" id="phone" value="{{old('phone')}}" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="font-weight-bold text-dark text-2">Subject</label>
                        <input type="text" data-msg-required="Please enter the subject."class="form-control" name="subject" id="subject" value="{{old('subject')}}"  required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label class="required font-weight-bold text-dark text-2">Message</label>
                        <textarea maxlength="5000" data-msg-required="Please enter your message." id="message" rows="8" class="form-control" name="message" value="{{old('message')}}" required></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <input type="submit" name="send" value="Submit" class="btn btn-primary btn-modern">
                    </div>
                </div>
            </form>

        </div>
        <div class="col-lg-6">

            <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                <h4 class="mt-2 mb-1"> <strong>{{ $pegawai["nama_skpd"] }}</strong></h4>
                <ul class="list list-icons list-icons-style-2 mt-2">
                    <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Alamat:</strong> {{ $pegawai["alamat_skpd"] }}</li>
                    <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Telepon:</strong> {{ $pegawai["telepon_skpd"] }}</li>
                    <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="">{{ $pegawai["email_skpd"] }}</a></li>
                </ul>
            </div>

            <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
                <h4 class="pt-5">JAM PELAYANAN <strong> {{ $pegawai["nama_skpd"] }}</strong></h4>
                <ul class="list list-icons list-dark mt-2">
                    <li><i class="far fa-clock top-6"></i> Senin    - 07.30 - 15.00 WIB</li>
                    <li><i class="far fa-clock top-6"></i> Selasa   - 07.30 - 15.00 WIB</li>
                    <li><i class="far fa-clock top-6"></i> Rabu     - 07.30 - 15.00 WIB</li>
                    <li><i class="far fa-clock top-6"></i> Kamis    - 07.30 - 15.00 WIB</li>
                    <li><i class="far fa-clock top-6"></i> Jumat    - 07.30 - 15.00 WIB</li>
                    <li><i class="far fa-clock top-6"></i> Sabtu    - 07.30 - 12.00 WIB</li>
                    <li><i class="far fa-clock top-6"></i> Minggu   - Libur</li>
                </ul>
            </div>

            <!-- <h4 class="pt-5">Get in <strong>Touch</strong></h4>
            <p class="lead mb-0 text-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->

        </div>

    </div>

</div>

</div>



</section>

</div>
@include('layouts.mapjs')
@include('layout.footer')

</body>
</html>
