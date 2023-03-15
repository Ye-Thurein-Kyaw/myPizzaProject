@extends('admin.layouts.app')

@section('title', 'Admin Profile Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-3 offset-1">
                        <a href="{{ route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                    <div class="col-4 offset-3">
                        @if (session('updateSuccess'))
                            <div class="">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i>  {{session('updateSuccess')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Admin Profile</h3>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-3 offset-1">
                                    @if (Auth::user()->image ==  null )
                                        @if (Auth::user()->gender == 'male')
                                            <img src="{{ asset('image/maleDefault.png')}}" alt="">
                                        @else
                                            <img src="{{ asset('image/download.png')}}" alt="">
                                         @endif
                                    @else
                                        <img src="{{ asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                    @endif
                                </div>
                                <div class="col-5 offset-1 ">
                                    <h4 class="my-3"> <i class="fa-solid fa-user me-2"></i> {{ Auth::user()->name}}</h4>
                                    <h4 class="my-3"> <i class="fa-sharp fa-solid fa-envelope me-2"></i> {{ Auth::user()->email}}</h4>
                                    <h4 class="my-3"> <i class="fa-solid fa-phone me-2"></i> {{ Auth::user()->phone}}</h4>
                                    <h4 class="my-3"> <i class="fa-solid fa-venus-mars me-2"></i> {{ Auth::user()->gender}}</h4>
                                    <h4 class="my-3"> <i class="fa-sharp fa-solid fa-address-card me-2"></i> {{ Auth::user()->address}}</h4>
                                    <h4 class="my-3"> <i class="fa-solid fa-calendar-days me-2"></i> {{ Auth::user()->created_at->format('j-F-Y')}}</h4>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-4 offset-6 mt-3">
                                    <a href="{{ route('admin#edit')}}">
                                        <button class="btn bg-dark text-white">
                                            <i class="fa-solid fa-user-pen me-2"></i> Edit Profile
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
