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
                @section('page_group', 'Contact')
                @section('page_name', 'Contact List')
                @include('backend.components.breadcrumb')



            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Your all Contact Form Details</h6>
            <hr />
            @include('backend.components.alert')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>


                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>comment</th>
                        
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->comment }}</td>

                                    <td>
                                        @if ($contact->read)
                                            <span class="badge bg-danger">Unread</span></a>
                                        @else
                                            <span class="badge bg-success">Read</span></a>
                                        @endif


                                    </td>

                                    <td>
                                        <div class=" table-icon-group">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#exampleLargeModal" data-status="{{ $contact->read }}"
                                                data-name="{{ $contact->name }}" data-email="{{ $contact->email }}"
                                                data-comment="{{ $contact->comment }}">
                                                <i class="bx bxs-show me-0"></i></button>

                                            @if ($contact->read)
                                                <a title="Mark as read"
                                                    href="{{ route('contact.read', ['id' => $contact->id]) }}"
                                                    type="button" class="btn btn-success"><i
                                                        class='bx bx-envelope me-0'></i></a>
                                            @else
                                                <a title="Mark As Unread"
                                                    href="{{ route('contact.unread', ['id' => $contact->id]) }}"
                                                    type="button" class="btn btn-danger"><i
                                                        class='bx bx-envelope-open me-0'></i></a>
                                            @endif



                                            <a href="{{ route('contact.delete', ['id' => $contact->id]) }}"
                                                type="button" class="btn btn-warning"><i
                                                    class='bx bxs-trash-alt me-0'></i></a>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>comment</th>
                        
                                    <th>Status</th>
                                    <th>Action</th>
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
            var title = "-  Contact Form Details";
            var status = button.data('status');
            var description = "<b>Name: </b>" + button.data('name') + "</br>" + "<b>Email: </b>" +
                button.data('email') + "</br>" + "<b>Comment: </b>" + button.data('comment') + "</br>" ;



            if (status == 1) {
                $('#active-badge').html("Unread");
                $('#active-badge').addClass('badge bg-danger');
            } else {
                $('#active-badge').html("Read");
                $('#active-badge').addClass('badge bg-success');
            }

            $('#modal-title').html(title);
            $('#modalBody').html(description);

        });
    });
</script>
@endpush
