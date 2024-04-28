@extends('layouts.frontend')

@section('content')

    <div id="page" class="page">


        @include('frontend.components.header')

        <main id="content" class="site-main">
            <section class="destination-inner-page">
            @section('single_page_img', asset('frontend/assets/images/srilanka-c8d78f0f36944e1d9e175495ae98148f.jpg'))
            @section('single_page_name', 'Plan A Tour')
            @include('frontend.components.inner_banner')

            <div class="inner-contact-wrap">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6">

                            @include('backend.components.alert')
                            <div class="contact-from-wrap primary-bg">
                                {{-- <form method="POST" action="{{ route('plan.save') }}" class="contact-from"
                                    enctype="multipart/form-data">
                                    @csrf --}}
                                <form id="planForm" class="contact-from">
                                    @csrf
                                    <p>
                                        <label>Your Name <sup>*</sup></label>
                                        <input type="text" id="name" name="name" placeholder="Your Name*"
                                            required>
                                    </p>
                                    <p>
                                        <label>Email Address <sup>*</sup></label>
                                        <input type="email" id="email" name="email" placeholder="Your Email*"
                                            required>
                                    </p>
                                    <p>
                                        <label>Country</label>
                                        <input type="text" id="country" name="country" placeholder="Your Country">
                                    </p>
                                    <p>
                                        <label>Contact Number <sup>*</sup></label>
                                        <input type="text" id="number" name="number"
                                            placeholder="Your Contact Number" required>
                                    </p>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>
                                                <label>Date Of Arrivel</label>
                                                <input type="date" id="arrivel" name="arrivel">
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <p>
                                                <label>Date of Departure</label>
                                                <input type="date" id="departure" name="departure">
                                            </p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>
                                                <label>Number Of Adults</label>
                                                <input type="number" id="adults" name="adults"
                                                    placeholder="Number Of Adults">
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <p>
                                                <label>Number Of Childrens</label>
                                                <input type="number" id="children" name="children"
                                                    placeholder="Number Of Childrens">
                                            </p>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <p>
                                                <label>Number Of Single Rooms</label>
                                                <input type="number" id="single" name="single"
                                                    placeholder="Single Rooms">
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <p>
                                                <label>Number Of Double Rooms</label>
                                                <input type="number" id="double" name="double"
                                                    placeholder="Double Rooms">
                                            </p>
                                        </div>
                                    </div>
                                    <br>
                                    <hr class="white-hr">
                                    <p>
                                        <label><b> Meal Type</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="meal[]" type="checkbox"
                                            id="inlineCheckbox1" value="Bed & Breakfast">
                                        <label class="form-check-label" for="inlineCheckbox1">Bed & Breakfast</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="meal[]" type="checkbox"
                                            id="inlineCheckbox1" value="Half Board">
                                        <label class="form-check-label" for="inlineCheckbox1">Half Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="meal[]" type="checkbox"
                                            id="inlineCheckbox1" value="Full Board">
                                        <label class="form-check-label" for="inlineCheckbox1">Full Board</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="meal[]" type="checkbox"
                                            id="inlineCheckbox1" value="All Inclusive">
                                        <label class="form-check-label" for="inlineCheckbox1">All Inclusive</label>
                                    </div>
                                    </p>
                                    <hr class="white-hr">
                                    <p>
                                        <label><b>Hotel Type</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="hotel[]" type="checkbox"
                                            id="inlineCheckbox1" value="Economy">
                                        <label class="form-check-label" for="inlineCheckbox1">Economy</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="hotel[]" type="checkbox"
                                            id="inlineCheckbox1" value="Semi Luxury">
                                        <label class="form-check-label" for="inlineCheckbox1">Semi Luxury</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="hotel[]" type="checkbox"
                                            id="inlineCheckbox1" value="Luxury">
                                        <label class="form-check-label" for="inlineCheckbox1">Luxury</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="hotel[]" type="checkbox"
                                            id="inlineCheckbox1" value="Super Luxury">
                                        <label class="form-check-label" for="inlineCheckbox1">Super Luxury</label>
                                    </div>
                                    </p>
                                    <hr class="white-hr">
                                    <p>
                                        <label> <b> What kind of holiday you like?</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="holiday[]" type="checkbox"
                                            id="inlineCheckbox1" value="Wildlife & adventurous">
                                        <label class="form-check-label" for="inlineCheckbox1">Wildlife &
                                            adventurous</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="holiday[]" type="checkbox"
                                            id="inlineCheckbox1" value="Fun & exciting">
                                        <label class="form-check-label" for="inlineCheckbox1">Fun & exciting</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="holiday[]" type="checkbox"
                                            id="inlineCheckbox1" value="Romantic & sensuous">
                                        <label class="form-check-label" for="inlineCheckbox1">Romantic &
                                            sensuous</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="holiday[]" type="checkbox"
                                            id="inlineCheckbox1" value="Healthy & Ayurvedic spa">
                                        <label class="form-check-label" for="inlineCheckbox1">Healthy & Ayurvedic
                                            spa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="holiday[]" type="checkbox"
                                            id="inlineCheckbox1" value="Thought provoking & peaceful">
                                        <label class="form-check-label" for="inlineCheckbox1">Thought provoking &
                                            peaceful</label>
                                    </div>

                                    </p>
                                    <hr class="white-hr">

                                    <p>
                                        <label> <b> What would you like to see? </b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="likeToSee[]" type="checkbox"
                                            id="inlineCheckbox1" value="Beaches">
                                        <label class="form-check-label" for="inlineCheckbox1">Beaches</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="likeToSee[]" type="checkbox"
                                            id="inlineCheckbox2" value="Religious places">
                                        <label class="form-check-label" for="inlineCheckbox2">Religious places</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="likeToSee[]" type="checkbox"
                                            id="inlineCheckbox3" value="Archeological Cites">
                                        <label class="form-check-label" for="inlineCheckbox3">Archeological
                                            Cites</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="World heritage Cites">
                                        <label class="form-check-label" for="inlineCheckbox3">World heritage
                                            Cites</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="Waterfalls">
                                        <label class="form-check-label" for="inlineCheckbox3">Waterfalls</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="Mountains">
                                        <label class="form-check-label" for="inlineCheckbox3">Mountains</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="Ruin cities">
                                        <label class="form-check-label" for="inlineCheckbox3">Ruin cities</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                            value="Flora">
                                        <label class="form-check-label" for="inlineCheckbox3">Flora</label>
                                    </div>
                                    </p>

                                    <hr class="white-hr">
                                    <p>
                                        <label> <b> Which activities do you like?</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Wildlife safari">
                                        <label class="form-check-label" for="inlineCheckbox1">Wildlife safari</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Cultural experience">
                                        <label class="form-check-label" for="inlineCheckbox1">Cultural
                                            experience</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Bird watching">
                                        <label class="form-check-label" for="inlineCheckbox1">Bird watching</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Water rafting">
                                        <label class="form-check-label" for="inlineCheckbox1">Water rafting</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Surfing">
                                        <label class="form-check-label" for="inlineCheckbox1">Surfing</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Boat safari">
                                        <label class="form-check-label" for="inlineCheckbox1">Boat safari</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Swimming">
                                        <label class="form-check-label" for="inlineCheckbox1">Swimming</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="activity[]" type="checkbox"
                                            id="inlineCheckbox1" value="Elephant watching">
                                        <label class="form-check-label" for="inlineCheckbox1">Elephant
                                            watching</label>
                                    </div>
                                    </p>
                                    <hr class="white-hr">
                                    <p>
                                        <label> <b> Type of Vehicle</b></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="vehicle[]" type="checkbox"
                                            id="inlineCheckbox1" value="Economy">
                                        <label class="form-check-label" for="inlineCheckbox1">Economy</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="vehicle[]" type="checkbox"
                                            id="inlineCheckbox1" value="Semi Luxury">
                                        <label class="form-check-label" for="inlineCheckbox1">Semi Luxury</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="vehicle[]" type="checkbox"
                                            id="inlineCheckbox1" value="Luxury">
                                        <label class="form-check-label" for="inlineCheckbox1">Luxury</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" name="vehicle[]" type="checkbox"
                                            id="inlineCheckbox1" value="Super Luxury">
                                        <label class="form-check-label" for="inlineCheckbox1">Super Luxury</label>
                                    </div>
                                    </p>
                                    <hr class="white-hr">
                                    <p>
                                        <label>Special Notes or Requirements</label>
                                        <textarea rows="8" id="comment" name="note" placeholder="Your Message*"></textarea>
                                    </p>


                                    <p>
                                        <input type="submit" name="submit" value="SUBMIT">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="plan-gallery" style="max-width: 50%">
                            <div class="gallery-section">
                                <div class="container">
                                    <div class="gallery-outer-wrap">
                                        <div class="gallery-container grid">



                                            @include('frontend.gallery.single')



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </main>




    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.owner')
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#planForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('plan.save') }}',
                method: 'POST',
                data: formData,
                success: function(response) {


                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.success
                    });
                    $('#planForm')[0].reset();

                },
                error: function(xhr) {
                    // Handle error response
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: xhr.responseJSON.message
                    });

                }
            });
        });
    });
</script>
@endpush
