@extends('admin.layouts.app')

@section('title', 'Category List')

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
                                <h2 class="title-1">Category List</h2>

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
                            <h3> Total - ( {{ $categories->total()}} )</h3>
                        </div>
                       <div class="col-3 offset-7">
                        <form class="form-header" action="{{ route('category#list')}}" method="get">
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

                    @if (count($categories) != 0)
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Created Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr class="tr-shadow">
                                    <td>{{ $category->id}}</td>

                                    <td class="col-5">{{ $category->name}}</td>

                                    <td>{{ $category->created_at->format('j-F-Y')}}</td>

                                    <td>
                                        <div class="table-data-feature ">
                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button> --}}
                                            <a href="{{ route('category#edit', $category->id)}}">
                                                <button class="item mx-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{ route('category#delete', $category->id)}}">
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
                            {{ $categories->appends(request()->query())->links()}}
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
