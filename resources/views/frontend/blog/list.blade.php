@extends('layouts.frontend')
@section('title', "Blog | Journey into Ceylon's Timeless Beauty")
@section('meta_description',
    'Explore Sri Lanka with TravelingCeylon.com! Discover travel tips, tour packages, and
    guides for cultural, adventure, and luxury trips. Start your journey today!')
@section('meta_keywords',
    'Sri Lanka travel tips, Ceylon travel guides, Sri Lanka tour packages, best places in Sri
    Lanka, Sri Lanka cultural tours, Sri Lanka adventure trips, luxury Sri Lanka holidays, Sri Lanka travel blog')

@section('content')
    <div id="page" class="page">
        <!-- ***site header html start*** -->
        @include('frontend.components.header')
        <main id="content" class="site-main">
            <!-- ***Inner Banner html start form here*** -->
        @section('single_page_img', asset('frontend/assets/images/glamping_river_cabin_7.jpg'))
        @section('single_page_name', 'Blog Articles')
        @include('frontend.components.inner_banner')

        <div class="archive-section blog-archive">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 primary right-sidebar">
                        <!-- blog post item html start -->
                        <div class="grid blog-inner row">
                            @foreach ($blogs as $blog)
                                <div class="grid-item col-md-6">
                                    <article class="post">
                                        <figure class="featured-post featured-post-2">
                                            <img src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : asset('backend/assets/images/default.jpg') }}"
                                                alt="">
                                        </figure>
                                        <div class="post-content">
                                            <div class="cat-meta">
                                                <a
                                                    href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->category->name }}</a>
                                            </div>
                                            <h3><a
                                                    href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ Str::limit($blog->title, 40, '...') }}</a>
                                            </h3>
                                            <p>{{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($blog->meta_description)), 80, '... ') }}
                                            </p>
                                            <div class="post-footer d-flex justify-content-between align-items-center">
                                                <div class="post-btn">
                                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"
                                                        class="round-btn">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach

                        </div>
                        <!-- blog post item html end -->
                        <!-- pagination html start-->
                        {{-- <div class="post-navigation-wrap">
                            <nav>
                                <ul class="pagination">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">..</a></li>
                                    <li><a href="#">5</a></li>
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}

                        <div class="post-navigation-wrap">
                            <nav>
                                <ul class="pagination">
                                    <!-- Previous Page Link -->
                                    @if ($blogs->onFirstPage())
                                        <li class="disabled">
                                            <a href="#">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $blogs->previousPageUrl() }}">
                                                <i class="fas fa-arrow-left"></i>
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Pagination Elements -->
                                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                        @if ($page == $blogs->currentPage())
                                            <li class="active"><a href="{{ $url }}">{{ $page }}</a></li>
                                        @else
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    <!-- Next Page Link -->
                                    @if ($blogs->hasMorePages())
                                        <li>
                                            <a href="{{ $blogs->nextPageUrl() }}">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="disabled">
                                            <a href="#">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>


                        <!-- pagination html start-->
                    </div>


                    @include('frontend.blog.sidebar')
                </div>
            </div>
        </div>

    </main>

    @include('frontend.components.footer')
    @include('frontend.components.top')
    @include('frontend.components.owner')
</div>

@endsection
