@extends('layouts.app')

@section('content')
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
							</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	@if(count($product ->bid))
		<div class="album py-5 ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Bids</h1>
						@if($highest)
						<div class="card-body">
							<h2>Highest Bid</h2>
							<p>{{$highest->email}}</p>
							<p>{{$highest->amount}}</p>
						</div>
						@endif
						@if($lowest)
						<div class="card-body">
							<h2>Lowest Bid</h2>
							<p>{{$lowest->email}}</p>
							<p>{{$lowest->amount}}</p>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	@endif
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Add a Bid</h1>
					<div class="row text-center">
							<form method="POST" action="{{ route('bid_create') }}" aria-label="{{ __('bid_create') }}">
									@csrf
			
									<div class="form-group row">
										<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
			
										<div class="col-md-6">
											<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus required>
											<input id="id" value={{$product->id}} type="text" name="id" hidden>

											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>
			
									<div class="form-group row">
										<label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>
			
										<div class="col-md-6">
											<input id="amount" type="number" min="1" step="any" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="amount" >
										</div>
									</div>		

										<span class="invalid-feedback" role="alert">
											<ul>
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach 
											</ul>
										</span>
									<div class="form-group row mb-0">
										<div class="col-md-8 offset-md-4">
											<button type="submit" class="btn btn-primary">
												{{ __('Create') }}
											</button>
			
										</div>
									</div>
								</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection