<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>{{ $pegawai['nama_skpd'] }}</title>

		<meta name="keywords" content="DESA  {{ $pegawai['nama_skpd'] }}" />
		<meta name="description" content="BERITA {{ $pegawai['nama_skpd'] }} ">
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
                        <li class="">Lapak Desa {{ $pegawai["nama_skpd"] }}</li>
                        <li class="active">{{ $data->nama_produk}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section appear-animation set-bg"  data-setbg="{{URL::to('icon/silverBG.jpg') }}"  data-appear-animation="fadeIn" >

    <div role="main" class="main shop py-4">

<div class="container">

    <div class="row">
        <div class="col-lg-6">

            <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1}">
                <div>
                    <img alt="" class="img-fluid" src="{{ URL::to($data->picture) }}">
                </div>
               
            </div>

        </div>

        <div class="col-lg-6">

            <div class="summary entry-summary">

                <h1 class="mb-0 font-weight-bold text-7">{{ $data->nama_produk}}</h1>

                <div class="pb-0 clearfix">
                    <div title="Rated 3 out of 5" class="float-left">
                        <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                    </div>

                    <!-- <div class="review-num">
                        <span class="count" itemprop="ratingCount">2</span> reviews
                    </div> -->
                </div>

                <p class="price">
                    <span class="amount">Rp. {{ number_format($data['harga'],0,".",".")  }}</span>
                </p>

                <p class="mb-4"> </p>

                <!-- <form enctype="multipart/form-data" method="post" class="cart"> -->
                    <!-- <div class="quantity quantity-lg">
                        <input type="button" class="minus" value="-">
                        <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                        <input type="button" class="plus" value="+">
                    </div> -->
                    <a href="https://wa.me/{{$data->no_wa}}?text=Saya mau pesan produk anda" target="_BLANK" class="btn btn-primary btn-modern text-uppercase">Beli Produk</a>
                <!-- </form> -->

                <div class="product-meta">
                    <span class="posted-in">Penjual: <a rel="tag" href="#">{{ $data->penjual}}</a></span>
                </div>

            </div>


        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="tabs tabs-product mb-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a class="nav-link py-3 px-4" href="#productDescription" data-toggle="tab">Deskripsi Produk</a></li>
                    <li class="nav-item"><a class="nav-link py-3 px-4" href="#productInfo" data-toggle="tab">Informasi Produk</a></li>
                </ul>
                <div class="tab-content p-0">
                    <div class="tab-pane p-4 active" id="productDescription">
                        <p>{!! $data->deskripsi !!} </p>
                       
                    </div>
                    <div class="tab-pane p-4" id="productInfo">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <th class="border-top-0">
                                        Jumlah Produk
                                    </th>
                                    <td class="border-top-0">
                                    {{ $data->satuan}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Harga
                                    </th>
                                    <td>
                                    Rp. {{ number_format($data['harga'],0,".",".")  }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Penjual
                                    </th>
                                    <td>
                                    {{ $data->penjual}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="col">
            <hr class="solid my-5">

            <h4 class="mb-3">Related <strong>Products</strong></h4>
            <div class="masonry-loader masonry-loader-showing">
                <div class="row products product-thumb-info-list mt-3" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                    <div class="col-12 col-sm-6 col-lg-3 product">
                        <span class="product-thumb-info border-0">
                            <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                <span class="text-uppercase text-1">Add to Cart</span>
                            </a>
                            <a href="shop-product-sidebar-left.html">
                                <span class="product-thumb-info-image">
                                    <img alt="" class="img-fluid" src="img/products/product-grey-1.jpg">
                                </span>
                            </a>
                            <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                <a href="shop-product-sidebar-left.html">
                                    <h4 class="text-4 text-primary">Photo Camera</h4>
                                    <span class="price">
                                        <del><span class="amount">$325</span></del>
                                        <ins><span class="amount text-dark font-weight-semibold">$299</span></ins>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 product">
                        <span class="product-thumb-info border-0">
                            <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                <span class="text-uppercase text-1">Add to Cart</span>
                            </a>
                            <a href="shop-product-sidebar-left.html">
                                <span class="product-thumb-info-image">
                                    <img alt="" class="img-fluid" src="img/products/product-grey-2.jpg">
                                </span>
                            </a>
                            <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                <a href="shop-product-sidebar-left.html">
                                    <h4 class="text-4 text-primary">Golf Bag</h4>
                                    <span class="price">
                                        <span class="amount text-dark font-weight-semibold">$72</span>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 product">
                        <span class="product-thumb-info border-0">
                            <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                <span class="text-uppercase text-1">Add to Cart</span>
                            </a>
                            <a href="shop-product-sidebar-left.html">
                                <span class="product-thumb-info-image">
                                    <img alt="" class="img-fluid" src="img/products/product-grey-3.jpg">
                                </span>
                            </a>
                            <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                <a href="shop-product-sidebar-left.html">
                                    <h4 class="text-4 text-primary">Workout</h4>
                                    <span class="price">
                                        <span class="amount text-dark font-weight-semibold">$60</span>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 product">
                        <span class="product-thumb-info border-0">
                            <a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
                                <span class="text-uppercase text-1">Add to Cart</span>
                            </a>
                            <a href="shop-product-sidebar-left.html">
                                <span class="product-thumb-info-image">
                                    <img alt="" class="img-fluid" src="img/products/product-grey-4.jpg">
                                </span>
                            </a>
                            <span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
                                <a href="shop-product-sidebar-left.html">
                                    <h4 class="text-4 text-primary">Luxury bag</h4>
                                    <span class="price">
                                        <span class="amount text-dark font-weight-semibold">$199</span>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
</div>

</div>
            
    </section>
@include('layout.footer')

</body>
</html>
