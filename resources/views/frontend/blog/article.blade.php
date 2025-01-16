@extends('layouts.frontend')
@section('title', "$blog->title | Journey into Ceylon's Timeless Beauty")
@section('meta_description', "$blog->meta_description")
@section('meta_keywords', "$blog->meta_keywords")

@section('content')
    <div id="page" class="page">
        <!-- ***site header html start*** -->
        @include('frontend.components.header')
        <main id="content" class="site-main">
            <!-- ***Inner Banner html start form here*** -->
        @section('single_page_img', asset('storage/' . $blog->image))
        @section('single_page_name', $blog->title)
        @include('frontend.components.inner_banner')
        <!-- ***Inner Banner html end here*** -->
        <div class="single-post-section">
            <div class="single-post-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 primary right-sidebar">
                            <!-- single blog post html start -->
                            <figure class="feature-image">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                            </figure>
                            <div class="entry-meta">
                                <span class="byline">
                                    <a href="blog-archive.html">{{ $blog->user->name }}</a>
                                </span>
                                <span class="posted-on">
                                    <a href="blog-archive.html">{{ $blog->created_at->format('F j, Y') }}</a>
                                </span>
                                {{-- <span class="comments-link">
                                    <a href="#commentArea">No Comments</a>
                                </span> --}}
                            </div>
                            <article class="single-content-wrap">
                                {!! $blog->content !!}


                            </article>
                            <br>
                            <div class="meta-wrap">
                                <div class="tag-links">
                                    {{ $blog->meta_keywords }}
                                </div>
                            </div>


                        </div>

                        @include('frontend.blog.sidebar')

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ***site footer html start form here*** -->

    <!-- ***site footer html end*** -->
    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.owner')
</div>

@endsection
