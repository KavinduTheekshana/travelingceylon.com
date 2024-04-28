@extends('layouts.frontend')

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