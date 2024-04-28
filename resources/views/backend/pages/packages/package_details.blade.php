@extends('layouts.backend')

@section('content')
    <!--wrapper-->
    <div class="wrapper">

        @include('backend.components.sidemenu')
        @include('backend.components.header')

        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                @section('page_group', 'Packages')
                @section('page_name', 'Package Details List')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('package.list') }}" type="button" class="btn btn-warning"><i
                                class='bx bx-arrow-back'></i>Back</a>


                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">all added Package Details about <span class="txt-blue">
                    <a href="{{ route('package.list') }}"> "{{ $package->title }}"</a></span> </h6>
            <hr />
            @include('backend.components.alert')
            <div class="card">
                <div class="card-body">
                    <h2>{{ $package->title }}</h2>

                    <img src="{{ asset($package->image) }}" class="model-image" />
                    <br>
                    <br>
                    <span id="active-badge" class="badge bg-success">
                        @if ($package->status == '1')
                            Active
                        @else
                            Deactive
                        @endif
                    </span>
                    <span id="popular-badge" class="badge bg-purple">
                        @if ($package->popular_status == '1')
                        Popular
                    @else
                        Not Popular
                    @endif
                    </span>
                    <span id="category-badge" class="badge bg-primary">{{ $package->days }}D/{{ $package->nights }}N</span>
                    <span id="price-badge" class="badge bg-dark">{{ $package->peoples }} Peoples</span>
                    {{-- <span id="peoples-badge" class="badge bg-warning">{{ $package->price }}</span> --}}
                    <br>
                    <br>
                  <p>{!! $package->description !!}</p>

             

                  @foreach ($package_details as $details)
                  <h3 class="mt-5">DAY {{$details->day}}</h3>
                  <h6>{{$details->title}} | {{$details->location}}</h6>
                  <img src="{{ asset($details->image) }}" class="model-image" />
                  <p>{!! $details->description !!}</p>
    
                  @endforeach


                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->

</div>
<!--end wrapper-->

@include('backend.components.footer')
@endsection
