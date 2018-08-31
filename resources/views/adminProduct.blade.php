<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body cz-shortcut-listen="true">
		<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow mb-5">
		  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/dashboard">Dashboard</a>
		  <ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
			  <a class="nav-link" href="/logout">Sign out</a>
			</li>
		  </ul>
		</nav>
	
		<div class="container-fluid mt-5">
		  <div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
			  <div class="sidebar-sticky">
				<ul class="nav flex-column">
				  {{--  <li class="nav-item">
					<a class="nav-link active" href="#">
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
					  Dashboard <span class="sr-only">(current)</span>
					</a>
				  </li>  --}}
				  <li class="nav-item">
					<a class="nav-link" href="/dashboard">
					  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
					  Products
					</a>
				  </li>
				</ul>
			  </div>
			</nav>
	
			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
				<div class="album py-5 bg-light">
						<div class="container">
							<div class="row">
								@foreach($product as $product)
									<div class="col-md-12">
										<div class="card mb-12 shadow-sm">
											<div class="card-body">
											<h3 class="card-title">{{$product->name}}</h3>
											<p class="card-text">{{$product->description}}</p>
											<div class="row">
												<div class="col-md-6">
													<span>{{$product->sku}}</span>
												</div>
												<div class="col-md-6">
													<p>R{{$product->price}}</p>
												</div>
												<div class="col-md-12">
													<p>View Count: {{$product->view_count}}</p>
												</div>
											</div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div>
					@if(count($product->bid))
						<div class="album py-5 ">
							<div class="container">
								<div class="row">
										<div class="col-md-12">
											<h1>Bids</h1>
										</div>
										
										@if($highest)
										<div class="card-body col-md-4">
											<h2>Highest Bid</h2>
											<p>{{$highest->email}}</p>
											<p>R{{$highest->amount}}</p>
										</div>
										@endif
										@if($average > 0)
										<div class="card-body col-md-4">
											<h2>Average Bid</h2>
											<p>R{{$average}}</p>
										</div>
										@endif
										@if($lowest)
										<div class="card-body col-md-4">
											<h2>Lowest Bid</h2>
											<p>{{$lowest->email}}</p>
											<p>R{{$lowest->amount}}</p>
										</div>
										@endif
								</div>
								@foreach($product->bid as $bid)
								<div class="row">
									<div class="col-md-6">
										<p>{{$bid->email}}</p>
									</div>
									<div class="col-md-6">
										<p>R{{$bid->amount}}</p>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					@endif
			</main>
		  </div>
		</div>
		
		<!-- Icons -->
		<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
		<script>
		  feather.replace()
		</script>
	  
	
	</body>