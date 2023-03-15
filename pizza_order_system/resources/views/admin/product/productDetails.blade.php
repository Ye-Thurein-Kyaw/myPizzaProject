@extends('admin.layouts.app')

@section('title', 'Product Details Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">



                </div>
                <div class="col-12">
                    @if (session('updateSuccess'))
                        <div class="">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>  {{session('updateSuccess')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <button class="btn bg-dark text-white" onclick="history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>
                                </div>
                                <div class="">
                                    <h3 class="text-center title-2">Product Details</h3>
                                </div>
                                <div class="">
                                    <a href="{{ route('product#edit',$product->id)}}">
                                        <button class="btn bg-dark text-white ">
                                            <i class="fa-solid fa-user-pen me-2"></i> Edit Product
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3 offset-1">
                                        <img src="{{ asset('storage/'.$product->image)}}" alt="John Doe" />
                                </div>
                                <div class="col-5 offset-1 ">
                                    <div class="my-3 btn bg-secondary text-white"> ID - {{ $product->id}} </div>
                                    <div class="my-3 btn bg-secondary text-white"> <i class="fa-brands fa-product-hunt me-2"></i> {{ $product->name}}</div>
                                    <div class="my-3 btn bg-secondary text-white"> <i class="fa-solid fa-table-columns me-2"></i> {{ $product->category_name}}</div>
                                    <div class="my-3 btn bg-secondary text-white"> <i class="fa-solid fa-money-bill-wave me-2"></i> {{ $product->price}} kyats</div>
                                    <div class="my-3 btn bg-secondary text-white"> <i class="fa-solid fa-clock me-2"></i> {{$product->waiting_time}} mins</div>
                                    <div class="my-3 btn bg-secondary text-white"> <i class="fa-solid fa-eye"></i> {{ $product->view_count}}</div>
                                    <div class="my-3 btn bg-secondary text-white"> <i class="fa-solid fa-calendar-days me-2"></i> {{ $product->created_at->format('j-F-Y')}}</div>
                                    <div class="my-3 "><i class="fa-solid fa-file-lines me-2"></i>Details</div>
                                    <div class="">  {{ $product->description}}</div>
                                </div>
                            </div>

                            <div class="row ">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
