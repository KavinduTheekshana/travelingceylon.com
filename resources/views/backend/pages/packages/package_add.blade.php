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
                @section('page_name', 'Add Package')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('package.list') }}" type="button" class="btn btn-warning"><i
                                class='bx bx-list-check'></i>Package List</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Add a New Package to your list</h6>
                    <hr />

                    @include('backend.components.alert')

                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('package.save') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <label for="input1" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="myTextbox" name="title"
                                            required placeholder="Package Title">
                                    </div>


                                    {{-- <input hidden type="text" class="form-control" id="mySlugbox" name="slug"
                                        required placeholder="Package Title Slag" readonly> --}}

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" required
                                            placeholder="Location">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Days</label>
                                        <input type="number" class="form-control" name="days" required
                                            placeholder="Days">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Nights</label>
                                        <input type="number" class="form-control" name="nights" required
                                            placeholder="Nights">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Peoples</label>
                                        <input type="text" class="form-control" name="peoples" required
                                            placeholder="Peoples">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Price Per Person (USD)</label>
                                        <input type="number" class="form-control" name="price" required
                                            placeholder="Price">
                                    </div>



                                    <div class="form-row">
                                        <label for="input1" class="form-label">Cover Image</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" name="image" required
                                                id="inputGroupFile01" onchange="readURL(this);">
                                        </div>

                                        <img id="blah" src="{{ asset('backend/assets/images/default.jpg') }}"
                                            class="placeholder-image" alt="your image" />
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Description</label>

                                        <textarea id="myeditorinstance" name="description" required>Add Your Text Here</textarea>
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords" required
                                            placeholder="Meta Keywords">
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Meta Description</label>
                                        <textarea type="text" class="form-control" name="meta_description" placeholder="Meta Description" required></textarea>
                                    </div>

                                    <div class="form-row">
                                        <div class="d-grid d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary px-4">Submit</button>

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
    // $(document).ready(function() {
    //     $('#myTextbox').on('input', function() {
    //         var value = $(this).val();
    //         var slug = value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '') + "-" +
    //             Date.now();
    //         $('#mySlugbox').val(slug);
    //     });
    // });
</script>
@endpush
