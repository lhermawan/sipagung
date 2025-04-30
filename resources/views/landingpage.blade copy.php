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
				<div class="slider-container light rev_slider_wrapper" style="height: 700px;">
					<div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 700, 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,500], 'navigation' : {'arrows': { 'enable': true, 'style': 'arrows-style-3 arrows-big arrows-light' }, 'bullets': {'enable': false, 'style': 'bullets-style-1 bullets-color-primary', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 70, 'h_offset': 0}}}">
						<ul>

                        @foreach ($header as $key => $banner)
                            <li data-transition="fade">
								<img src="{{ URL::to($banner->picture) }}"
									alt=""
									data-bgposition="center center"
									data-bgfit="cover"
									data-bgrepeat="no-repeat"
                                    data-ease="Linear.easeNone"

									class="rev-slidebg">

								<div class="tp-caption"
									data-x="['left','left','center','center']" data-hoffset="['145','145','-150','-240']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[-300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.5;s:500;"><img src="{{URL::to('asset/img/slides/slide-title-border-light.png') }}" alt=""></div>

								<div class="tp-caption text-color-light font-weight-normal "
									data-x="['left','left','center','center']" data-hoffset="['200','200','0','0']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="700"
									data-fontsize="['22','22','22','40']"
									data-lineheight="['25','25','25','45']"
									data-transform_in="y:[-50%];opacity:0;s:500;">
                                        <span class="inverted">Selamat Datang</span>
                                    </div>

								<div class="tp-caption d-none d-md-block"
									data-frames='[{"delay":3800,"speed":500,"frame":"0","from":"opacity:0;x:10%;","to":"opacity:1;x:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="['left','left','center','center']" data-hoffset="['365','365','80','135']"
									data-y="center" data-voffset="['-33','-33','-33','-55']"><img src="{{URL::to('asset/img/slides/slide-blue-line.png') }}" alt=""></div>

								<div class="tp-caption"
									data-x="['left','left','center','center']" data-hoffset="['440','440','150','240']"
									data-y="center" data-voffset="['-50','-50','-50','-75']"
									data-start="1000"
									data-transform_in="x:[300%];opacity:0;s:500;"
									data-transform_idle="opacity:0.5;s:500;"><img src="{{URL::to('asset/img/slides/slide-title-border-light.png') }}" alt=""></div>

								<h1 class="tp-caption font-weight-extra-bold text-color-light negative-ls-2" style="text-shadow: black 0.1em 0.1em 0.2em"
									data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:1.5;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
									data-x="['left','left','center','center']" data-hoffset="['152','152','0','0']"
									data-y="center"
									data-fontsize="['50','50','50','90']"
									data-lineheight="['55','55','55','95']"
									data-letterspacing="-1">{{ $pegawai["nama_skpd"] }}</h1>



							</li>
                            @endforeach


						</ul>
					</div>
				</div>
                <div class="home-intro bg-dark m-0 " id="home-intro">
					<div class="container">

						<div class="row align-items-center">
							<div class="col-lg-1">
								<div class="bg-primary text-white text-center font-weight-medium py-2" style="width: 170px;">Pengumuman</div>
							</div>
							<div class="col-lg-11">
								<div class="get-started text-left text-lg-right">


                        <div class="owl-carousel owl-theme stage-margin stage-margin-lg nav-style-2 mb-0" data-plugin-options="{'items': 1, 'margin': 100, 'loop': true, 'nav': false, 'dots': false, 'stagePadding': 100,'autoplay': true, 'autoplayTimeout': 3000}">
                            @foreach($pengumuman as $p)
                            <div class="text-left">

                                <div class="lead lead-2 mb-0"><a class="text-white text-uppercase font-weight-semi-bold" href="">{{ $p->text }} | {{ $p->date }}</a></div>

                            </div>
                            @endforeach
                        </div>

								</div>
							</div>
						</div>

					</div>
                </div>








                <!-- News Start -->
<section class="match-section  set-bg appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('asset/img/bg-yellow.png') }}">
    <div class="container bg-transparent py-2 full-width appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">
        <div class="row my-5">
            <div class="col">
                <div class="heading heading-border heading-middle-border heading-middle-border-center text-center ">
                    <h2 class="bg-warning text-white font-weight-bold "> BERITA <span class="bg-warning" style="color: rgb(166, 26, 209);">TERKINI</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-4">
                <aside class="sidebar"  data-plugin-sticky data-plugin-options="{'minWidth': , 'containerSelector': '', 'padding': {'top': 110}}">

                    <div class="tabs tabs-dark mb-4 pb-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
                            <!-- <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li> -->
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="popularPosts">
                                <ul class="simple-post-list">
                                @foreach ($berita_popular as $key => $baru)
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="">
                                                <img src="{{ URL::to($baru->picture) }}" width="50" height="50" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="">{!! Str::limit($baru->title, 30, '...') !!}</a>
                                        <div class="post-meta">

                                        </div>
                                    </div>
                                </li>
                                @endforeach



                                </ul>
                            </div>
                            <!-- <div class="tab-pane" id="recentPosts">
                                <ul class="simple-post-list">

                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="blog-post.html">
                                                <img src="" width="50" height="50" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href=""></a>
                                        <div class="post-meta">

                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="blog-post.html">
                                                <img src="" width="50" height="50" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href=""></a>
                                        <div class="post-meta">

                                        </div>
                                    </div>
                                </li>


                                </ul>
                            </div> -->
                        </div> <br>

                    </div>


                    </aside>
            </div>


            <div class="col-lg-9 order-lg-2">
                <div class="blog-posts">

                    <div class="row px-3">
                        @foreach ($berita as  $key => $item)
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">


                            <div class="card">
                                <img class="card-img-top img-responsive " src="{{ URL::to($item->picture) }}" width="100" height="200" alt="Card Image">
                                <div class="card-body">
                                    <a href="{{ url('berita/detail_berita/'.$item->title_slug) }}"><h4 class="card-title mb-1 text-4 font-weight-bold" style="color:purple">{!! Str::limit($item->title, 30, '...') !!}</h4></a>
                                    <p class="card-text">{!! Str::limit($item->content, 50, '...') !!}</p>
                                    {{-- <a href="{{ url('berita/detail_berita/'.$item->title_slug) }}" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> --}}
                                    <div class="post-meta">
                                        {{-- <span class="d-block mt-2"><a href="{{ url('berita/detail_berita/'.$item->title_slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span> --}}
                                        <!-- <span><i class="far fa-user"></i> By <a href="#">{{ $item->author}}</a> </span> -->
                                        <span><i class="far fa-folder"></i> Kategori <a href="{{ url('news/hot_news_category/'.$item->id_kategori_berita) }}">{{ $item->category->category_name}}</a> </span>
                                        {{-- <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                                        <span class="d-block mt-2 "><a href="{{ url('berita/detail_berita/'.$item->title_slug) }}" class="btn btn-xs btn-warning text-1 text-uppercase">Read More</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        @endforeach



                    </div>


                </div>
                    {{-- <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>
    <!-- News Start -->
<!-- Match Section Begin -->

<section class="live-section  set-bg appear-animation" id="live" style="background-color: rgb(95, 27, 104);" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750" data-setbg="{{URL::to('asset/img/bg-purple.png') }}">
    <div class="container bg-transparent py-2 full-width appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400" data-appear-animation-duration="750">
        <div class="row my-5">
            <div class="col">
                <div class="heading heading-border heading-middle-border heading-middle-border-center text-center ">
                    <h2 class="bg-warning text-white font-weight-bold "> POTENSI <span class="bg-warning" style="color:  rgb(95, 27, 104);">DESA</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 order-lg-4">
                <aside class="sidebar"  data-plugin-sticky data-plugin-options="{'minWidth': , 'containerSelector': '', 'padding': {'top': 110}}">

                    <div class="tabs tabs-dark mb-4 pb-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
                            <!-- <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li> -->
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="popularPosts">
                                <ul class="simple-post-list">
                                @if ($potensi->count() > 0)
								@foreach ($potensi as $key => $item)
                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="">
                                                <img src="{{ URL::to($item->picture) }}" width="50" height="50" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href="">{!! Str::limit($item->title, 30, '...') !!}</a>
                                        <div class="post-meta">

                                        </div>
                                    </div>
                                </li>
                                @endforeach
									@else
                                    <tr>
										<p>Belum Ada Berita</p>
									</tr>
									@endif



                                </ul>
                            </div>
                            <!-- <div class="tab-pane" id="recentPosts">
                                <ul class="simple-post-list">

                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="blog-post.html">
                                                <img src="" width="50" height="50" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href=""></a>
                                        <div class="post-meta">

                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="post-image">
                                        <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                            <a href="blog-post.html">
                                                <img src="" width="50" height="50" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <a href=""></a>
                                        <div class="post-meta">

                                        </div>
                                    </div>
                                </li>


                                </ul>
                            </div> -->
                        </div> <br>

                    </div>


                    </aside>
            </div>


            <div class="col-lg-9 order-lg-2">
                <div class="blog-posts">

                    <div class="row px-3">
                    @if ($potensi->count() > 0)
								@foreach ($potensi as $key => $item)
                        <div class="col-md-6 col-lg-4 mb-5 mb-lg-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">


                            <div class="card">
                                <img class="card-img-top img-responsive " src="{{ URL::to($item->picture) }}" width="100" height="200" alt="Card Image">
                                <div class="card-body">
                                    <a href="{{ url('berita/detail_berita/'.$item->title_slug) }}"><h4 class="card-title mb-1 text-4 font-weight-bold" style="color:purple">{!! Str::limit($item->title, 30, '...') !!}</h4></a>
                                    <p class="card-text">{!! Str::limit($item->content, 50, '...') !!}</p>
                                    {{-- <a href="{{ url('berita/detail_berita/'.$item->title_slug) }}" class="read-more text-color-primary font-weight-semibold text-2">Read More <i class="fas fa-angle-right position-relative top-1 ml-1"></i></a> --}}
                                    <div class="post-meta">
                                        {{-- <span class="d-block mt-2"><a href="{{ url('berita/detail_berita/'.$item->title_slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span> --}}
                                        <!-- <span><i class="far fa-user"></i> By <a href="#">{{ $item->author}}</a> </span> -->

                                        {{-- <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span> --}}
                                        <span class="d-block mt-2 "><a href="{{ url('berita/detail_berita/'.$item->title_slug) }}" class="btn btn-xs btn-warning text-1 text-uppercase">Read More</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        @endforeach
									@else
                                    <tr>
										<p>Belum Ada Berita</p>
									</tr>
									@endif



                    </div>


                </div>
                    {{-- <div class="row">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>

                <section class="section bg-color-grey-scale-1 section-height-3 border-0 m-0">
					<div class="container container-xl py-3">
						<div class="row">
							<div class="col text-center">
								<h2 class="font-weight-normal mb-5">Aparatur<strong class="font-weight-extra-bold">Desa</strong></h2>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col">

								<div class="owl-carousel owl-theme nav-style-1 stage-margin mb-0" data-plugin-options="{'responsive': {'576': {'items': 1}, '768': {'items': 2}, '992': {'items': 3}, '1200': {'items': 4}}, 'margin': 3, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40,'autoplay': true, 'autoplayTimeout': 3000}">
                                @foreach ($data["pegawaidesa"]["data"] as $datapegawai)
                                    <div class="m-3">
										<div class="hover-effect-3d">
											<div class="thumb-info thumb-info-hide-wrapper-bg thumb-info-no-zoom rounded-0">
												<div class="thumb-info-wrapper">
													<img src="{{$link}}/data/foto/pegawai/{{ $datapegawai['foto_pegawai'] }}" height="325px" width="100px" alt="">
                                                    <span class="thumb-info-title">
														<span class="thumb-info-inner">{{ $datapegawai['nama_lengkap'] }}</span>
														<span class="thumb-info-type">{{ $datapegawai['jabatan'] }}</span>
													</span>
													<span class="thumb-info-action">
														<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
													</span>
												</div>
											</div>
										</div>
									</div>
                                @endforeach
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col text-center">
								<a href="#" class="btn btn-primary font-weight-semibold text-3 px-5 btn-py-2">Lihat Selengkapnya</a>
							</div>
						</div>
					</div>
				</section>

                <div class="container">
                    <br>
                    <br>
                <div class="col text-center">
								<h2 class="font-weight-normal mb-5">Statistik<strong class="font-weight-extra-bold"> Desa</strong></h2>
							</div>
					<div class="featured-boxes py-5 mt-5 mb-4">
						<div class="row">
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-primary featured-box-effect-1">
									<div class="box-content">
										<i class="icon-featured icons icon-people" ></i>
										<h3 class="text-color-primary font-weight-bold text-3 mb-2 mt-3">Loved by Customers</h3>
										<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<p><a href="/" class="text-dark learn-more font-weight-bold text-2">VIEW MORE <i class="fas fa-chevron-right ml-2"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-dark featured-box-effect-1">
									<div class="box-content">
										<i class="icon-featured icons icon-docs"></i>
										<h3 class="font-weight-bold text-3 mb-2 mt-3">Well Documented</h3>
										<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<p><a href="/" class="text-dark learn-more font-weight-bold text-2">VIEW MORE <i class="fas fa-chevron-right ml-2"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-primary featured-box-effect-1">
									<div class="box-content">
										<i class="icon-featured icons icon-trophy"></i>
										<h3 class="text-color-primary font-weight-bold text-3 mb-2 mt-3">Winner</h3>
										<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<p><a href="/" class="text-dark learn-more font-weight-bold text-2">VIEW MORE <i class="fas fa-chevron-right ml-2"></i></a></p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="featured-box featured-box-dark featured-box-effect-1">
									<div class="box-content">
										<i class="icon-featured icons icon-equalizer"></i>
										<h3 class="font-weight-bold text-3 mb-2 mt-3">Customizable</h3>
										<p class="px-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
										<p><a href="/" class="text-dark learn-more font-weight-bold text-2">VIEW MORE <i class="fas fa-chevron-right ml-2"></i></a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



    <!-- News Start -->
<!-- Match Section Begin -->



<!-- News Start -->
</div>






			@include('layout.footer')

	</body>

</html>
