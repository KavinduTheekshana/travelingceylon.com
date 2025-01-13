@extends('layouts.frontend')
@push('styles')
<link rel="preload" href="{{ url('frontend/assets/images/slider/the-orphanage-was-founded.webp') }}" as="image">
<link rel="preload" href="{{ url('frontend/assets/images/slider/Leopard-srilanka-Getty.webp') }}" as="image">
<link rel="preload" href="{{ url('frontend/assets/images/slider/DDD-Srilanka-1.webp') }}" as="image">
<link rel="preload" href="{{ url('frontend/assets/images/slider/GettyRF_1129567869.webp') }}" as="image">
@endpush
@section('content')
    <div id="page" class="page">
        <!-- site header html start  -->


        @include('frontend.components.header')


        <!-- site header html end  -->
        <main id="content" class="site-main">

            @include('frontend.homepage.banner')
            @include('frontend.homepage.sub_banner')
            @include('frontend.homepage.popular')
            @include('frontend.homepage.package')
            @include('frontend.homepage.video_section')

            <div class="home-counter">
                @include('frontend.components.inner_counter')
            </div>
            @include('frontend.homepage.gallery')
            @include('frontend.components.discount')
            {{-- @include('frontend.homepage.blog') --}}
            @include('frontend.testimonial.testimonial')
            @include('frontend.homepage.call_to_action')





        </main>


        @include('frontend.components.footer')
        @include('frontend.components.top')
        @include('frontend.components.owner')





    </div>
@endsection



