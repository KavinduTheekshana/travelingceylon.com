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
                @section('page_name', 'Update Package Details')
                @include('backend.components.breadcrumb')

                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('package.details.list', ['id' => $package->id]) }}" type="button" class="btn btn-warning"><i class='bx bx-arrow-back'></i>Back to List</a>

                    </div>
                </div>
             
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Update Package Details</h6>
                    <hr />

                    @include('backend.components.alert')

                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('package.update.details') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Package Title</label>
                                        <input type="text" class="form-control background-txt" id="myTextbox"
                                        value="{{ $package->title }}" readonly
                                            placeholder="Package Title">

                                        <input type="text" class="form-control" id="myTextbox" name="id"
                                            value="{{ $package_details->id }}" hidden required >

                                            <input type="text" class="form-control" id="myTextbox" name="package_id"
                                            value="{{ $package->id }}" hidden required>
                                    </div>


                                    <div class="form-row">
                                        <label for="input7" class="form-label">Day</label>
                                        <select id="input7" class="form-select" name="day" required>
                                            <option selected value="{{ $package_details->day }}">Day {{ $package_details->day }}</option>
                                            @for ($i = 1; $i <= $package->days; $i++)
                                                <option value="{{ $i }}">Day {{ $i }}</option>
                                            @endfor

                                        </select>
                                    </div>


                                    <div class="form-row">
                                        <label for="input1" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="myTextbox" name="title" value="{{ $package_details->title }}"
                                            required placeholder="Package Title">
                                    </div>


                     

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" required value="{{ $package_details->location }}"
                                            placeholder="Location">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Cover Image</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" name="image" 
                                                id="inputGroupFile01" onchange="readURL(this);">
                                        </div>

                                        <img id="blah" src="{{ asset($package_details->image) }}"
                                            class="placeholder-image" alt="your image" />
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Description</label>

                                        <textarea id="myeditorinstance" name="description" required>{{ $package_details->description }}</textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="d-grid d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary px-4">Update</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>





                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->

</div>
<!--end wrapper-->

@include('backend.components.footer')
@endsection

@push('scripts')
<script>
    // editer 
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table'
    });

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
