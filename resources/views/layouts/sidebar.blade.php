<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main</span>
							</li>
							<li>
								<a href="{{ route('home') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
							</li>

							@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin')

							<li class="submenu">
								<a href="#"><i class="la la-user"></i> <span>Data User</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
	
									<li><a href="{{ route('admin/pengguna/data_pengguna') }}">Semua Akun User</a></li>
								</ul>
							</li>

							
							<li class="menu-title"> 
								<span>Cabang Olahraga</span>
							</li>
							<li>
								<a href="{{ route('admin/jenis_cabor/cabang_olahraga') }}" ><i class="la la-database"></i> <span>Cabang Olahraga</span></a>
							</li>
							<li>
								<a href="{{ route('admin/jenis_cabor/jenis_cabang_olahraga') }}" ><i class="la la-database"></i> <span>Nomor Kategori Cabor</span></a>
							</li>


							<li class="menu-title"> 
								<span>Tim Peserta</span>
							</li>
							<li>
								<a href="{{ route('admin/tim_peserta/peserta') }}" class="noti-dot"><i class="la la-tasks"></i> <span>Peserta</span></a>
							</li>

							@endif

							@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin' OR Auth::check() && Auth::user()->jenis_user == 'Admin Pertandingan')

							<li class="menu-title"> 
								<span>Pertandingan Venue Ciamis</span>
							</li>
							<li>
								<a href="{{ route('admin/pertandingan/data_pertandingan') }}" ><i class="la la-database"></i> <span>Pertandingan</span></a>
							</li>
							
							<li>
								<a href="{{ route('admin/rekap/data_rekap') }}" ><i class="la la-database"></i> <span>Rekap Pertandingan</span></a>
							</li>

							@endif

							@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin' OR Auth::check() && Auth::user()->jenis_user == 'Admin Pertandingan')

							<li class="menu-title"> 
								<span>Pertandingan Luar Venue Ciamis</span>
							</li>
							<li>
								<a href="{{ route('admin/pertandingan/luar_ciamis/data_pertandingan_venue_luar_ciamis') }}" ><i class="la la-database"></i> <span>Pertandingan</span></a>
							</li>

							@endif

							@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin' OR Auth::check() && Auth::user()->jenis_user == 'Admin')

							<li class="menu-title"> 
								<span>Berita Cabang Olahraga</span>
							</li>
							<li>
								<a href="{{ route('admin/berita/data_berita') }}" ><i class="la la-newspaper"></i> <span>Semua Berita Cabor</span></a>
							</li>


							<li class="menu-title"> 
								<span>Berita Serba Serbi</span>
							</li>
							<li>
								<a href="{{ route('admin/berita_serba_serbi/kategori_berita') }}" ><i class="la la-book"></i> <span>Kategori Berita Serba Serbi</span></a>
							</li>
							<li>
								<a href="{{ route('admin/berita_serba_serbi/data_berita_serba_serbi') }}" ><i class="la la-newspaper"></i> <span>Semua Berita Serba Serbi</span></a>
							</li>


							<li class="menu-title"> 
								<span>Galeri Vidio</span>
							</li>
							<li>
								<a href="{{ route('admin/galeri_vidio/data_berita_vidio') }}" ><i class="la la-youtube"></i> <span>Galeri Vidio</span></a>
							</li>

							@endif
@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin' OR Auth::check() && Auth::user()->jenis_user == 'Admin Media')

							<li class="menu-title">
								<span>Berita Media Luar</span>
							</li>
							<li>
								<a href="{{ route('admin/berita/media/berita_media_luar') }}" ><i class="la la-newspaper"></i> <span>Semua Berita Media Luar</span></a>
							</li>




							@endif

							
							@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin')

							<li class="submenu">
								<a href="#"><i class="la la-user"></i> <span>Data Rekapan</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
	
									<li><a href="http://10.10.10.38/data-porprov/public/data/skoring">Rekapan Pertandingan</li>
								</ul>
							</li>

							@endif

							

							@if (Auth::check() && Auth::user()->jenis_user == 'Super Admin' OR Auth::check() && Auth::user()->jenis_user == 'Admin Pertandingan')

							<li class="menu-title"> 
								<span>Live Utama</span>
							</li>
							<li>
								<a href="{{ route('admin/galeri_vidio/data_link_utama') }}" ><i class="la la-database"></i> <span>URL LIVE</span></a>
							</li>

							@endif

							@if (Auth::check() && Auth::user()->jenis_user == 'Admin')

							<li class="menu-title">
								<span>Berita Media Luar</span>
							</li>
							<li>
								<a href="{{ route('admin/berita/media/admin_berita_media_luar') }}" ><i class="la la-newspaper"></i> <span>Semua Berita Media Luar</span></a>
							</li>

							@endif

						
						

						
						
							
							
							

							
							<!-- <li class="menu-title"> 
								<span>Data PORPROV</span>
							</li>
							<li class="submenu">
								<a href="#" class="noti-dot"><i class="la la-user"></i> <span>Cabang Olahraga</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
								<li><a href="">Jenis Olahraga</a></li>
									<li><a href=""></a></li>
								
								</ul>
							</li> -->
						

							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			