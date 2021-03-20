<script>
					$('.nav > ul > li> a').click(()=>{
						$(this).parent().addClass('active');
					});
					</script>
				
<div class="container-fluid px-3">
						<div class="navbar-top">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
									data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="navbar-brand logo ">
									<a href="{{ url('/') }}"><img src="{!! asset('public/assets/front/images/logo.png') !!}"
											alt=" " class="img-responsive"></a>
								</div>


							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav link-effect-4 " style="display:inline;">
									<li class="first-list"><a   href="{{ url('/') }}">Home</a></li>
									<li ><a href="{{ url('/events') }}" >Events</a></li>
									<li><a href="{{ url('/gallery') }}" >Gallery</a></li>
									<li><a href="{{ url('/results') }}" >Results</a></li>
									<li><a href="{{ url('/ourteam') }}" >Our Team</a></li>
									<li><a href="{{ url('/#about') }}"  >About Us</a></li>
									@if (Route::has('login'))
										@auth
											<li><a href="{{ url('/admin/logout') }}">Logout</a></li>
											<li><a id="myBtn" href="{{ url('/profile') }}">
												<center><img src="{!! asset('public/assets/front/images/avtar.png') !!}"
														alt="Avatar" class="avatar"></center>
											</a></li>
										@else
											<li><a href="{{ route('login') }}">Register/Login</a></li>
										@endauth
									@endif
								</ul>
							</div><!-- /.navbar-collapse -->
						</div>
					</div>
					