@extends('layouts.frontend')
@section('title', "Sri Lanka Travel Destinations | Discover Your Next Adventure with Traveling Ceylon")
@section('meta_description', 'Discover the best travel destinations in Sri Lanka. Explore beautiful beaches, cultural landmarks, and hidden gems with Traveling Ceylon for your perfect vacation.')
@section('meta_keywords', 'Sri Lanka travel destinations, explore Sri Lanka, Sri Lanka beach destinations, cultural landmarks Sri Lanka, Sri Lanka vacation, best destinations Sri Lanka, Traveling Ceylon destinations')

@section('content')

      <div id="page" class="page">


        @include('frontend.components.header')

         <main id="content" class="site-main">
            <section class="destination-inner-page">
            @section('single_page_img', asset('frontend/assets/images/DDD-Srilanka-1.jpg'))
            @section('single_page_name', 'Destinations')
            @include('frontend.components.inner_banner')

            <div class="destination-item-wrap">
               <div class="container">
                  <div class="row gx-5">
                     @include('frontend.destinations.single')

                  </div>

                  <!-- Pagination -->
                  <div class="row">
                     <div class="col-12">
                        <div class="pagination-wrap d-flex justify-content-center mt-5">
                           {{ $destinations->links('frontend.components.pagination') }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="inner-counter">
            @include('frontend.components.inner_counter')
            </div>
            @include('frontend.destinations.counter_bg')
            </section>
         </main>




         @include('frontend.components.footer')
         @include('frontend.components.top')
         @include('frontend.components.owner')
      </div>

     @endsection