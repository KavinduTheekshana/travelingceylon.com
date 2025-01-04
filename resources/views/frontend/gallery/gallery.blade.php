
@extends('layouts.frontend')
@section('title', "Sri Lanka Travel Gallery | Stunning Photos of Ceylon's Beauty")
@section('meta_description', 'Browse stunning images of Sri Lanka\'s most breathtaking landscapes, beaches, and cultural sites in our gallery. Explore the beauty of Ceylon through Traveling Ceylon.')
@section('meta_keywords', 'Sri Lanka travel gallery, Ceylon travel images, Sri Lanka photography, Sri Lanka landscape photos, travel photos Sri Lanka, Sri Lanka tourism pictures, beautiful Sri Lanka gallery, Traveling Ceylon gallery')
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