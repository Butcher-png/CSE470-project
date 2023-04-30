</head>
	<body>
		<!-- HEADER -->
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="home/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
                        <li>
                        @if (Route::has('login'))
                            @auth
                            <x-app-layout>

                            </x-app-layout>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class ="btn btn-primary" id = "logincss" 
                            href="{{ route('login') }}">
                            Login</a>
                        </li>
                        <li class="nav-item">
                            <a class ="btn btn-success"href="{{ route('register') }}">
                            Register
                        </a>
                        </li>
                        @endauth
                        @endif
								<!-- Wishlist -->

								<!-- /Wishlist -->

								<!-- Cart -->
								
								<!-- /Cart -->

							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>