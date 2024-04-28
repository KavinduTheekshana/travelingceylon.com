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
                        <a href="{{ route('package.list') }}" type="button"
                            class="btn btn-warning"><i class='bx bx-arrow-back'></i>Back</a>

                            <a href="{{ route('package.add.details', ['id' => $package->id]) }}" type="button"
                                class="btn btn-primary"><i class='bx bx-message-square-add'></i> Add Package Details</a>

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
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Day</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package_details as $details)
                                    <tr>
                                        <td><img src="{{ asset($details->image) }}" class="table-image-holder"
                                                alt="image" /> </td>
                                        <td>Day {{ $details->day }}</td>
                                        <td>{{ Str::limit(strip_tags($details->title), 40, '...') }}</td>
                                        <td>{{ $details->location }}</td>
                                        <td>
                                            @if ($details->status)
                                                <span class="badge bg-success">Active</span></a>
                                            @else
                                                <span class="badge bg-danger">Deactive</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class=" table-icon-group">
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#exampleLargeModal"
                                                    data-title="{{ $details->title }}"
                                                    data-location="{{ $details->location }}"
                                                    data-days="{{ $details->day }}"
                                                    data-description="{{ $details->description }}"
                                                    data-status="{{ $details->status }}"
                                              
                                                    data-image="{{ asset($details->image) }}"><i
                                                        class="bx bxs-show me-0"></i></button>

                                                @if ($details->status)
                                                    <a href="{{ route('package.diactive.details', ['id' => $details->id]) }}"
                                                        type="button" class="btn btn-danger"><i
                                                            class="bx bxs-lock me-0"></i></a>
                                                @else
                                                    <a href="{{ route('package.active.details', ['id' => $details->id]) }}"
                                                        type="button" class="btn btn-success"><i
                                                            class="bx bxs-lock-open me-0"></i></a>
                                                @endif

                                                <a href="{{ route('package.update_view.details', ['id' => $details->id]) }}"
                                                    type="button" class="btn btn-primary"><i
                                                        class='bx bxs-edit me-0'></i></a>
                                                <a href="{{ route('package.delete.details', ['id' => $details->id]) }}"
                                                    type="button" class="btn btn-warning"><i
                                                        class='bx bxs-trash-alt me-0'></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Status</th>
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

</div>
<!--end wrapper-->

@include('backend.components.footer')
@endsection

@push('scripts')
@include('backend.components.model')
<script>
    // data table 
    $(document).ready(function() {
        $('#example').DataTable();
    });

    // model content 
    $(document).ready(function() {
        $('#exampleLargeModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var location = button.data('location');
            var status = button.data('status');
            var description = button.data('description');
            var image = button.data('image');

            if (status == 1) {
                $('#active-badge').html("Active");
                $('#active-badge').addClass('badge bg-success');
            } else {
                $('#active-badge').html("Deactive");
                $('#active-badge').addClass('badge bg-danger');
            }

          
    
            $('#modal-title').html(title);
            $('#modal-location').html(location);
            $('#modalBody').html(description);
            $('.model-image').attr('src', image);
        });
    });
</script>
@endpush
