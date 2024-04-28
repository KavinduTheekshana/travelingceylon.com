
@extends('layouts.frontend')

@section('content')

      <div id="page" class="page">


        @include('frontend.components.header')

         <main id="content" class="site-main">
            <section class="destination-inner-page">
            @section('single_page_img', asset('frontend/assets/images/glamping_river_cabin_7.jpg'))
            @section('single_page_name', 'Gallery')
            @include('frontend.components.inner_banner')

            <div class="gallery-section">
                <div class="container">
                   <div class="gallery-outer-wrap">
                      <div class="gallery-container grid">



                        @include('frontend.gallery.single')



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