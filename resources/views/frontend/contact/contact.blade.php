@extends('layouts.frontend')
@section('title', "Contact Traveling Ceylon | Plan Your Sri Lankan Adventure Today")
@section('meta_description', 'Get in touch with Traveling Ceylon for all your travel inquiries. Contact us for booking information, travel assistance, or any questions about exploring Sri Lanka.')
@section('meta_keywords', 'contact Traveling Ceylon, Sri Lanka travel contact, travel inquiries Sri Lanka, Sri Lanka tours contact, contact us for travel, book Sri Lanka tours, Traveling Ceylon contact page')
@section('content')

    <div id="page" class="page">
        <!-- site header html start  -->


        @include('frontend.components.header')


        <!-- site header html end  -->
        <main id="content" class="site-main">



        @section('single_page_img', asset('frontend/assets/images/image_processing20230106-4-knj5l.jpg'))
        @section('single_page_name', 'Contact US')
        @include('frontend.components.inner_banner')


        <!-- ***contact section html start form here*** -->
        <div class="inner-contact-wrap mt-5 mb-5">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="section-heading">
                        <h5 class="sub-title" data-animscroll="fade-up" data-animscroll-delay="100">GET IN TOUCH</h5>
                        <h2 class="section-title" data-animscroll="fade-up" data-animscroll-delay="100">REACH & CONTACT US!</h2>
                        <p data-animscroll="fade-up" data-animscroll-delay="100">Contact us today to start planning your dream trip to Sri Lanka. Our friendly team is ready to assist you with any inquiries or questions you may have, ensuring a seamless and enjoyable travel experience.</p>
                        {{-- <div class="social-icon">
                           <ul>
                              <li data-animscroll="fade-up" data-animscroll-delay="100">
                                 <a href="https://www.facebook.com" target="_blank">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li data-animscroll="fade-up" data-animscroll-delay="200">
                                 <a href="https://www.twitter.com" target="_blank">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li data-animscroll="fade-up" data-animscroll-delay="200">
                                 <a href="https://www.youtube.com" target="_blank">
                                    <i class="fab fa-youtube" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li data-animscroll="fade-up" data-animscroll-delay="400">
                                 <a href="https://www.instagram.com" target="_blank">
                                    <i class="fab fa-instagram" aria-hidden="true"></i>
                                 </a>
                              </li>
                              <li data-animscroll="fade-up" data-animscroll-delay="500">
                                 <a href="https://www.pinterest.com" target="_blank">
                                    <i class="fab fa-pinterest" aria-hidden="true"></i>
                                 </a>
                              </li>
                           </ul>
                        </div> --}}
                     </div>
                     <div class="contact-map" data-animscroll="fade-up" data-animscroll-delay="100">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31691.48274752863!2d79.91884989280004!3d6.838295083364013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2504acdcdef5d%3A0x74e6fe73b8e6f7a4!2sPannipitiya%2C%20Sri%20Lanka!5e0!3m2!1sen!2suk!4v1714579974978!5m2!1sen!2suk" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                  </div>
                  <div class="col-lg-6" data-animscroll="fade-left" data-animscroll-delay="100">
                     <div class="contact-from-wrap primary-bg">
                          {{-- <form method="POST" action="{{ route('contact.save') }}" class="contact-from" enctype="multipart/form-data">
                                        @csrf --}}
                        <form id="contactForm" class="contact-from">
                           @csrf
                           <p>
                              <label>First Name..</label>
                              <input type="text" id="name" name="name" placeholder="Your Name*">
                           </p>
                           <p>
                              <label>Email Address</label>
                              <input type="email" id="email" name="email" placeholder="Your Email*">
                           </p>
                           <p>
                              <label>Comments / Questions</label>
                              <textarea rows="8" id="comment" name="comment" placeholder="Your Message*"></textarea>
                           </p>
                           <p>
                              <input type="submit" name="submit" value="SUBMIT MESSAGE">
                           </p>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ***contact section html start form here*** -->
         <!-- ***iconbox section html start form here*** -->
         <div class="contact-details-section bg-light-grey">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-4" data-animscroll="fade-up" data-animscroll-delay="100">
                     <div class="icon-box border-icon-box">
                        <div class="box-icon">
                           <i aria-hidden="true" class="fas fa-envelope-open-text"></i>
                        </div>
                        <div class="icon-box-content">
                           <h4>EMAIL ADDRESS</h4>
                           <ul>
                              <li>
                                 <a href="mailto:info@travelingceylon.com">info@travelingceylon.com</a>
                              </li>


                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4" data-animscroll="fade-up" data-animscroll-delay="200">
                     <div class="icon-box border-icon-box">
                        <div class="box-icon">
                           <i aria-hidden="true" class="fas fa-phone-alt"></i>
                        </div>
                        <div class="icon-box-content">
                           <h4>PHONE NUMBER</h4>
                           <ul>
                              <li>
                                 <a href="tell:+94706332644">+44 79 3633 1462</a>
                              </li>
                              <li>
                                 <a href="tell:+447916177140">+44 79 16 177 140</a>
                              </li>

                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4" data-animscroll="fade-up" data-animscroll-delay="300">
                     <div class="icon-box border-icon-box">
                        <div class="box-icon">
                           <i aria-hidden="true" class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="icon-box-content">
                           <h4>ADDRESS LOCATION</h4>
                           <ul>
                              <li>
                                 1203/1 Vidyalaya junction,

                              </li>
                              <li>
                                 Kottawa, Pannipitiya
                              </li>

                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- ***iconbox section html end here*** -->








    </main>


    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.owner')





</div>

@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('contact.save') }}',
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
                    $('#comment').val('');

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