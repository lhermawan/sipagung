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
									<span>DATA</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">{{ $pegawai["nama_skpd"] }}</b>
										<b>LAPAK DESA</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">DATA LAPAK {{ $pegawai["nama_skpd"] }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>



<div role="main" class="main shop py-4">

				<div class="container">
				<div class="input-group">
				<div class="form-outline">
				<form method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Cari Nama Produk" name="title" value="{{ request('title') }}" type="text">
										<span class="input-group-append">
											<button type="submit" class="btn btn-primary text-1 p-2"><i class="fas fa-search m-2"></i></button>
										</span>
									</div>
								</form>
				</div>
				</div>

					<div class="row">
						<div class="col-lg-12">
							
							<div class="masonry-loader masonry-loader-showing">
								<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
								@foreach ($lapak as $key => $item)
									<div class="col-sm-6 col-lg-4 product">
										<a href="{{ url('lapak_desa/detail_lapak/'.$item->id_produk) }}">
											<span class="onsale">Pesan!</span>
										</a>
										<span class="product-thumb-info border-0">
											<a href="{{ url('lapak_desa/detail_lapak/'.$item->id_produk) }}" class="add-to-cart-product bg-color-primary">
												<span class="text-uppercase text-1">Detail Produk</span>
											</a>
											<a href="{{ url('lapak_desa/detail_lapak/'.$item->id_produk) }}">
												<span class="product-thumb-info-image">
													<img alt="" data-appear-animation="flipInY" data-appear-animation-delay="0" data-appear-animation-duration="3s" width="300px" height="200px" src="{{ URL::to($item->picture) }}">
												</span>
											</a>
											<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
												<a href="{{ url('lapak_desa/detail_lapak/'.$item->id_produk) }}">
													<h4 class="text-4 text-dark text-primary">{{$item->nama_produk}}</h4>
													<span class="price">
														<!-- <del><span class="amount">$325</span></del> -->
														<ins><span class="amount text-dark font-weight-semibold"> Rp. {{ number_format($item['harga'],0,".",".")  }}</span></ins>
													</span>
												</a> 
											</span>
										</span>
									</div>
								@endforeach
								</div>
								<div class="row">
									<div class="col">
										<ul class="pagination float-right">
										{{ $lapak->links() }}
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

@include('layout.footer')

</body>
</html>

