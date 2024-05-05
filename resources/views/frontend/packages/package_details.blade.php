@extends('layouts.frontend')

@section('content')

    <div id="page" class="page">

        @include('frontend.components.header')

        <main id="content" class="site-main">

        @section('single_page_img', asset($package->image))
        @section('single_page_name', $package->title)
        @include('frontend.components.inner_banner')


        <div class="single-page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 primary right-sidebar">
                        <div class="single-packge-wrap">
                            <div data-animscroll="fade-up" class="single-package-head d-flex align-items-center">
                                <div class="package-title">
                                    <h2>{{ $package->title }}</h2>
                                    <div class="rating-start-wrap">
                                        <div class="rating-start">
                                            <span style="width: 100%"></span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="package-price">
                                    <h6 class="price-list">
                                        <span>${{ $package->price }}</span>
                                        / per person
                                    </h6>
                                </div> --}}
                            </div>
                            <div class="package-meta" data-animscroll="fade-up">
                                <ul>
                                    <li>
                                        <i class="fas fa-clock"></i>
                                        {{ $package->days }} DAYS / {{ $package->nights }} NIGHTS
                                    </li>
                                    <li>
                                        <i class="fas fa-user-friends"></i>
                                        pax: {{ $package->peoples }}
                                    </li>
                                    {{-- <li>
                                   <i class="fas fa-swimmer"></i>
                                   Category : Hangout
                                </li> --}}

                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ $package->location }}
                                    </li>
                                </ul>
                            </div>
                            <figure data-animscroll="fade-up" class="single-package-image">
                                <img loading="lazy" src="{{ asset($package->image) }}" alt="">
                            </figure>
                            <div data-animscroll="fade-up" class="package-content-detail">
                                <article class="package-overview">
                                    <p> {!! $package->description !!}</p>
                                </article>

                            </div>


                            @foreach ($package_details as $key => $details)
                                <div class="package-content-detail">
                                    <article class="package-overview">
                                        <h3 data-animscroll="fade-up" data-animscroll-delay="{{$key*100}}" class="m-0"><span class="color-theme">DAY {{ $details->day }} </span>| {{ $details->title }}</h3>
                                        <h6 data-animscroll="fade-up" data-animscroll-delay="{{$key*100}}">- {{ $details->location }}</h6>
                                        <img data-animscroll="fade-up" data-animscroll-delay="{{$key*100}}" src="{{ asset($details->image) }}" alt="">
                                        <p data-animscroll="fade-up" data-animscroll-delay="{{$key*100}}"> {!! $details->description !!}</p>
                                    </article>
                                </div>
                            @endforeach

                            <div class="package-content-detail">

                                <article data-animscroll="fade-up" class="package-include bg-light-grey">
                                    <h3>INCLUDE & EXCLUDE :</h3>
                                    <ul>
                                        <li><i class="fas fa-check"></i>Accommodation</li>
                                        <li><i class="fas fa-times"></i>Entrance fees</li>
                                        <li><i class="fas fa-check"></i>Breakfast and Dinner</li>
                                        <li><i class="fas fa-times"></i>Room Service Fees</li>
                                        <li><i class="fas fa-check"></i>Private Vehicle with a Driver</li>
                                        <li><i class="fas fa-times"></i>Private expenses</li>
                                        <li><i class="fas fa-check"></i>Guide service</li>
                                        <li><i class="fas fa-times"></i>Room service fees</li>
                                    </ul>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="booking-form-wrap" data-animscroll="fade-left">
                                <div class="booking-form-inner primary-bg">
                                    <h3>BOOKING FORM</h3>
                                    <p>Plan Your Perfect Getaway with Convenient and Hassle-Free Booking</p>
                                    {{-- <form method="POST" action="{{ route('booking.send') }}" class="booking-form" enctype="multipart/form-data">
                                        @csrf --}}
                                    <form id="boockingForm" class="booking-form">
                                        @csrf
                                        <input  name="package_id" value="{{ $package->id }}" hidden>
                                        <input  name="package_name" value="{{ $package->title }}" hidden>


                                        <p>
                                            <input id="name" type="text" name="name" placeholder="Your Name...">
                                        </p>
                                        <p>
                                            <input id="email" type="email" name="email" placeholder="Your Email...">
                                        </p>

                                        <p>
                                            <input id="phone" type="text" name="phone" placeholder="Your Phone Number...">
                                        </p>

                                        <p>
                                            <input id="country" type="text" name="country" placeholder="Your Country...">
                                        </p>

                                        <p class="width-5">
                                            <label>Checkin Date</label>
                                            <input id="checkin" class="input-date-picker" type="text" name="checkin"
                                                placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                        </p>
                                        <p class="width-5">
                                            <label>Checkout Date</label>
                                            <input id="checkout" class="input-date-picker" type="text" name="checkout"
                                                placeholder="MM / DD / YY" autocomplete="off" readonly="readonly">
                                        </p>


                                        <p>
                                            <button type="submit" class="outline-btn outline-btn-white mt-3">INQUIRY
                                                NOW</button>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <div class="related-package" data-animscroll="fade-left">
                                <h3>RELATED IMAGES</h3>
                                <p>Explore the World Through Our Eyes

                                    Unveiling the Beauty of Global Destinations
                                </p>
                                <div class="related-package-slide">

                                    @foreach ($package_details as $details)
                                        <div class="related-package-item package-details-single">
                                            <img loading="lazy" src="{{ asset($details->image) }}" alt="{{ $details->title }}">
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="package-list" data-animscroll="fade-left">
                                <div class="overlay"></div>
                                <h4>MORE PACKAGES</h4>
                                <ul>
                                    @foreach ($package_list as $list)
                                        <li>
                                            <a href="{{ route('packages.single', ['slug' => $list->slug]) }}"><i
                                                    aria-hidden="true"
                                                    class="icon icon-arrow-right-circle"></i>{{ $list->title }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.search')
    @include('frontend.components.owner')
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#boockingForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('booking.send') }}',
                method: 'POST',
                data: formData,
                success: function(response) {


                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.success
                    });
                    $('#name').val('');
                    $('#email').val('');
                    $('#phone').val('');
                    $('#country').val('');
                    $('#checkin').val('MM / DD / YY');
                    $('#checkout').val('MM / DD / YY');
                },
                error: function(xhr) {
                    // Handle error response
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });

                }
            });
        });
    });
</script>
@endpush
