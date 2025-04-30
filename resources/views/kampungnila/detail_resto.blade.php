<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>{{ $pegawai['nama_skpd'] }}</title>

		<meta name="keywords" content="DESA  {{ $pegawai['nama_skpd'] }}" />
		<meta name="description" content="RESTO SFV KAMPUNG NILA {{ $pegawai['nama_skpd'] }} ">
		<meta name="author" content="DESA KABUPATEN CIAMIS">
		<meta property="og:title" content="{{ $data->title}}" />
		<meta property="og:type" content="article" />

		<meta property="og:image" content="{{ URL::to($data->picture) }}" />
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ URL::to('images/logo_cms.png') }}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7COpen+Sans:400,700,800" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/animate/animate.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->


		<link rel="stylesheet" href="{{ URL::to('porto/css/theme.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/css/theme-shop.css') }}">
        <link rel="stylesheet" href="{{ URL::to('porto/css/skins/skin-corporate-4.css') }}">
		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ URL::to('porto/css/demos/demo-landing.css') }}">
        <link rel="stylesheet" href="{{ URL::to('porto/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ URL::to('porto/vendor/rs-plugin/css/navigation.css') }}">
		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ URL::to('porto/css/skins/skin-landing.css') }}">
        <link rel="stylesheet" href="{{ URL::to('porto/css/skins/default.css') }}">
		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ URL::to('porto/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ URL::to('porto/vendor/modernizr/modernizr.min.js') }}"></script>

       <!--===============================================================================================-->
	{{-- <link rel="icon" type="image/png" href="{{ URL::to('comingsoon_08/images/icons/1766848896.ico') }}"/> --}}
    <!--===============================================================================================-->
        {{-- <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_15/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
    <!--===============================================================================================-->
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/vendor/select2/select2.min.css') }}"> --}}
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::to('comingsoon_08/css/main.css') }}">

	</head>
    <style>
        .berita_justify {
        text-align: justify;
        text-justify: inter-word;
        }.

            div#social-links {
                margin: 0 auto;
                max-width: 500px;
            }
            div#social-links ul li {
                display: inline-block;
            }
            div#social-links ul li a {
                padding: 10px;
                border: 1px solid #BA12BC;
                margin: 1px;
                font-size: 30px;
                color: #BA12BC;
                background-color: #ffffff;
            }
        </style>


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

                    <h1 class="text-dark font-weight-bold text-8"></h1>
{{-- <span class="sub-title text-dark">Check out our Latest News!</span> --}}
                </div>

                <div class="col-md-12 align-self-center order-1">

                    <ul class="breadcrumb d-block text-center">
                        <li><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="">Resto Kampung Nila</li>
                        <li class="active">{{ $data->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div role="main" class="main">

<div class="container py-4">

    <div class="row">
        <div class="col">
            <div class="blog-posts single-post">

                <article class="post post-large blog-single-post border-0 m-0 p-0">
                    <div class="post-image ml-0">
                        <a href="">
                            <img src="{{ URL::to($data->picture) }}" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                        </a>
                    </div>

                    <div class="post-date ml-0">
                        <span class="day">{{ $data->date }}</span>
                        <span class="month">{{ $data->time }}</span>
                    </div>

                    <div class="post-content ml-0">

                        <h2 class="font-weight-bold"><a href="">{{ $data->title }}</a></h2>

                        <div class="post-meta">
                            <span><i class="far fa-user"></i> By <a href="#">Admin Kampung Nila</a> </span>
                            <span><i class="far fa-users"></i> <a href="#">Pengunjung:  {{ $data->hits}}</a></span>
                        </div>

                        <p>{!! $data->content !!}</p>


                        <div class="post-block mt-5 post-share">
                            <h4 class="mb-3">Share</h4>

                            <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                            {!! $shareComponent !!}
                            </div>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50faf75173aadc53"></script>
                            <!-- AddThis Button END -->

                        </div>


                        </div>


                    </div>
                </article>

            </div>
        </div>
    </div>

</div>

<br>
<br>

@include('layout.footer')

</body>
</html>
