<style>
    body {
     font-family: sans-serif;
    }

    /* Add WA floating button CSS */
    .floating {
     position: fixed;
     width: 60px;
     height: 60px;
     bottom: 40px;
     right: 40px;
     background-color: #25d366;
     color: #fff;
     border-radius: 50px;
     text-align: center;
     font-size: 30px;
     box-shadow: 2px 2px 3px #999;
     z-index: 100;
    }

    .fab-icon {
     margin-top: 16px;
    }
    </style>

<a href="https://wa.me/{{ $pegawai['no_wa_pelayanan_surat'] }}" class="floating" target="_blank">
    <i class="fab fa-whatsapp fab-icon"></i>
    </a>
<footer id="footer" class="mt-0">
				<div class="container">
					<div class="footer-ribbon">
						<span>{{ $pegawai["nama_skpd"] }}</span>
					</div>
					<div class="row py-5 my-4">
						<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
							<!-- <h5 class="text-3 mb-3"></h5> -->
							<h5 class="text-3 mb-3">KONTAK</h5>
								<!-- <ul class="list list-icons list-icons-lg"> -->
									<li class="mb-1"><p style="color:white;"><img src="{{URL::to('icon/map.png') }}" height="45px">    {{ $pegawai["alamat_skpd"] }}</p></li>
									<li class="mb-1"><p style="color:white;"><img src="{{URL::to('icon/whatsapp.png') }}" height="45px">    {{ $pegawai["telepon_skpd"] }}</p></li>
									<li class="mb-1"><p style="color:white;"><img src="{{URL::to('icon/mail.png') }}" height="45px">    {{ $pegawai["email_skpd"] }}</p></li>
									<!-- <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i><p class="m-0"><a href="tel:8001234567"></a></p></li> -->
									<!-- <li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:mail@example.com">{{ $pegawai["email_skpd"] }}</a></p></li> -->
								</ul>
							<div class="alert alert-success d-none" id="newsletterSuccess">
								<!-- <strong>Success!</strong> You've been added to our email list. -->
							</div>
							<div class="alert alert-danger d-none" id="newsletterError"></div>
							<!-- <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mr-4 mb-3 mb-md-0">
								<div class="input-group input-group-rounded">
									<input class="form-control form-control-sm bg-light" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
									<span class="input-group-append">
										<button class="btn btn-light text-color-dark" type="submit"><strong>GO!</strong></button>
									</span>
								</div>
							</form> -->
						</div>

						<!-- <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
							<h5 class="text-3 mb-3">LATEST TWEETS</h5>
							<div id="tweet" class="twitter" data-plugin-tweets data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
								<p>Please wait...</p>
							</div>
						</div> -->
						<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
							<!-- <div class="contact-details"> -->
								<h5 class="text-3 mb-3">KONTAK MEDIA SOSIAL</h5>
								<!-- <ul class="list list-icons list-icons-lg"> -->
									<li class="mb-1"><p style="color:white;"><a href="https://id-id.facebook.com/{{ $pegawai['facebook_skpd'] }}/" style="color:white;" target="_BLANK"><img src="{{URL::to('icon/face.png') }}" height="40px"/> {{ $pegawai["facebook_skpd"] }}</a> </p></li>
									<!-- <li class="mb-1"><p style="color:white;"><a href="https://www.instagram.com/{{ $pegawai['youtube_skpd'] }}/" target="_BLANK"><img src="{{URL::to('icon/instagram.png') }}" height="45px"/> {{ $pegawai["instagram_skpd"] }}</a></p> </li> -->
									<li class="mb-1"><p style="color:white;"><a href="https://www.youtube.com/{{ $pegawai['youtube_skpd'] }}/" style="color:white;" target="_BLANK"><img src="{{URL::to('icon/youtube.png') }}" height="45px"/> {{ $pegawai["youtube_skpd"] }}</a> </p></li>
									<li class="mb-1"><p style="color:white;"><a href="https://www.instagram.com/{{ $pegawai['instagram_skpd'] }}/" style="color:white;" target="_BLANK"><img src="{{URL::to('icon/instagram.png') }}" height="45px"/> {{ $pegawai["instagram_skpd"] }}</a> </p></li>
									<li class="mb-1"><p style="color:white;"><a href="https://www.twitter.com/{{ $pegawai['twitter_skpd'] }}/" style="color:white;" target="_BLANK"><img src="{{URL::to('icon/twitter.png') }}" height="43px"/> {{ $pegawai["twitter_skpd"] }}</a> </p></li>
								</ul>
							</div>
							<div class="col-md-6 col-lg-2">
                            <iframe src="{{ $pegawai['sematan_peta'] }}" width="400" height="300"></iframe>
                           
							</div>
						</div>
					</div>
				</div>

			</footer>

<!-- Vendor -->



<script src="{{ URL::to('porto/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/common/common.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/vivus/vivus.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
<!-- Theme Base, Components and Settings -->
<script src="{{ URL::to('porto/js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ URL::to('porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ URL::to('porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ URL::to('porto/js/examples/examples.gallery.js') }}"></script>
<!-- Theme Custom -->
<script src="{{ URL::to('porto/js/custom.js') }}"></script>
<script src="{{ URL::to('assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ URL::to('assets/js/dataTables.bootstrap4.min.js') }} "></script>

		<script src="{{ URL::to('assets/js/select2.min.js') }}"></script>
		<script src="{{ URL::to('assets/js/app.js') }}"></script>
<!-- Theme Initialization Files -->
<script src="{{ URL::to('porto/js/theme.init.js') }}"></script>
{{-- <script src="{{ URL::to('porto/js/theme.init.js') }}"></script> --}}

		<!-- Examples -->
		<script src="{{ URL::to('porto/js/examples/examples.portfolio.js') }}"></script>
        <!-- Theme Base, Components and Settings -->
        <script src="{{ URL::to('porto/js/examples/examples.lightboxes.js') }}"></script>
<!-- Examples -->

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-12345678-1', 'auto');
ga('send', 'pageview');
</script>
-->
 {{-- <script src="{{ URL::to('comingsoon_15/vendor/jquery/jquery-3.2.1.min.js') }}"></script> --}}
<!--===============================================================================================-->
	<!--===============================================================================================-->
	{{-- <script src="{{ URL::to('comingsoon_08/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ URL::to('comingsoon_08/vendor/bootstrap/js/popper.js') }}"></script>
        <script src="{{ URL::to('comingsoon_08/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
        <script src="{{ URL::to('comingsoon_08/vendor/select2/select2.min.js') }}"></script> --}}
    <!--===============================================================================================-->
        <script src="{{ URL::to('comingsoon_08/vendor/countdowntime/moment.min.js') }}"></script>
        <script src="{{ URL::to('comingsoon_08/vendor/countdowntime/moment-timezone.min.js') }}"></script>
        <script src="{{ URL::to('comingsoon_08/vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
        <script src="{{ URL::to('comingsoon_08/vendor/countdowntime/countdowntime.js') }}"></script>
        <script>
            $('.cd100').countdown100({
                /*Set Endtime here*/
                /*Endtime must be > current time*/
                endtimeYear: 2022,
                endtimeMonth: 11,
                endtimeDate: 12,
                endtimeHours: 20,
                endtimeMinutes: 0,
                endtimeSeconds: 0,
                timeZone: ""
                // ex:  timeZone: "America/New_York"
                //go to " http://momentjs.com/timezone/ " to get timezone
            });
        </script>
    <!--===============================================================================================-->
        <script src="{{ URL::to('comingsoon_08/vendor/tilt/tilt.jquery.min.js') }}"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>

    <!--===============================================================================================-->
        <script src="{{ URL::to('comingsoon_08/js/main.js') }}"></script>
        <script>
            $(document).ready(function () {
                $("#atletModal").on("show.bs.modal", function (e) {
                    var nama_atlit = $(e.relatedTarget).data('target-nama');
                    var jenis_kelamin = $(e.relatedTarget).data('target-jk');
                    $('#pass_nama').text(nama_atlit);
                    $('#pass_jk').text(jenis_kelamin);

                });
            });
            $('div a').click(function(e) {
                    var src = $(e.relatedTarget).data('target-url');
                    // $("#w3s").attr("src", src);
                    $('#image-atlit').html('<img src="' + $(this).data('target-url') + '" class="rounded-circle foto_atlet" width="200px" height="200px"/>')
    });

        </script>
