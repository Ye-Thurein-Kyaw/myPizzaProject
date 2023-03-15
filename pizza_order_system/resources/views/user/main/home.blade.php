
@extends('user.layouts.appUser')

@section('content')
     <!-- Shop Start -->
     <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by Categories</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class=" d-flex align-items-center  justify-content-between mb-3 bg-dark px-3 py-1">
                            <h3 class="text-warning" for="price-all">Category</h3>
                            <span class="badge font-weight-bold text-warning">{{count($category)}}</span>
                        </div>
                        <hr>
                        @foreach ($category as $c)
                        <a href="" class="text-decoration-none">
                            <div class=" d-flex align-items-center btn justify-content-between mb-3 shadow-sm">
                                <label class="" for="price-all">{{$c->name}}</label>
                            </div>
                        </a>
                        @endforeach

                    </form>
                </div>
                <!-- Price End -->
                {{-- <div class="bg-light p-4 mb-30 ">
                    <form action="">
                        <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                            <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                            <i class="fa fa-angle-down text-dark"></i>
                        </a>
                        <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                            <div class="navbar-nav w-100">
                                @foreach ($category as $c)
                                    <div class="nav-item dropdown dropright">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $c->name}}<i class="fa fa-angle-right float-right mt-1"></i></a>
                                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                            <a href="" class="dropdown-item">Men's Dresses</a>
                                            <a href="" class="dropdown-item">Women's Dresses</a>
                                            <a href="" class="dropdown-item">Baby's Dresses</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </nav>
                    </form>
                </div> --}}
                <div class="">
                    <button class="btn btn btn-warning w-100">Order</button>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       @foreach ($product as $p)
                       <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{asset('storage/'.$p->image)}}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa-sharp fa-solid fa-info"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{$p->name}}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $p->price}}Kyats</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-warning mr-1"></small>
                                    <small class="fa fa-star text-warning mr-1"></small>
                                    <small class="fa fa-star text-warning mr-1"></small>
                                    <small class="fa fa-star text-warning mr-1"></small>
                                    <small class="fa fa-star text-warning mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                       @endforeach
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection
