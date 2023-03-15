@extends('admin.layouts.app')

@section('title', 'Create Product Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('product#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Product Create</h3>
                            </div>
                            <hr>
                            <form action="{{ route('product#create')}}" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label  class="control-label mb-1">Image</label>
                                    <input type="file" name="productImage" class="form-control  @error('productImage') is-invalid @enderror">
                                        @error('productImage')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Name</label>
                                    <input id="category" name="productName" type="text" class="form-control @error('productName') is-invalid @enderror" value="{{ old('categoryName')}}" aria-required="true" aria-invalid="false" placeholder="name...">
                                        @error('productName')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Category</label>
                                    <select name="productCategory" class="form-control  @error('productCategory') is-invalid @enderror">
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id}}">{{ $c->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('productCategory')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Description</label>
                                    <textarea name="productDescription" class="form-control  @error('productDescription') is-invalid @enderror" cols="5" rows="1" placeholder="Enter description"></textarea>
                                    @error('productDescription')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label  class="control-label mb-1">Price</label>
                                    <input id="category" name="productPrice" type="number" class="form-control @error('productPrice') is-invalid @enderror" value="{{ old('categoryName')}}" aria-required="true" aria-invalid="false" placeholder="Enter Price...">
                                        @error('productPrice')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label  class="control-label mb-1">Waiting Time</label>
                                    <input id="category" name="waitingTime" type="number" class="form-control @error('waitingTime') is-invalid @enderror" value="{{ old('categoryName')}}" aria-required="true" aria-invalid="false" placeholder="Enter Price...">
                                        @error('waitingTime')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>

                                <div>
                                    <button id="category-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="category-button-amount">Create</span>
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
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
