
@include('layouts.header')
@include('layouts.top-bar')
@include('layouts.sidebar') 



<div class="page-wrapper">
                <div class="content container-fluid">
					
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Edit Berita</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Berita</a></li>
									<li class="breadcrumb-item active">Edit Berita</li>
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
									<h4 class="card-title mb-0">Edit Berita</h4>
								</div>
								<div class="card-body">
                                <form action="{{ route('admin/berita/update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Author</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('author') is-invalid @enderror" value="{{$data[0]->author}}" name="author" value="{{ old('author') }}" type="text" id="author" placeholder="Masukkan nama lengkap" readonly required>
                                                <input class="form-control @error('id_berita') is-invalid @enderror" value="{{$data[0]->id_berita}}" name="id_berita" value="{{ old('id_berita') }}" type="hidden" id="id_berita"  readonly required>
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
                                            <select class="form-control @error('id_jenis_cabor') is-invalid @enderror"  value="{{ $data[0]->id_jenis_cabor}}" name="id_jenis_cabor" id="id_jenis_cabor" required>
                                            <option value="{{ $data[0]->id_jenis_cabor}}" selected>--Pilihan Sebelumnya ({{ $data[0]->jenis_cabor->jenis_olahraga}})</option>
                                            @foreach ($jenis_cabor as $peser => $item)
                                                        @if (old('id') == $peser)
                                                        <option id="id_jenis_cabor" value="{{$item->id_jenis_cabor}}" >{{ $item->jenis_olahraga}}</option>
                                                        @else
                                                        <option id="id_jenis_cabor" value="{{$item->id_jenis_cabor}}">{{ $item->jenis_olahraga}}</option>
                                                    @endif
                                                @endforeach 
                                                    </select>

                                                   
                                                
                                                @error('id_data_peserta2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Judul Berita</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data[0]->title}}" type="text" id="title" placeholder="Masukkan Judul berita" onkeyup="createTextSlug()" required>
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
                                        <label class="col-sm-2 col-form-label">Tanggal Berita</label>
                                            <div class="col-sm-10">
                                                <input class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$data[0]->tanggal}}"  type="date" id="title" placeholder="Tanggal Berita" required>
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
                                                <input class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{$data[0]->waktu}}" type="time" id="waktu" placeholder="Waktu" required>
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
                                            <textarea rows="4" class="form-control summernote" name="content"  placeholder="Masukkan Berita">{{$data[0]->content}}</textarea>
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
                                                        <input type="file" class="form-control"
                                                            placeholder="Name" id="first-name-icon" name="image"/>
                                                            <div class="d-flex mr-3 rounded-circle thumb-md">
                                                                <img class="d-flex mr-3 rounded-circle thumb-md" width="100" height="100" src="{{ URL::to('/images/berita/'. $data[0]->avatar) }}">
                                                            </div>
                                                        <input type="hidden" name="hidden_image" value="{{ $data[0]->avatar }}">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label">Status Postingan</label>
                                            <div class="col-sm-10">
                                            <select id="post_status" name="post_status" class="form-control">
                                                <option value="Publikasi" {{ $data[0]->post_status=="Publikasi" ? "selected" : ''}}>Publikasi</option>
                                                <option value="Draft" {{ $data[0]->post_status=="Draft" ? "selected" : ''}}>Draft</option>                                                
                                            </select>
                                                @error('post_status')
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