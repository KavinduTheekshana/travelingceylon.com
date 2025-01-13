@extends('layouts.frontend')
@section('title', "$blog->title  | Journey into Ceylon's Timeless Beauty")
@section('meta_description', "$blog->meta_description")
@section('meta_keywords', "$blog->meta_keywords")

@section('content')
    <div id="page" class="page">
        <!-- ***site header html start*** -->
        @include('frontend.components.header')
        <main id="content" class="site-main">
            <!-- ***Inner Banner html start form here*** -->
        @section('single_page_img', asset('storage/' .$blog->image))
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
                                <img src="{{asset('storage/' .$blog->image)}}" alt="">
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
                                {!!$blog->content!!}


                            </article>
                            <br>
                            <div class="meta-wrap">
                                <div class="tag-links">
                                    {{ $blog->meta_keywords }}
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-4 secondary">
                            <div class="sidebar">

                                <aside class="widget widget_latest_post widget-post-thumb">
                                    <h3 class="widget-title">Recent Post</h3>
                                    <ul>
                                        <li>
                                            <figure class="post-thumb">
                                                <a href="blog-single.html"><img src="assets/images/img4.jpg"
                                                        alt=""></a>
                                            </figure>
                                            <div class="post-content">
                                                <h5>
                                                    <a href="blog-single.html">BEST JOURNEY TO PEACEFUL PLACES</a>
                                                </h5>
                                                <div class="entry-meta">
                                                    <span class="posted-on">
                                                        <a href="blog-single.html">August 17, 2021</a>
                                                    </span>
                                                    <span class="comments-link">
                                                        <a href="blog-single.html">No Comments</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <figure class="post-thumb">
                                                <a href="blog-single.html"><img src="assets/images/img5.jpg"
                                                        alt=""></a>
                                            </figure>
                                            <div class="post-content">
                                                <h5>
                                                    <a href="blog-single.html">BTRAVEL WITH FRIENDS IS BEST</a>
                                                </h5>
                                                <div class="entry-meta">
                                                    <span class="posted-on">
                                                        <a href="blog-single.html">August 17, 2021</a>
                                                    </span>
                                                    <span class="comments-link">
                                                        <a href="blog-single.html">No Comments</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <figure class="post-thumb">
                                                <a href="blog-single.html"><img src="assets/images/img6.jpg"
                                                        alt=""></a>
                                            </figure>
                                            <div class="post-content">
                                                <h5>
                                                    <a href="blog-single.html">SANTORINI ISLAND'S WEEKEND</a>
                                                </h5>
                                                <div class="entry-meta">
                                                    <span class="posted-on">
                                                        <a href="blog-single.html">August 17, 2021</a>
                                                    </span>
                                                    <span class="comments-link">
                                                        <a href="blog-single.html">No Comments</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </aside>
                                <aside class="widget widget_adds">
                                    <a href="{{ route('destinations.single', ['slug' => $distination->slug]) }}">
                                    <figure>
                                        <img src="{{ asset($distination->image) }}" alt="{{$distination->title}}">
                                    </figure>
                                </a>
                                </aside>
                                <aside class="widget widget_category">
                                    <h3 class="widget-title">Categories</h3>
                                    <ul>
                                        <li>
                                            <i aria-hidden="true" class="fas fa-dot-circle"></i>
                                            <a href="#">CULTURE</a>
                                            <span>(3)</span>
                                        </li>
                                        <li>
                                            <i aria-hidden="true" class="fas fa-dot-circle"></i>
                                            <a href="#">DESIGN</a>
                                            <span>(5)</span>
                                        </li>
                                        <li>
                                            <i aria-hidden="true" class="fas fa-dot-circle"></i>
                                            <a href="#">POPULAR</a>
                                            <span>(2)</span>
                                        </li>
                                        <li>
                                            <i aria-hidden="true" class="fas fa-dot-circle"></i>
                                            <a href="#">SLIDER</a>
                                            <span>(5)</span>
                                        </li>
                                        <li>
                                            <i aria-hidden="true" class="fas fa-dot-circle"></i>
                                            <a href="#">TECH</a>
                                            <span>(1)</span>
                                        </li>
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ***site footer html start form here*** -->
    <footer id="colophon" class="site-footer footer-primary">
        <div class="top-footer">
            <div class="container">
                <div class="upper-footer">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <aside class="widget widget_text">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="assets/images/site-logo.png" alt=""></a>
                                </div>
                                <div class="textwidget widget-text">
                                    Urna ratione ante harum provident, eleifend, vulputate molestiae proin fringilla,
                                    praesentium magna conubia at perferendis, pretium, aenean aut ultrices.
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <aside class="widget widget_latest_post widget-post-thumb">
                                <h3 class="widget-title">RECENT POST</h3>
                                <ul>
                                    <li>
                                        <figure class="post-thumb">
                                            <a href="blog-archive.html"><img src="assets/images/img21.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <div class="post-content">
                                            <h6>
                                                <a href="blog-single.html">BEST JOURNEY TO PEACEFUL PLACES</a>
                                            </h6>
                                            <div class="entry-meta">
                                                <span class="posted-on">
                                                    <a href="blog-archive.html">February 17, 2022</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <figure class="post-thumb">
                                            <a href="blog-archive.html"><img src="assets/images/img22.jpg"
                                                    alt=""></a>
                                        </figure>
                                        <div class="post-content">
                                            <h6>
                                                <a href="blog-single.html">TRAVEL WITH FRIENDS IS BEST</a>
                                            </h6>
                                            <div class="entry-meta">
                                                <span class="posted-on">
                                                    <a href="blog-archive.html">February 17, 2022</a>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <aside class="widget widget_text">
                                <h3 class="widget-title">CONTACT US</h3>
                                <div class="textwidget widget-text">
                                    <p>Feel free to contact and<br /> reach us !!</p>
                                    <ul>
                                        <li>
                                            <a href="tel:+01988256203">
                                                <i aria-hidden="true" class="icon icon-phone1"></i>
                                                +01(988) 256 203
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailtop:info@domain.com">
                                                <i aria-hidden="true" class="icon icon-envelope1"></i>
                                                info@domain.com
                                            </a>
                                        </li>
                                        <li>
                                            <i aria-hidden="true" class="icon icon-map-marker1"></i>
                                            3146 Koontz, California
                                        </li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <aside class="widget">
                                <h3 class="widget-title">Gallery</h3>
                                <div class="gallery gallery-colum-3">
                                    <figure class="gallery-item">
                                        <a href="assets/images/img10.jpg" data-fancybox="gallery-1">
                                            <img src="assets/images/img21.jpg" alt="">
                                        </a>
                                    </figure>
                                    <figure class="gallery-item">
                                        <a href="assets/images/img28.jpg" data-fancybox="gallery-1">
                                            <img src="assets/images/img22.jpg" alt="">
                                        </a>
                                    </figure>
                                    <figure class="gallery-item">
                                        <a href="assets/images/img14.jpg" data-fancybox="gallery-1">
                                            <img src="assets/images/img23.jpg" alt="">
                                        </a>
                                    </figure>
                                    <figure class="gallery-item">
                                        <a href="assets/images/img15.jpg" data-fancybox="gallery-1">
                                            <img src="assets/images/img24.jpg" alt="">
                                        </a>
                                    </figure>
                                    <figure class="gallery-item">
                                        <a href="assets/images/img12.jpg" data-fancybox="gallery-1">
                                            <img src="assets/images/img25.jpg" alt="">
                                        </a>
                                    </figure>
                                    <figure class="gallery-item">
                                        <a href="assets/images/img13.jpg" data-fancybox="gallery-1">
                                            <img src="assets/images/img26.jpg" alt="">
                                        </a>
                                    </figure>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
                <div class="lower-footer">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="footer-newsletter">
                                <p>Subscribe our newsletter for more update & news !!</p>
                                <form class="newsletter">
                                    <input type="email" name="email" placeholder="Enter Your Email">
                                    <button type="submit" class="outline-btn outline-btn-white">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 text-right">
                            <div class="social-icon">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/" target="_blank">
                                            <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com/" target="_blank">
                                            <i class="fab fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.youtube.com/" target="_blank">
                                            <i class="fab fa-youtube" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/" target="_blank">
                                            <i class="fab fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/" target="_blank">
                                            <i class="fab fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul>
                                    <li>
                                        <a href="policy.html">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="policy.html">Term & Condition</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="copy-right text-center">Copyright &copy; 2022 Traveler. All rights reserved.</div>
            </div>
        </div>
    </footer>
    <!-- ***site footer html end*** -->
    <a id="backTotop" href="#" class="to-top-icon">
        <i class="fas fa-chevron-up"></i>
    </a>
    <!-- ***custom search field html*** -->
    <div class="header-search-form">
        <div class="container">
            <div class="header-search-container">
                <form class="search-form" role="search" method="get">
                    <input type="text" name="s" placeholder="Enter your text...">
                </form>
                <a href="#" class="search-close">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- ***custom search field html*** -->
    <!-- ***custom top bar offcanvas html*** -->
    <div id="offCanvas" class="offcanvas-container">
        <div class="offcanvas-inner">
            <div class="offcanvas-sidebar">
                <aside class="widget author_widget">
                    <h3 class="widget-title">OUR PROPRIETOR</h3>
                    <div class="widget-content text-center">
                        <div class="profile">
                            <figure class="avatar">
                                <img src="assets/images/img21.jpg" alt="">
                            </figure>
                            <div class="text-content">
                                <div class="name-title">
                                    <h4> James Watson</h4>
                                </div>
                                <p>Accumsan? Aliquet nobis doloremque, aliqua? Inceptos voluptatem, duis tempore optio
                                    quae animi viverra distinctio cumque vivamus, earum congue, anim velit</p>
                            </div>
                            <div class="socialgroup">
                                <ul>
                                    <li> <a target="_blank" href="#"> <i class="fab fa-facebook"></i> </a>
                                    </li>
                                    <li> <a target="_blank" href="#"> <i class="fab fa-google"></i> </a> </li>
                                    <li> <a target="_blank" href="#"> <i class="fab fa-twitter"></i> </a> </li>
                                    <li> <a target="_blank" href="#"> <i class="fab fa-instagram"></i> </a>
                                    </li>
                                    <li> <a target="_blank" href="#"> <i class="fab fa-pinterest"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside class="widget widget_text text-center">
                    <h3 class="widget-title">CONTACT US</h3>
                    <div class="textwidget widget-text">
                        <p>Feel free to contact and<br /> reach us !!</p>
                        <ul>
                            <li>
                                <a href="tel:+01988256203">
                                    <i aria-hidden="true" class="icon icon-phone1"></i>
                                    +01(988) 256 203
                                </a>
                            </li>
                            <li>
                                <a href="mailtop:info@domain.com">
                                    <i aria-hidden="true" class="icon icon-envelope1"></i>
                                    info@domain.com
                                </a>
                            </li>
                            <li>
                                <i aria-hidden="true" class="icon icon-map-marker1"></i>
                                3146 Koontz, California
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
            <a href="#" class="offcanvas-close">
                <i class="fas fa-times"></i>
            </a>
        </div>
        <div class="overlay"></div>
    </div>
    <!-- ***custom top bar offcanvas html*** -->
</div>

@endsection
