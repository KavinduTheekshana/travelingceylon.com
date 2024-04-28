@extends('layouts.frontend')

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