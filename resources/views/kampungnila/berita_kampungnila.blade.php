@include('layout.head')
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


            <h2 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
									<span>SEMUA</span>
									<span class="word-rotator-words bg-primary">
										<b class="is-visible">BERITA SFV KAMPUNG NILA</b>
										<b>{{ $pegawai["nama_skpd"] }}</b>
									</span>
								</h2>
            </div>

            <div class="col-md-12 align-self-center order-1">

                <ul class="breadcrumb d-block text-center">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">BERITA SFV KAMPUNG NILA KAWALI</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<div class="container py-4">

<div class="row">
    <div class="col-lg-3 order-lg-2">
        <aside class="sidebar">
            <form method="get">
                <div class="input-group mb-3 pb-1">
                    <input class="form-control text-1" name="title" value="{{ request('title') }}" id="title" placeholder="Cari Judul Berita...">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
                    </span>
                </div>
            </form>

            <div class="tabs tabs-dark mb-4 pb-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
                    <li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Arsip</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="popularPosts">
                    @foreach ($berita_popular as $key => $baru)
                        <ul class="simple-post-list">
                            <li>
                                <div class="post-image">
                                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                        <a href="{{ url('kampungnila/detail_berita_kampungnila/'.$baru->title_slug) }}">
                                            <img src="{{ URL::to($baru->picture) }}" width="50" height="50" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="{{ url('kampungnila/detail_berita_kampungnila/'.$baru->title_slug) }}">{!! Str::limit($baru->title, 30, '...') !!}</a>
                                    <div class="post-meta">
                                         {{$baru->created_at}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                    </div>
                    <div class="tab-pane" id="recentPosts">

                        <ul class="simple-post-list">
                        @foreach ($archive as $key => $arsip)
                            <li>
                                <div class="post-image">
                                    <div class="img-thumbnail img-thumbnail-no-borders d-block">
                                        <a href="{{ url('kampungnila/arsip_berita/'.$arsip['month'], $arsip['year']) }}">
                                            <img src="{{URL::to('icon/ilmu-arsip.jpeg') }}" width="50" height="50" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <a href="{{ url('kampungnila/arsip_berita/'.$arsip['month'], $arsip['year']) }}">{{$arsip['month']}} {{$arsip['year']}}</a>
                                    <div class="post-meta">

                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

        </aside>
    </div>

    <div class="col-lg-9 order-lg-1">
        <div class="blog-posts">
        @foreach ($berita as $key => $item)
        <article class="post post-medium">
									<div class="row mb-3">
										<div class="col-lg-5">
											<div class="post-image">
												<a href="{{ url('kampungnila/detail_berita_kampungnila/'.$item->title_slug) }}">
													<img src="{{ URL::to($item->picture) }}" class="img-fluid appear-animation" data-appear-animation="flipInX" data-appear-animation-delay="0" data-appear-animation-duration="1s" />
												</a>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="post-content">
												<h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2"><a href="{{ url('kampungnila/detail_berita_kampungnila/'.$item->title_slug) }}">{{ $item->title}}</a></h2>
												<div class="berita_justify">
                                                <p class="mb-0"> {!! Str::limit($item->content, 330, '...') !!}</p>
                                                </div>
											</div>
										</div>
                                        <span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a href="{{ url('berita/detail_berita_kampungnila/'.$item->title_slug) }}" class="btn btn-xs btn-light text-1 text-uppercase">Baca Selengkapnya</a></span>
									</div>
								</article>
            @endforeach










            <ul class="pagination float-right">
            {{ $berita->links() }}
            </ul>

        </div>
    </div>
</div>

</div>



</div>
@include('layout.footer')

</body>
</html>
