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
                @section('page_group', 'Blog')
                @section('page_name', 'Add Article')
                @include('backend.components.breadcrumb')


                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{ route('blog.list') }}" type="button" class="btn btn-warning"><i
                                class='bx bx-list-check'></i>Articles List</a>

                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h6 class="mb-0 text-uppercase">Add a New Article to your list</h6>
                    <hr />

                    @include('backend.components.alert')

                    @if ($errors->count() > 0)
                        <span class='help-block'>
                            <strong>{{ 'Some input field is not properly filled' }}</strong>
                        </span>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="POST"
                                action="{{ isset($blog) ? route('blog.update', ['id' => $blog->id]) : route('blog.save') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @if (isset($blog))
                                    @method('PUT') <!-- Use PUT for updates -->
                                @endif

                                <!-- Title -->
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ isset($blog) ? $blog->title : old('title') }}" required
                                        placeholder="Blog Title">
                                </div>

                                <!-- Content -->
                                <div class="col-md-12">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="6" required>{{ isset($blog) ? $blog->content : old('content') }}</textarea>
                                </div>

                                <!-- Category -->
                                <div class="col-md-6">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ (isset($blog) && $blog->category_id == $category->id) || old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Image -->
                                <div class="form-row">
                                    <label for="inputGroupFile01" class="form-label">Traveler Image</label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" class="form-control" name="image" id="inputGroupFile01"
                                            accept="image/*" onchange="readURL(this);"
                                            {{ isset($blog) && $blog->image ? '' : 'required' }}>
                                    </div>
                                    <img id="blah"
                                        src="{{ isset($blog) && $blog->image ? asset('storage/' . $blog->image) : asset('backend/assets/images/default.jpg') }}"
                                        class="placeholder-image" alt="Preview"
                                        style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                </div>

                                <!-- Meta Keywords -->
                                <div class="col-md-12">
                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                        value="{{ isset($blog) ? $blog->meta_keywords : old('meta_keywords') }}"
                                        placeholder="Keywords for SEO">
                                </div>

                                <!-- Meta Description -->
                                <div class="col-md-12">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ isset($blog) ? $blog->meta_description : old('meta_description') }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="1"
                                            {{ (isset($blog) && $blog->status == 1) || old('status') == 1 ? 'selected' : '' }}>
                                            Published</option>
                                        <option value="0"
                                            {{ (isset($blog) && $blog->status == 0) || old('status') == 0 ? 'selected' : '' }}>
                                            Draft</option>
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        selector: 'textarea#content',
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | table',
        placeholder: 'Add your text here...', // Placeholder for the editor
        setup: function(editor) {
            // Sync content with the textarea on form submission
            editor.on('change', function() {
                tinymce.triggerSave();
            });
        }
    });

    // Sync TinyMCE content with the textarea before form submission
    document.querySelector('form').addEventListener('submit', function(e) {
        tinymce.triggerSave();
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
