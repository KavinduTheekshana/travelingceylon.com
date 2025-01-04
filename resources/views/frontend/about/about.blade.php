@extends('layouts.frontend')

@section('content')

    <div id="page" class="page">
        <!-- site header html start  -->


        @include('frontend.components.header')


        <!-- site header html end  -->
        <main id="content" class="site-main">



        @section('single_page_img', asset('frontend/assets/images/srilanka.jpg'))
        @section('single_page_name', 'About Us')
        @include('frontend.components.inner_banner')


        <!-- ***about section html start form here*** -->
        <div class="inner-about-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about-content">
                            <figure class="about-image">
                                <img loading="lazy" data-animscroll="fade-right" data-animscroll-delay="100" src="{{ asset('frontend/assets/images/GettyRF_1129567869.jpg') }}" alt="Beach Image">
                                <div data-animscroll="fade-left" data-animscroll-delay="100" class="about-image-content">
                                    <h3>WE ARE BEST FOR TOURS & TRAVEL SINCE 2002 !</h3>
                                </div>
                            </figure>
                            <h2 data-animscroll="fade-right" data-animscroll-delay="100" >HOW WE ARE BEST FOR TRAVEL !</h2>
                            <p data-animscroll="fade-up" data-animscroll-delay="100">Welcome to our travel website! With over 22 years of experience in organizing
                                unforgettable tours, we are dedicated to providing you with an exceptional travel
                                experience in Sri Lanka. </p>

                            <p data-animscroll="fade-up" data-animscroll-delay="100"> As a trusted tour organizer, we prioritize your comfort and safety. Our fleet of fully
                                air-conditioned vehicles ensures that you travel in utmost comfort while exploring the
                                stunning landscapes and cultural treasures of Sri Lanka. Your peace of mind is important
                                to us, which is why we provide comprehensive travel insurance for every tour. </p>

                            <p data-animscroll="fade-up" data-animscroll-delay="100"> Our team of experienced drivers is not only knowledgeable about the country but also
                                committed to delivering excellent service. They will navigate the roads with expertise,
                                ensuring smooth and efficient travel throughout your journey. </p>

                            <p data-animscroll="fade-up" data-animscroll-delay="100"> We understand that accommodation plays a vital role in your travel experience. That's
                                why we offer a wide range of options to suit your preferences and budget. Whether you
                                prefer luxury resorts, cozy boutique hotels, or authentic homestays, we will help you
                                find the perfect accommodation that reflects the charm and character of Sri Lanka. </p>

                            <p data-animscroll="fade-up" data-animscroll-delay="100"> Upon your arrival, our reliable airport pick-up service will be waiting to greet you,
                                making your transition into this beautiful country seamless and hassle-free. We want you
                                to feel at home during your stay, which is why we provide authentic Sri Lankan cushions
                                in our vehicles, adding a touch of local culture and comfort to your journey. </p>

                            <p data-animscroll="fade-up" data-animscroll-delay="100"> At our travel agency, we believe that exploring Sri Lanka should be an enriching and
                                affordable experience for everyone. We strive to offer competitive prices without
                                compromising on quality or service. Our commitment to transparency and customer
                                satisfaction has earned us a reputation for providing trustworthy and reliable service.
                            </p>

                            <p data-animscroll="fade-up" data-animscroll-delay="100"> We look forward to being a part of your Sri Lankan adventure and creating memories that
                                will last a lifetime. Let us handle the logistics while you immerse yourself in the
                                wonders of this captivating island. Trust us to make your travel dreams come true.</p>
                        </div>
                        <div class="client-slider white-bg" data-animscroll="fade-up" data-animscroll-delay="100">
                            <figure class="client-item">
                                <img loading="lazy" src="{{ asset('frontend/assets/images/logos/Jetwing_Hotels.jpeg') }}"
                                    alt="Jetwing Hotels">
                            </figure>
                            <figure class="client-item">
                                <img loading="lazy" src="{{ asset('frontend/assets/images/logos/logo--Taj.png') }}" alt="Taj Hotels">
                            </figure>
                            <figure class="client-item">
                                <img loading="lazy" src="{{ asset('frontend/assets/images/logos/Shangri-La_Hotels_and_Resorts_logo.svg.png') }}"
                                    alt="Shangri-La Hotels">

                            </figure>
                            <figure class="client-item">
                                <img loading="lazy" src="{{ asset('frontend/assets/images/logos/logo-chbs-1-BkuWi_c7I.png') }}"
                                    alt="Cinemen Hotels">
                            </figure>
                            <figure class="client-item">
                                <img oading="lazy" src="{{ asset('frontend/assets/images/logos/Anantara.png') }}" alt="Anantara Hotels">
                            </figure>
                        </div>
                    </div>


                    <div class="col-lg-4">
                        <div data-animscroll="fade-left" data-animscroll-delay="100" class="icon-box">
                            <div class="box-icon">
                                <i aria-hidden="true" class="fas fa-umbrella-beach"></i>
                            </div>
                            <div class="icon-box-content">
                                <h3>Experienced Tour Organizers</h3>
                                <p>With 22+ years of experience, we excel in creating unforgettable travel experiences in Sri Lanka. Our well-planned itineraries ensure you make the most of your time in this captivating country.</p>
                            </div>
                        </div>
                        <div data-animscroll="fade-left" class="icon-box">
                            <div class="box-icon">
                                <i aria-hidden="true" class="fas fa-user-tag"></i>
                            </div>
                            <div class="icon-box-content">
                                <h3>Personalized and Trustworthy Service</h3>
                               <p>Experience personalized and trustworthy service that exceeds expectations. Let us handle the logistics, while you fully immerse yourself in the wonders of Sri Lanka.</p>
                            </div>
                        </div>
                        <div data-animscroll="fade-left" class="icon-box">
                            <div class="box-icon">
                                <i aria-hidden="true" class="fas fa-headset"></i>
                            </div>
                            <div class="icon-box-content">
                                <h3>Affordable and Flexible Options</h3>
                                <p>We make exploring Sri Lanka affordable without compromising quality, ensuring accessibility for all travelers. Tailor your itinerary to your preferences and budget with our flexible options, offering the perfect package for adventure, cultural immersion, or relaxation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***about section html start form here*** -->









    </main>


    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.owner')





</div>

@endsection

