@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Our Products</h2>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ $product->img }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">
                                    <strong>Brand:</strong> {{ $product->brand }} <br>
                                    <strong>Category:</strong> {{ $product->category }} <br>
                                    <strong>Unit:</strong> {{ $product->unit }} <br>
                                    <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                                </p>
<<<<<<< HEAD
                                <a href="{{ route('detail', $product->id) }}" class="btn btn-primary">View Details</a>
=======
<<<<<<< HEAD
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
=======
                                <!-- <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary">View Details</a> -->
>>>>>>> 9a16f2bc1fd1f07e9c186cd5426a0a19220ee3a6
>>>>>>> 002b1f5a54dc6ebbc4a6095e7c5e4145f611d00d
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
