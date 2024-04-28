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
                @section('page_group', 'Tour Plans')
                @section('page_name', 'Tour Plan List')
                @include('backend.components.breadcrumb')


           
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Your all Tour Plan Inquiries Details</h6>
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
                                    <th>Phone</th>
                                    <th>country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($planes as $plan)
                 
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ $plan->email }}</td>
                                    <td>{{ $plan->number }}</td>
                                    <td>{{ $plan->country }}</td>
                                    <td>
                                        @if ($plan->read)
                                            <span class="badge bg-danger">Unread</span></a>
                                        @else
                                            <span class="badge bg-success">Read</span></a>
                                        @endif


                                    </td>

                                    <td>
                                        <div class=" table-icon-group">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                data-bs-target="#exampleLargeModal" 
                                                data-status="{{ $plan->read }}"
                                                data-name="{{ $plan->name }}" 
                                                data-email="{{ $plan->email }}"
                                                data-country="{{ $plan->country }}"
                                                data-number="{{ $plan->number }}"
                                                data-arrivel="{{ $plan->date_arrivel }}"
                                                data-departure="{{ $plan->date_departure }}"
                                                data-adults="{{ $plan->adults }}"
                                                data-children="{{ $plan->children }}"
                                                data-room_single="{{ $plan->room_single }}"
                                                data-room_double="{{ $plan->room_double }}"
                                                data-meal="{{ $plan->meal }}"
                                                data-hotel="{{ $plan->hotel }}"
                                                data-holiday="{{ $plan->holiday_type }}"
                                                data-like_to_see="{{ $plan->like_to_see }}"
                                                data-activities="{{ $plan->activities }}"
                                                data-vehicle="{{ $plan->vehicle }}"
                                                data-note="{{ $plan->note }}">
                                                <i class="bx bxs-show me-0"></i></button>

                                            @if ($plan->read)
                                                <a title="Mark as read"
                                                    href="{{ route('plan.read', ['id' => $plan->id]) }}"
                                                    type="button" class="btn btn-success"><i
                                                        class='bx bx-envelope me-0'></i></a>
                                            @else
                                                <a title="Mark As Unread"
                                                    href="{{ route('plan.unread', ['id' => $plan->id]) }}"
                                                    type="button" class="btn btn-danger"><i
                                                        class='bx bx-envelope-open me-0'></i></a>
                                            @endif



                                            <a href="{{ route('plan.delete', ['id' => $plan->id]) }}"
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
                                    <th>Phone</th>
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
            var title = "-  Customized Trip Plan Details";
            var status = button.data('status');
            var description = 
            "<b>Name: </b>" + button.data('name') + "<hr>" + 
            "<b>Email: </b>" + button.data('email') + "<hr>" + 
            "<b>Phone: </b>" + button.data('number') + "<hr>" +
            "<b>Country: </b>" + button.data('country') + "<hr>" + 
            "<b>Checkin: </b>" + button.data('arrivel') + "<hr>" + 
            "<b>Checkout: </b>" + button.data('departure') + "<hr>" +
            "<b>Number Of Adults: </b>" + button.data('adults') + "<hr>" +
            "<b>Number Of Childrens: </b>" + button.data('children') + "<hr>" +
            "<b>Single Rooms: </b>" + button.data('room_single') + "<hr>" +
            "<b>Double Rooms: </b>" + button.data('room_double') + "<hr>" +
            "<b>Meal Type: </b>" + button.data('meal') + "<hr>" +
            "<b>Hotel Type: </b>" + button.data('hotel') + "<hr>" +
            "<b>What kind of holiday they like: </b>" + button.data('holiday') + "<hr>" +
            "<b>What they like to see: </b>" + button.data('like_to_see') + "<hr>" +
            "<b>Which activities they like: </b>" + button.data('activities') + "<hr>" +
            "<b>vehicle Type: </b>" + button.data('vehicle') + "<hr>" +
            "<b>Special Note: </b>" + button.data('note') + "<hr>";



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
