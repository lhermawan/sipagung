
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 



<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Vidio Galeri</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Vidio Galeri</a></li>
									<li class="breadcrumb-item active">Edit Vidio Galeri</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					{{-- message --}}
                    {!! Toastr::message() !!}
					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Edit Vidio Galeri</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('admin/galeri_vidio/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Pengapload/Media</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('nama_media') is-invalid @enderror" value="{{$data[0]->nama_media}}" name="nama_media" value="{{ old('nama_media') }}" type="text" id="nama_media" placeholder="Masukkan nama Pengapload / Nama Media" required>
                                                <input class="form-control @error('id_vidio_galeri') is-invalid @enderror" value="{{$data[0]->id_vidio_galeri}}" name="id_vidio_galeri" value="{{ old('id_vidio_galeri') }}" type="hidden" id="id_vidio_galeri"  readonly required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Vidio</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title') is-invalid @enderror" name="judul" value="{{$data[0]->judul}}" type="text" id="title" placeholder="Masukkan Judul Vidio" onkeyup="createTextSlug()" required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title Slug (Terisi Otomatis)</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title_slug') is-invalid @enderror" name="title_slug" value="{{$data[0]->title_slug}}" type="text" id="title_slug"  readonly required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$data[0]->tanggal}}"  type="date" id="tanggal" placeholder="Tanggal" required>
                                                @error('tanggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">URL VIDIO</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('url') is-invalid @enderror" name="url" value="{{$data[0]->url}}"  type="text" id="url" placeholder="URL VIDIO" required>
                                                @error('url')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                     
                                
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Publikasi</button>
                                                <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                                            </div>
                                        </div>

										</div>
									</form>
								</div>
							</div>
					
        </div>
    </div>
    <!-- content --> 
    @include('layouts/footer')


    <script>
    function createTextSlug()
    {
        var title = document.getElementById("title").value;
                    document.getElementById("title_slug").value = generateSlug(title);
    }
    function generateSlug(text)
    {
        return text.toString().toLowerCase()
            .replace(/^-+/, '')
            .replace(/-+$/, '')
            .replace(/\s+/g, '-')
            .replace(/\-\-+/g, '-')
            .replace(/[^\w\-]+/g, '');
    }
</script>