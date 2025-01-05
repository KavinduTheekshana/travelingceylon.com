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
                @section('page_group', 'Gallery')
                @section('page_name', 'Image List')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('image.add') }}" type="button" class="btn btn-primary"><i
                                class='bx bx-image-add'></i> Add gallerys</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Your all added Images</h6>
            <hr />
            @include('backend.components.alert')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Popular</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td>{{ $gallery->id }}</td>
                                        <td><img src="{{ asset($gallery->image) }}" class="table-image-holder"
                                                alt="image" /> </td>
                                        <td>{{ $gallery->title }} <br> {{ $gallery->size }}</td>
                                        <td>
                                            @if ($gallery->status)
                                                <span class="badge bg-success">Active</span></a>
                                            @else
                                                <span class="badge bg-danger">Deactive</span></a>
                                            @endif

                                            @if ($gallery->popular)
                                                <span class="badge bg-purple">Popular</span></a>
                                            @else
                                                <span class="badge bg-secondary">Not Popular</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($gallery->popular)
                                                <a href="{{ route('image.notpopular', ['id' => $gallery->id]) }}"
                                                    type="button" class="btn btn-secondary px-2 py-1">Remove
                                                    Popular</a>
                                            @else
                                                <a href="{{ route('image.popular', ['id' => $gallery->id]) }}"
                                                    type="button" class="btn btn-purple"> Make
                                                    Popular</a>
                                            @endif

                                        </td>
                                        <td>
                                            <div class=" table-icon-group">
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleLargeModal"
                                                    data-title="{{ $gallery->title }}"
                                                    data-status="{{ $gallery->status }}"
                                                    data-popular="{{ $gallery->popular }}"
                                                    data-image="{{ $gallery->image }}"><i
                                                        class="bx bxs-show me-0"></i></button>

                                                @if ($gallery->status)
                                                    <a href="{{ route('image.diactive', ['id' => $gallery->id]) }}"
                                                        type="button" class="btn btn-danger"><i
                                                            class="bx bxs-lock me-0"></i></a>
                                                @else
                                                    <a href="{{ route('image.active', ['id' => $gallery->id]) }}"
                                                        type="button" class="btn btn-success"><i
                                                            class="bx bxs-lock-open me-0"></i></a>
                                                @endif



                                                <a href="{{ route('image.delete', ['id' => $gallery->id]) }}"
                                                    type="button" class="btn btn-warning"><i
                                                        class='bx bxs-trash-alt me-0'></i></a>

                                                <a href="{{ asset($gallery->image) }}"
                                                    download="{{ $gallery->image }}" class="btn btn-info"
                                                    title="Download Image">
                                                    <i class="bx bxs-download me-0"></i>
                                                </a>

                                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal" data-id="{{ $gallery->id }}"
                                                    data-title="{{ $gallery->title }}"
                                                    data-image="{{ asset($gallery->image) }}">
                                                    <i class="bx bxs-edit me-0"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Popular</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--end page wrapper -->


    <!-- Update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="updateForm" method="POST" action="{{ route('image.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updates -->
                    <input type="hidden" name="id" id="galleryId">

                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Gallery</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="updateTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="updateTitle" name="title" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="updateImage" class="form-label">Cover Image</label>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="updateImage">Upload</label>
                                <input type="file" class="form-control" id="updateImage" name="image"
                                    onchange="readURL(this);">
                            </div>
                            <img id="updateImagePreview" src="{{ asset('backend/assets/images/default.jpg') }}"
                                class="placeholder-image" alt="Current Image">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
<!--end wrapper-->

@include('backend.components.footer')
@endsection

@push('scripts')
@include('backend.components.model')
<script>
    // data table
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [
                [0, "desc"]
            ]
        });

    });

    // model content
    $(document).ready(function() {
        $('#exampleLargeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var location = button.data('location');
            var status = button.data('status');
            var description = button.data('description');
            var popular = button.data('popular');
            var category = button.data('category');
            var image = button.data('image');

            if (status == 1) {
                $('#active-badge').html("Active");
                $('#active-badge').addClass('badge bg-success');
            } else {
                $('#active-badge').html("Deactive");
                $('#active-badge').addClass('badge bg-danger');
            }

            if (popular == 1) {
                $('#popular-badge').html("Popular");
                $('#popular-badge').addClass('badge bg-purple');
            } else {
                $('#popular-badge').html("Not Popular");
                $('#popular-badge').addClass('badge bg-secondary');
            }
            $('#category-badge').html(category);
            $('#modal-title').html(title);
            $('#modal-location').html(location);
            $('#modalBody').html(description);
            $('.model-image').attr('src', image);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const updateModal = document.getElementById('updateModal');

        updateModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');
            const image = button.getAttribute('data-image');

            document.getElementById('galleryId').value = id;
            document.getElementById('updateTitle').value = title;
            document.getElementById('updateImagePreview').src = image;
        });
    });

    document.getElementById('updateImage').addEventListener('change', function (event) {
    const file = event.target.files[0]; // Get the selected file
    if (file) {
        const reader = new FileReader(); // Create a FileReader object
        reader.onload = function (e) {
            document.getElementById('updateImagePreview').src = e.target.result; // Set the preview image source
        };
        reader.readAsDataURL(file); // Read the file as a data URL
    }
});
</script>
@endpush
