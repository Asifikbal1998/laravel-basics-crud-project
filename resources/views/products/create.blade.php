@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3">
                            <label>Name</label>
                            <input class="form-control" type="text" name="productname" id=""
                                placeholder="Product Name" value="{{ old('productname') }}" required>
                            @if ($errors->has('productname'))
                                <span class="text-danger">{{ $errors->first('productname') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="" cols="10" rows="4"
                                placeholder="Product Description" required>{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group mt-3">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image" value="{{ old('image') }}"
                                id="" required>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <input class="mt-3 btn btn-primary" type="submit" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
