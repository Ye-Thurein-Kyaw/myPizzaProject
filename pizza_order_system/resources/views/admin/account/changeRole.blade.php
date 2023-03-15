@extends('admin.layouts.app')

@section('title', 'Change Role Page')

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
                                <h3 class="text-center title-2">Change Role</h3>
                            </div>

                            <hr>
                            <form action="{{ route('admin#roleChange', $account->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-10 offset-1">
                                    <div class="">

                                        @if ($account->image ==  null )
                                            <img src="{{ asset('image/default-user.png')}}" class="img-thumbnail shadow-sm  h-75">
                                        @else
                                            <img src="{{ asset('storage/'.$account->image)}}" alt="John Doe" />
                                        @endif



                                    </div>

                                    <div class="">
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Name</label>
                                            <input id="category" name="name" disabled type="text" class="form-control  @error('name') is-invalid @enderror "  value="{{ old('name', $account->name) }}" aria-required="true" aria-invalid="false" >
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="admin" @if ($account->role == 'admin') selected @endif>Admin</option>
                                                <option value="user" @if ($account->role == 'user') selected @endif>User</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Email</label>
                                            <input id="category" name="email" disabled type="text" class="form-control  @error('email') is-invalid @enderror "  value="{{ old('email', $account->email) }}" aria-required="true" aria-invalid="false" >
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Phone</label>
                                            <input id="category" name="phone" disabled type="text" class="form-control  @error('phone') is-invalid @enderror "  value="{{ old('phone', $account->phone) }}" aria-required="true" aria-invalid="false" >
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
                                                <option value="male" @if ( $account->gender == 'male') selected @endif >Male</option>
                                                <option value="female" @if ( $account->gender == 'female') selected @endif >Female</option>
                                            </select>
                                        @error('gender')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label  class="control-label mb-1">Address</label>
                                            <textarea name="address" disabled class="form-control   @error('address') is-invalid @enderror" cols="5" rows="1">{{ old('address', $account->address) }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror disabled
                                        </div>

                                    </div>
                                    <div class="col-5 offset-3">
                                        <button class="btn bg-dark text-white" type="submit">
                                            Change<i class="fa-solid fa-arrow-right ms-2"></i>
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
