@include('layout.head')
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 100}">


		<div class="body">
			@include('layout.sidebar')

			<div role="main" class="main">
				<section class="page-header page-header-modern bg-color-light-scale-1 page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-md-12 align-self-center p-static order-2 text-center ">
                            <h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">

									<span class="word-rotator-words bg-primary">
										<b class="is-visible">VISI</b>
										<b>MISI</b>
									</span>
                                    <span>{{ $pegawai["nama_skpd"] }}</span>
								</h2>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-dark d-block text-center">
									<li><a href="{{ URL::to('/') }}">Home</a></li>
									<li class="active">VISI MISI</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

                <

                <section class="section  section-primary m-0 border-0 mb-0 appear-animation set-bg"  data-setbg="{{ URL::to('/icon/BV.jpg') }}"  data-appear-animation="fadeIn" >

                <div class="container">



					<div class="row">
                        <div class="col-md-5 order-md-4 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                            <img src="{{ URL::to('asset/img/profil/ciamis.png') }}" height="400" width="250" data-aos="zoom-in" data-aos-delay="200" style="margin-left: 200px" altclass="img-fluid" alt="">
                        </div>
                        <div class="col-md-7 order-2">
                            <div class="overflow-hidden">
                                <h2 class="text-warning font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" style="text-shadow: black 0.1em 0.1em 0.2em" data-appear-animation="maskUp" data-appear-animation-delay="300">VISI</h2>
                            </div>
                            {{-- <div class="overflow-hidden mb-3">
                                <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">CEO</p>
                            </div> --}}<br>
                            <p class="lead appear-animation text-justify font-weight-bold text-4" style="text-shadow: black 0.1em 0.1em 0.2em" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                            {{ $visi["visi"] }}</p>
                            <br>

                            <div class="overflow-hidden">
                                <h2 class="text-warning font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" style="text-shadow: black 0.1em 0.1em 0.2em" data-appear-animation="maskUp" data-appear-animation-delay="300">MISI</h2>
                            </div>
                            {{-- <div class="overflow-hidden mb-3">
                                <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">CEO</p>
                            </div> --}}<br>


                            <table>
                                  <tbody>
                                  <tr>
                                    <th ></th>
                                    <th></th>

                                  </tr>
                                  @php $no = 1; @endphp
                                  @foreach($misi as $d)
                                  <tr>
                                    <td valign="top" ><p class="lead appear-animation text-justify font-weight-bold text-4" style="text-shadow: black 0.1em 0.1em 0.2em" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                    {{ $no++ }}. </td>
                                    <td align="justify"><p class="lead appear-animation text-justify font-weight-bold text-4" style="text-shadow: black 0.1em 0.1em 0.2em" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">
                                     {!! $d['misi']!!}</p></td>


                                  </tr>
                                  @endforeach
                                  </tbody>
                                </table>


                            </table>


                            {{-- <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                            <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000">
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-modern btn-dark mt-3">Get In Touch</a>
                                    <a href="#" class="btn btn-modern btn-primary mt-3">Hire Me</a>
                                </div>
                                <div class="col-sm-6 text-lg-right my-4 my-lg-0">
                                    <strong class="text-uppercase text-1 mr-3 text-dark">follow me</strong>
                                    <ul class="social-icons float-lg-right">
                                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                        <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>

                    </div>
                </section>


			@include('layout.footer')

	</body>
</html>
