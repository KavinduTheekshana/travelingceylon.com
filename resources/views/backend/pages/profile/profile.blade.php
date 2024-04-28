@extends('layouts.backend')

@section('content')
    <!--wrapper-->
    <div class="wrapper">








        @include('backend.components.sidemenu')
        @include('backend.components.header')

        <div class="page-wrapper">
            <div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                @section('page_group', 'User Profile')
                @section('page_name', 'Profile Details')
                @include('backend.components.breadcrumb')
            </div>


            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="{{ asset(Auth::user()->profile) }}" alt="Admin"
                                            class="rounded-circle p-1 bg-primary user-profile-round" width="110">
                                        <div class="mt-3">
                                            <h4> {{ Auth::user()->name }}</h4>
                                            <p class="text-secondary mb-1">Admin</p>
                                            <br>
                                            <p class="text-muted font-size-sm">Hi 👋 I'm Thushani, the tour coordinator.
                                                I'm Sri Lankan but living in the UK at the moment. I've got my
                                                trustworthy guide team in Sri Lanka who can help you to create your
                                                travel experience precious.</p>
                                            {{-- <button class="btn btn-primary">Follow</button>
                                            <button class="btn btn-outline-primary">Message</button> --}}
                                        </div>
                                    </div>
                                   

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            @include('backend.components.alert')
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">User Details</h5>
                                    <form method="POST" action="{{ route('profile.save.details') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="name" class="form-control" value=" {{ Auth::user()->name }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" class="form-control" value=" {{ Auth::user()->email }}" readonly disabled/>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="phone" class="form-control" value=" {{ Auth::user()->phone }}" />
                                        </div>
                                    </div>
                                  
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="address" class="form-control"
                                                value=" {{ Auth::user()->address }}" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="d-flex align-items-center mb-3">Update Password</h5>
                                            <form method="POST" action="{{ route('profile.save.password') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Password</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Password" />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Confirm Password</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="password" name="password_confirmation" class="form-control"
                                                        placeholder="Confirm Password" />
                                                </div>
                                            </div>

                                           

                                         
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="Update Password" />
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="d-flex align-items-center mb-3">Profile Picture</h5>
                                            <form method="POST" action="{{ route('profile.save.picture') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{ Auth::user()->id }}" hidden>
                                            
                                            <div class="form-row">
                                                <label for="input1" class="form-label">Select profile Image</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                    <input type="file" class="form-control" name="image" required
                                                        id="inputGroupFile01" onchange="readURL(this);">
                                                </div>
        
                                                <img id="blah"
                                                    src="{{ asset('backend/assets/images/default.jpg') }}"
                                                    class="placeholder-image" alt="your image" />
                                            </div>
                                           

                                            <div class="row">
                                               
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="submit" class="btn btn-primary px-4" value="Update Profile Picture" />
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


    @include('backend.components.footer')

</div>

@endsection
@push('scripts')
<script>

    // image display
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
            };

            reader.readAsDataURL(input.files[0]);
        }
    }





</script>


@endpush