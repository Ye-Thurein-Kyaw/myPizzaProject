@extends('admin.layouts.app')

@section('title', 'Product List')

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
                                <h2 class="title-1">Product List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('product#createPage')}}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add product
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-2 shadow-sm p-2 text-center">
                            <h3> Total - ( {{$pizzas->total()}} )</h3>
                        </div>
                        <div class="col-3 offset-7">
                            <form class="form-header" action="{{ route('product#list')}}" method="get">
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

                    @if (count($pizzas) != 0)
                    <div class="table-responsive table-responsive-data2 mt-2 ">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    {{-- <th>Id</th> --}}
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Waiting Time</th>
                                    <th>View Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pizzas as $p)
                                <tr class="tr-shadow">
                                    {{-- <td>{{ $p->id}}</td> --}}
                                    <td><img src="{{ asset('storage/'.$p->image) }}" class="img-thumbnail shadow-sm" width="150px" height="100px"></td>

                                    <td class="">{{ $p->name}}</td>

                                    <td>{{$p->category_name}}</td>
                                    <td>{{$p->price}}</td>
                                    <td>{{$p->waiting_time}} mins</td>
                                    <td><i class="fa-solid fa-eye me-2"></i>{{$p->view_count}}</td>

                                    <td>
                                        <div class="table-data-feature ">
                                            <a href="{{ route('product#details', $p->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('product#edit', $p->id)}}">
                                                <button class="item mx-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('product#delete',$p->id)}}">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                 <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{-- {{ $categories->links()}} ဒါနဲ့ရေးရင် ဆာဗာဖက်မှာ appends လုပ်ပေးရမယ် --}}
                            {{ $pizzas->appends(request()->query())->links()}}
                        </div>

                    </div>
                    @else
                        <h1 class="text-secondary text-center mt-5">There is no category</h1>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
