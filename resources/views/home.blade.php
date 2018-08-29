@extends('layouts.app')

@section('content')
	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row">
				@foreach($products as $product)
					<div class="col-md-4">
						<div class="card mb-4 shadow-sm">
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
							<div class="d-flex justify-content-between align-items-center">
								<div class="btn-group">
								<a href="/product/{{$product->id}}">
									<button type="button" class="btn btn-sm btn-outline-secondary">View</button>
								</a>
								</div>
							</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
