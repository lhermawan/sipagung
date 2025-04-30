
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 



<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Tambah Berita Baru</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Berita</a></li>
									<li class="breadcrumb-item active">Tambah Berita Baru</li>
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
									<h4 class="card-title mb-0">Form Tambah Berita</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('saveberitaSerbaSerbi') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Author</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('author') is-invalid @enderror" value="Admin" name="author" value="{{ old('author') }}" type="text" id="author" placeholder="Masukkan nama lengkap" readonly required>
                                                <input class="form-control @error('hits') is-invalid @enderror" value="0" name="hits" value="{{ old('hits') }}" type="hidden" id="hits"  readonly required>
                                                @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kategori Berita</label>
                                            <div class="col-sm-10">
                                            <select class="form-control @error('id_kategori_berita') is-invalid @enderror" name="id_kategori_berita" id="id_kategori_berita" required>
                                                <option  value="">---Pilih Kategori Berita---</option>
                                                @foreach ($kategori as $olahraga)
                                                    <option  value="{{$olahraga->id_kategori_berita}}">{{$olahraga->nama_kategori}}</option>
                                                @endforeach 
                                                </select>
                                                @error('id_berita_kategori')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Berita</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" type="text" id="title" placeholder="Masukkan Judul berita" onkeyup="createTextSlug()" required>
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
                                        <label class="col-sm-2 col-form-label">Tanggal Berita</label>
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
                                        <label class="col-sm-2 col-form-label">Waktu</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}" type="time" id="waktu" placeholder="Waktu" required>
                                                @error('waktu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Isi Berita</label>
                                            <div class="col-sm-10">
                                            <textarea rows="4" class="form-control summernote" name="content" value="{{ old('content') }}" placeholder="Masukkan Berita"></textarea>
                                                @error('waktu')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Foto Berita</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar" id="avatar" accept="image/*" multiple="" required>
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Status Postingan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control @error('post_status') is-invalid @enderror" name="post_status" id="post_status" required>
                                                    <option selected disabled>--Status Postingan--</option>
                                                    <option value="Publikasi">Publikasi</option>
                                                    <option value="Draft">Draft</option>
                                                </select>
                                                @error('role_name')
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