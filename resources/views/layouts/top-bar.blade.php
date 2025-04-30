<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="" class="logo">
						<img src="{{ URL::to('assets/img/nameporprov.jpeg') }} " width="90" height="50" alt="">
					</a>
                </div>
				<!-- /Logo -->
				
				<a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</a>
				
				<!-- Header Title -->
                <div class="page-title-box">
					<h3>PORPROV</h3>
                </div>
				<!-- /Header Title -->
				
				<a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
				
				<!-- Header Menu -->
				<ul class="nav user-menu">
				
					<!-- Search -->
					<li class="nav-item">
						<div class="top-nav-search">
							<a href="javascript:void(0);" class="responsive-search">
								<i class="fa fa-search"></i>
						   </a>
						   <!--
							<form action="search.html">
								<input class="form-control" type="text" placeholder="Search here">
								<button class="btn" type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</li>

					-->
				
					
					<!-- /Notifications -->
					
					<!-- Message Notifications -->
					
					<!-- /Message Notifications -->

					<li class="nav-item dropdown has-arrow main-drop">
						<a href="{{ route('logout') }}" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img src="{{ URL::to('/images/'. auth()->user()->avatar) }}" alt="{{ auth()->user()->avatar }}" alt="user">
							<span class="status online"></span></span>
							<span></span>
						</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="{{ route('admin/pengguna/ganti_password') }}">Ganti Password</a>
							<a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
						</div>
					</li>
				</ul>
				<!-- /Header Menu -->
				
				<!-- Mobile Menu -->
				
				<!-- /Mobile Menu -->
				
            </div>
