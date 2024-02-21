@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row">
            <div class="mt-5">
                <div class="col-md-10">
                    <h3>Product Name: {{ $products->name }}</h3>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <h4>Product Description:</h4>
                <p>{{ $products->description }}</p>
            </div>
            <div class="col-md-6">
                <img style="width: 100%; height: 400px; object-fix: cover;" src="/products/{{ $products->image }}" alt="" class="image-fluid">
            </div>
        </div>
    </div>
@endsection
