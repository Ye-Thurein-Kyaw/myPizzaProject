
@extends('user.layouts.appUser')

@section('content')
     <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 offset-lg-3">
                        <a href="{{ route('user#home')}}"><button class="btn bg-dark text-warning my-3">Back</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-3 col-sm-4 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body bg-dark">
                            <div class="card-title">
                                <h3 class="text-center text-warning title-2">Password Change Page</h3>
                            </div>
                            @if (session('updateFail'))
                                <div >
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fa-solid fa-triangle-exclamation"></i>  {{session('updateFail')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <form action="{{ route('user#changePassword')}}" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label  class="control-label mb-1">Old Password</label>
                                    <input id="category" name="oldPassword" type="password" class="form-control  @error('oldPassword') is-invalid @enderror" value="{{ old('categoryName')}}" aria-required="true" aria-invalid="false" placeholder="Enter old password..." >
                                        @error('oldPassword')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror

                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">New Password</label>
                                    <input id="category" name="newPassword" type="password" class="form-control @error('newPassword') is-invalid @enderror" value="{{ old('categoryName')}}" aria-required="true" aria-invalid="false" placeholder="Enter new password...">
                                        @error('newPassword')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Confirm Passwrod</label>
                                    <input id="category" name="confirmPassword" type="password" class="form-control @error('confirmPassword') is-invalid @enderror" value="{{ old('categoryName')}}" aria-required="true" aria-invalid="false" placeholder="Enter new password again...">
                                        @error('confirmPassword')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                        @enderror
                                </div>

                                <div>
                                    <button id="category-button" type="submit" class="btn btn-lg btn-warning fw-bold btn-block">
                                        <span id="category-button-amount"><i class="fa-solid fa-key"></i>  Change Password</span>
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}

                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
