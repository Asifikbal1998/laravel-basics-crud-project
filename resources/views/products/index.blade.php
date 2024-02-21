@extends('layouts.app')
@section('main')
    <div class="container">
        <div style="text-align: right;">
            <a class="btn btn-dark mt-2" href="{{ route('products.create') }}">Add Product</a>
        </div>
        <h1>Products</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td><a style="color: black; text-decoration: none;"
                                        href="{{ route('products.view', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                </td>
                                <td><img class="rounded-circle" width="50px" height="50px"
                                        src="products/{{ $product->image }}"></td>
                                <td>
                                    <a href="{{ route('products.edit', ['id' => $product->id]) }}"><button
                                            class="btn btn-success ">Edit</button></a>
                                    <a href="{{ route('products.delete', ['id' => $product->id]) }}"><button
                                            class="btn btn-danger ">Delete</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
