@extends('admin.layouts.app')

@section('title', 'Admin Profile Page')

@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-10">
                        <a href="{{ route('category#list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Edit Profile</h3>
                            </div>

                            <hr>
                            <form action="{{ route('admin#update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-10 offset-1">
                                    <div class="">

                                        @if (Auth::user()->image ==  null )
                                            <img src="{{ asset('image/default-user.png')}}" class="img-thumbnail shadow-sm  h-75">
                                        @else
                                            <img src="{{ asset('storage/'.Auth::user()->image)}}" alt="John Doe" />
                                        @endif


                                        <div class="mt-2 mb-2">
                                            <input type="file" name="image" class="form-control @error('name') is-invalid @enderror ">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input id="category" name="name" type="text" class="form-control  @error('name') is-invalid @enderror "  value="{{ old('name', Auth::user()->name) }}" aria-required="true" aria-invalid="false" >
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Email</label>
                                            <input id="category" name="email" type="text" class="form-control  @error('email') is-invalid @enderror "  value="{{ old('email', Auth::user()->email) }}" aria-required="true" aria-invalid="false" >
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Phone</label>
                                            <input id="category" name="phone" type="text" class="form-control  @error('phone') is-invalid @enderror "  value="{{ old('phone', Auth::user()->phone) }}" aria-required="true" aria-invalid="false" >
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control   @error('gender') is-invalid @enderror">
                                                <option value="">None</option>
                                                <option value="male" @if ( Auth::user()->gender == 'male') selected @endif >Male</option>
                                                <option value="female" @if ( Auth::user()->gender == 'female') selected @endif >Female</option>
                                            </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Address</label>
                                            <textarea name="address" class="form-control   @error('address') is-invalid @enderror" cols="5" rows="1">{{ old('address', Auth::user()->address) }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Role</label>
                                            <input id="category" name="role" type="text" class="form-control"  value="{{ old('role', Auth::user()->role) }}" aria-required="true" aria-invalid="false" disabled>


                                        </div>
                                    </div>
                                    <div class="col-5 offset-3">
                                        <button class="btn bg-dark text-white" type="submit">
                                            Update Profile<i class="fa-solid fa-arrow-right ms-2"></i>
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
