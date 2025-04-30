@include('layouts.header')

<body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<a href="/" class="btn btn-primary apply-btn">Dashboard LOGIN</a>
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href=""><img src="{{ URL::to('/asset/img/cira.png') }}" style="width:300px;height:auto;"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">LOGIN Admin Porprov</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
                            {{-- message --}}
                            {!! Toastr::message() !!}
							<form method="POST" action="{{ route('login') }}">
                            @csrf
								<div class="form-group">
                                <label for="username">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="email" id="email" name="email" placeholder="Enter email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
								</div>


								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>Password</label>
										</div>
										<div class="col-auto">
										</div>
									</div>
									<input class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" type="password" id="password" name="password" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
								</div>
								
								<div class="form-group text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
								<div class="account-footer">
									
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
      
    @include('layouts.footer')
</script>