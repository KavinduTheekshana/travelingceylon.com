@extends('layouts.frontend')
@section('title', "Book Sri Lanka Travel Packages | Tailored Tours with Traveling Ceylon")
@section('meta_description', 'Explore customized travel packages for Sri Lanka. Book your dream vacation with tailored tours, including sightseeing, accommodations, and more with Traveling Ceylon.')
@section('meta_keywords', 'Sri Lanka travel packages, Sri Lanka tour packages, customized travel tours, Sri Lanka vacation packages, Sri Lanka group tours, Sri Lanka travel deals, Traveling Ceylon packages, tailored travel Sri Lanka')
@section('content')

      <div id="page" class="page">


        @include('frontend.components.header')

         <main id="content" class="site-main">
            <section class="destination-inner-page">
            @section('single_page_img', asset('frontend/assets/images/merlin.jpg'))
            @section('single_page_name', 'Packages')
            @include('frontend.components.inner_banner')

            <div class="package-item-wrap">
                <div class="container">
                     @include('frontend.packages.single')

               </div>
            </div>

            @include('frontend.components.discount')
            </section>
         </main>




         @include('frontend.components.footer')
         @include('frontend.components.top')
         @include('frontend.components.owner')
      </div>

     @endsection