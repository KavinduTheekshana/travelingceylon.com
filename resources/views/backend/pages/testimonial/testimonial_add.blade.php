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
                @section('page_group', 'Testimonials')
                @section('page_name', 'Add Testimonial')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('testimonial.list') }}" type="button" class="btn btn-warning"><i
                                class='bx bx-list-check'></i>Testimonials List</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Add a New Testimonial to your list</h6>
                    <hr />

                    @include('backend.components.alert')

                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('testimonial.save') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-row">
                                        <label for="input1" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" required
                                            placeholder="Name">
                                    </div>






                                    <div class="form-row">
                                        <label for="input7" class="form-label">Stars</label>
                                        <select id="input7" class="form-select" name="star" required>
                                            <option selected>Choose...</option>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Star</option>
                                            <option value="3">3 Star</option>
                                            <option value="4">4 Star</option>
                                            <option value="5">5 Star</option>

                                        </select>
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Traveler Image</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" class="form-control" name="image" required
                                                id="inputGroupFile01" onchange="readURL(this);">
                                        </div>

                                        <img id="blah" src="{{ asset('backend/assets/images/default.jpg') }}"
                                            class="placeholder-image" alt="your image" />
                                    </div>

                                    <div class="form-row">
                                        <label for="input1" class="form-label">Comment</label>

                                        <textarea id="myeditorinstance" name="comment" required>Add Your Text Here</textarea>



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
</script>
@endpush
