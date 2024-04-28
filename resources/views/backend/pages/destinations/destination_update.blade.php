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
                @section('page_group', 'Destinations')
                @section('page_name', 'Update Destinations')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="destinations-list" type="button" class="btn btn-warning"><i
                                class='bx bx-list-check'></i>Destinations List</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Update Your Existing Destination Details</h6>
                    <hr />

                    @include('backend.components.alert')

                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('destinations.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <input type="text" name="id" value="{{ $destinations->id }}" hidden>
                                    <div class="form-row">
                                        <label for="input1" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="myTextbox" name="title"
                                            required placeholder="Destination Title" value="{{ $destinations->title }}">
                                    </div>

                                    {{-- <div class="form-row">
                                        <label for="input1" class="form-label">Slag</label> --}}
                                    <input hidden type="text" class="form-control" id="mySlugbox" name="slug"
                                        required placeholder="Destination Title Slag" readonly value="{{ $destinations->slug }}">
                                    {{-- </div> --}}

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" required
                                            placeholder="Location" value="{{ $destinations->location }}">
                                    </div>

                                    <div class="form-row">
                                        <label for="input7" class="form-label">Category</label>
                                        <select id="input7" class="form-select" name="category" required>
                                            <option selected value="{{ $destinations->category }}">{{ $destinations->category }}</option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Beach and Coastal">Beach and Coastal</option>
                                            <option value="City Breaks">City Breaks</option>
                                            <option value="Cultural and Heritage">Cultural and Heritage</option>
                                            <option value="Educational">Educational</option>
                                            <option value="Food and Wine">Food and Wine</option>
                                            <option value="Luxury">Luxury</option>
                                            <option value="Nature and Wildlife">Nature and Wildlife</option>
                                            <option value="Road Trips">Road Trips</option>
                                            <option value="Solo Travel">Solo Travel</option>
                                            <option value="Wellness and Spa">Wellness and Spa</option>
                                        </select>
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Cover Image</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" name="image"
                                                id="inputGroupFile01" onchange="readURL(this);">
                                        </div>

                                        <img id="blah" src="{{ asset($destinations->image) }}"
                                            class="placeholder-image" alt="your image" />
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Description</label>

                                        <textarea id="myeditorinstance" name="description" required>{{ $destinations->description }}</textarea>
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

    // slug editer 
    $(document).ready(function() {
        $('#myTextbox').on('input', function() {
            var value = $(this).val();
            var slug = value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            $('#mySlugbox').val(slug);
        });
    });
</script>
@endpush
