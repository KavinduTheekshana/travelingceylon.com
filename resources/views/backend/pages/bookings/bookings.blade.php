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
                @section('page_group', 'Bookings')
                @section('page_name', 'Bookings List')
                @include('backend.components.breadcrumb')


           
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Your all Booking Details</h6>
            <hr />
            @include('backend.components.alert')
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Package</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <td>{{ $booking->package_name }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>{{ $booking->email }}</td>
                                    <td>{{ $booking->phone }}</td>
                                    <td>{{ $booking->country }}</td>
                                    <td>
                                        @if ($booking->read)
                                            <span class="badge bg-danger">Unread</span></a>
                                        @else
                                            <span class="badge bg-success">Read</span></a>
                                        @endif


                                    </td>

                                    <td>
                                        <div class=" table-icon-group">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#exampleLargeModal" data-status="{{ $booking->read }}"
                                                data-package_name="{{ $booking->package_name }}"
                                                data-name="{{ $booking->name }}" data-email="{{ $booking->email }}"
                                                data-phone="{{ $booking->phone }}"
                                                data-country="{{ $booking->country }}"
                                                data-checkin="{{ $booking->checkin }}"
                                                data-checkout="{{ $booking->checkout }}">
                                                <i class="bx bxs-show me-0"></i></button>

                                            @if ($booking->read)
                                                <a title="Mark as read"
                                                    href="{{ route('booking.read', ['id' => $booking->id]) }}"
                                                    type="button" class="btn btn-success"><i
                                                        class='bx bx-envelope me-0'></i></a>
                                            @else
                                                <a title="Mark As Unread"
                                                    href="{{ route('booking.unread', ['id' => $booking->id]) }}"
                                                    type="button" class="btn btn-danger"><i
                                                        class='bx bx-envelope-open me-0'></i></a>
                                            @endif



                                            <a href="{{ route('booking.delete', ['id' => $booking->id]) }}"
                                                type="button" class="btn btn-warning"><i
                                                    class='bx bxs-trash-alt me-0'></i></a>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Package</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>country</th>
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
            var title = "-  Inquiry Details: Let's Make There Travel Dreams a Reality!";
            var status = button.data('status');
            var description = "<b>Name: </b>" + button.data('name') + "</br>" + "<b>Email: </b>" +
                button.data('email') + "</br>" + "<b>Phone: </b>" + button.data('phone') + "</br>" +
                "<b>Country: </b>" + button.data('country') + "</br>" + "<b>Checkin: </b>" + button
                .data('checkin') + "</br>" + "<b>Checkout: </b>" + button.data('checkout') + "</br>";



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
