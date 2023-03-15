@extends('admin.layouts.app')

@section('title', 'Product Edit Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-3">
                        <button class="btn bg-dark text-white my-3" onclick="history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Product</h3>
                            </div>

                            <hr>
                            <form action="{{ route('product#update', $product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-10 offset-1">
                                    <div class="">
                                        <input type="hidden" name="productId" value="{{$product->id}}">
                                            <img src="{{ asset('storage/'.$product->image)}}" alt="John Doe" />

                                        <div class="mt-2 mb-2">
                                            <input type="file" name="productImage" class="form-control @error('name') is-invalid @enderror ">
                                            @error('productImage')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input id="category" name="productName" type="text" class="form-control  @error('productName') is-invalid @enderror "  value="{{ old('productName', $product->name) }}" aria-required="true" aria-invalid="false" >
                                            @error('productName')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select name="productCategory" class="form-control   @error('productCategory') is-invalid @enderror">
                                                <option value="">None</option>
                                                @foreach ($category as $c)
                                                    <option value="{{ $c->id}}" @if ($product->category_id == $c->id) selected @endif>{{$c->name}}</option>
                                                @endforeach
                                            </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Price (Kyats)</label>
                                            <input id="category" name="productPrice" type="number" class="form-control  @error('price') is-invalid @enderror "  value="{{ old('productPrice', $product->price) }}" aria-required="true" aria-invalid="false" >
                                            @error('productPrice')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Waiting Time (mins)</label>
                                            <input id="category" name="waitingTime" type="number" class="form-control  @error('waitingTime') is-invalid @enderror "  value="{{ old('waitingTime', $product->waiting_time) }}" aria-required="true" aria-invalid="false" >
                                            @error('waitingTime')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">View Count</label>
                                            <input id="category" name="viewCount" disabled type="number" class="form-control"  value="{{ old('viewCount', $product->view_count) }}" aria-required="true" aria-invalid="false" >
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Description</label>
                                            <input id="category" name="productDescription" type="text" class="form-control  @error('productDescription') is-invalid @enderror "  value="{{ old('productDescription', $product->description) }}" aria-required="true" aria-invalid="false" >
                                            @error('productDescription')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-5 offset-3">
                                        <button class="btn bg-dark text-white" type="submit">
                                            Update Product<i class="fa-solid fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
