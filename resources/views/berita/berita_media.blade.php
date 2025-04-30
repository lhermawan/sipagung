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

                <h1 class="text-dark font-weight-bold text-8">Berita Media Luar</h1>
<span class="sub-title text-dark">Check out our Latest News!</span>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="">News</li>
                    <li class="active">Berita Media Luar</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section border-0 m-0 pb-3">
    <div class="container container-lg">
        <div class="row pb-1">
            @foreach ($berita as $item)


            <div class="col-sm-6 col-lg-4 mb-4 pb-2">
                <a href="{{ $item->link}}" target="_blank">
                    <article>
                        <div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                            <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                <img src="{{ URL::to('/images/berita/media/'. $item->avatar) }}" class="img-fluid" alt="How To Take Better Concert Pictures in 30 Seconds">
                                <div class="thumb-info-title bg-transparent p-4">
                                    <div class="thumb-info-type bg-color-primary px-2 mb-1">{{ $item->author}}</div>
                                    <div class="thumb-info-inner mt-1">
                                        <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0">{{ $item->title}}</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </article>
                </a>
            </div>
            @endforeach


        </div>
<ul class="pagination float-right">
                    {!! $berita->links() !!}
                </ul>
    </div>
 
</section><br><br><br>

</div>
@include('layout.footer')

</body>
</html>
