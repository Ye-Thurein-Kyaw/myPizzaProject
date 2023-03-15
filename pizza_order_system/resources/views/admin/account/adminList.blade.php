@extends('admin.layouts.app')

@section('title', 'Admin List')

@section('content')


    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Admin List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('category#createPage')}}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Category
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-2 shadow-sm p-2 text-center">
                            <h3> Total - ( {{ $admin->total()}}  )</h3>
                        </div>
                       <div class="col-3 offset-7">
                        <form class="form-header" action="{{ route('admin#list')}}" method="get">
                            @csrf
                            <input class="au-input au-input-xl" type="text" name="key" placeholder="Search Category..." value="{{request('key')}}"/>
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                       </div>
                    </div>

                    @if (session('createSuccess'))
                    <div class="col-12 mt-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>  {{session('createSuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>
                    @endif

                    @if (session('deleteSuccess'))
                    <div class="col-12 mt-2">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>  {{session('deleteSuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>
                    @endif

                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $admin)
                                <tr class="tr-shadow">


                                     <td class="img-thumbnail shadow-sm" width="150px" height="100px">
                                        @if ($admin == null)
                                            @if ($admin->gender == 'male')
                                                <img src="{{ asset('image/maleDefault.png')}}" alt="">
                                            @else
                                                <img src="{{ asset('image/download.png')}}" alt="">
                                            @endif
                                         @else
                                            <img src="{{ asset('storage/'.$admin->image)}}" alt="">
                                         @endif
                                    </td>

                                    <td class="">{{ $admin->name}}</td>
                                    <td class="">{{ $admin->email}}</td>
                                    <td class="">{{ $admin->phone}}</td>
                                    <td class="">{{ $admin->gender}}</td>
                                    <td>{{ $admin->created_at->format('j-F-Y')}}</td>

                                    <td>
                                        <div class="table-data-feature ">

                                            {{-- <a href="">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a> --}}

                                            {{-- <a href="@if( Auth::user()->id == $admin->id) # @else {{ route('admin#deleteAcc')}} @endif">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                 <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </a> --}}
                                            @if (Auth::user()->id == $admin->id)

                                            @else
                                                <a href="{{ route('admin#changeRole', $admin->id)}}">
                                                    <button class="item mx-2" data-toggle="tooltip" data-placement="top" title="Role Change">
                                                        <i class="fa-solid fa-person-circle-minus"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('admin#deleteAcc', $admin->id)}}">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{-- {{ $admin->links()}} ဒါနဲ့ရေးရင် ဆာဗာဖက်မှာ appends လုပ်ပေးရမယ် --}}
                            {{-- {{ $admin->appends($request()->query())->links()}} --}}
                        </div>

                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
