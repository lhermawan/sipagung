
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 



<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Tambah Galeri Vidio</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Vidio</a></li>
									<li class="breadcrumb-item active">Tambah Galeri Vidio Baru</li>
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
									<h4 class="card-title mb-0">Form Tambah Galeri Vidio Baru</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('saveGaleriVidio') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    
                                      
                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Vidio</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title') is-invalid @enderror" name="judul" value="{{ old('judul') }}" type="text" id="title" placeholder="Masukkan Judul berita" onkeyup="createTextSlug()" required>
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
                                                <input class="form-control @error('title_slug') is-invalid @enderror" name="title_slug" value="{{ old('title_slug') }}" type="text" id="title_slug"  readonly required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Vidio</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" type="date" id="title" placeholder="Tanggal Berita" required>
                                                @error('tanggal')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Pengapload / Nama Media</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('nama_media') is-invalid @enderror" name="nama_media" value="{{ old('nama media') }}" type="text" id="nama_media" placeholder="Nama Media" required>
                                                @error('nama_media')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">URL Vidio</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" type="text" id="url" placeholder="URL VIDIO Youtube" required>
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