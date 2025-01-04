@extends('layouts.frontend')

@section('content')

    <div id="page" class="page">

        @include('frontend.components.header')

        <main id="content" class="site-main">

        @section('single_page_img', asset($destinations->image))
        @section('single_page_name', 'Destination')
        @include('frontend.components.inner_banner')


        <div class="single-page-section">
            <div class="container">
                <figure class="single-feature-img">
                    <img loading="lazy" src="{{ asset($destinations->image) }}" alt="{{ $destinations->title }}">
                </figure>
                <div class="page-content">
                    <h2 class="m-0">{{ $destinations->title }} - {{ $destinations->location }}</h2>
                    <h6>{{ $destinations->category }}</h6>
                    {!!$destinations->description!!}
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
