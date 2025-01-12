@extends('layouts.frontend')
@section('title', "Sri Lanka Travel Gallery | Stunning Photos of Ceylon's Beauty")
@section('meta_description', 'Browse stunning images of Sri Lanka\'s most breathtaking landscapes, beaches, and cultural
    sites in our gallery. Explore the beauty of Ceylon through Traveling Ceylon.')
@section('meta_keywords', 'Sri Lanka travel gallery, Ceylon travel images, Sri Lanka photography, Sri Lanka landscape
    photos, travel photos Sri Lanka, Sri Lanka tourism pictures, beautiful Sri Lanka gallery, Traveling Ceylon gallery')
@section('content')
    <div id="page" class="page">
        <!-- ***site header html start*** -->
        <header id="masthead" class="site-header">
            <!-- header html start -->
            <div class="top-header">
                <div class="container">
                    <div class="top-header-inner">
                        <div class="header-contact text-left">
                            <a href="tel:+01977259912">
                                <i aria-hidden="true" class="icon icon-phone-call2"></i>
                                <div class="header-contact-details">
                                    <span class="contact-label">For Further Inquires :</span>
                                    <h5 class="header-contact-no">+01 (977) 2599 12</h5>
                                </div>
                            </a>
                        </div>
                        <div class="site-logo text-center">
                            <p class="site-title">
                                <a href="index.html">
                                    <img src="assets/images/site-logo.png" alt="Logo">
                                </a>
                            </p>
                        </div>
                        <div class="header-icon text-right">
                            <div class="header-search-icon d-inline-block">
                                <a href="#">
                                    <i aria-hidden="true" class="fas fa-search"></i>
                                </a>
                            </div>
                            <div class="offcanvas-menu d-inline-block">
                                <a href="#">
                                    <i aria-hidden="true" class="icon icon-burger-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="bottom-header-inner d-flex justify-content-between align-items-center">
                        <div class="header-social social-icon">
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com" target="_blank">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.com" target="_blank">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com" target="_blank">
                                        <i class="fab fa-youtube" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="navigation-container d-none d-lg-block">
                            <nav id="navigation" class="navigation">
                                <ul>
                                    <li class="menu-active">
                                        <a href="index.html">Home</a>
                                    </li>
                                    <li>
                                        <a href="about.html">about us</a>
                                    </li>
                                    <li>
                                        <a href="destination.html">destination</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="index.html">packages</a>
                                        <ul>
                                            <li>
                                                <a href="package.html">Packages</a>
                                            </li>
                                            <li>
                                                <a href="package-offer.html">Package offer</a>
                                            </li>
                                            <li>
                                                <a href="package-detail.html">Package detail</a>
                                            </li>
                                            <li>
                                                <a href="cart.html">Cart page</a>
                                            </li>
                                            <li>
                                                <a href="booking.html">Booking page</a>
                                            </li>
                                            <li>
                                                <a href="confirmation.html">Confirmation</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="index.html">Pages</a>
                                        <ul>
                                            <li>
                                                <a href="service.html">Service</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Career</a>
                                                <ul>
                                                    <li>
                                                        <a href="career.html">Career</a>
                                                    </li>
                                                    <li>
                                                        <a href="career-detail.html">Career detail</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="team.html">Tour guide</a>
                                            </li>
                                            <li>
                                                <a href="gallery.html">Gallery page</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="#">Blog</a>
                                                <ul>
                                                    <li>
                                                        <a href="blog-archive.html">Blog archive</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-single.html">blog single</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="single-page.html">Single Page</a>
                                            </li>
                                            <li>
                                                <a href="testimonial.html">Testimonial</a>
                                            </li>
                                            <li>
                                                <a href="faq.html">Faq Page</a>
                                            </li>
                                            <li>
                                                <a href="search-page.html">Search Page</a>
                                            </li>
                                            <li>
                                                <a href="404.html">404 Page</a>
                                            </li>
                                            <li>
                                                <a href="comming-soon.html">Comming Soon Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="contact.html">contact us</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-btn">
                            <a href="booking.html" class="round-btn">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-container"></div>
        </header>
        <main id="content" class="site-main">
            <!-- ***Inner Banner html start form here*** -->
            <div class="inner-banner-wrap">
                <div class="inner-baner-container" style="background-image: url(assets/images/img7.jpg);">
                    <div class="container">
                        <div class="inner-banner-content">
                            <h1 class="page-title">BEST JOURNEY TO PEACEFUL PLACES</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***Inner Banner html end here*** -->
            <div class="single-post-section">
                <div class="single-post-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 primary right-sidebar">
                                <!-- single blog post html start -->
                                <figure class="feature-image">
                                    <img src="assets/images/img27.jpg" alt="">
                                </figure>
                                <div class="entry-meta">
                                    <span class="byline">
                                        <a href="blog-archive.html">Demoteam</a>
                                    </span>
                                    <span class="posted-on">
                                        <a href="blog-archive.html">August 17, 2021</a>
                                    </span>
                                    <span class="comments-link">
                                        <a href="#commentArea">No Comments</a>
                                    </span>
                                </div>
                                <article class="single-content-wrap">
                                    <p>Natus unde, nibh malesuada ipsam netus, placeat hendrerit cupidatat illo facilisis
                                        officia, beatae lacus, fugit, feugiat gravida, ratione sem eaque wisi! Eveniet,
                                        ullamcorper! A, commodo, possimus, aut, ad tincidunt, minim, vel cum mattis
                                        vulputate! Accusantium sociis optio? Quisque, ultrices veritatis mauris ipsam! Rerum
                                        bibendum senectus neque hac iste ullam lacinia? Unde senectus nostra class ipsam
                                        nostrum eos, eleifend rhoncus autem ratione pharetra recusandae illo litora dolorem
                                        ullamco mollis, pede mus rutrum error, ex consequat purus, mi natoque condimentum
                                        consectetuer quibusdam, alias, nascetur ut laudantium, veritatis eiusmod, ultrices
                                        fugiat! Iste placeat? Explicabo nulla cras cillum magnis! Vulputate, metus suscipit!
                                        Massa est.</p>
                                    <blockquote>
                                        <p>Sagittis perferendis? Leo nobis irure egestas excepturi ipsam nascetur elementum,
                                            montes. Torquent, soluta, ac nihil.</p>
                                    </blockquote>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis varius ligula non
                                        tellus euismod fermentum. Nulla quis enim ut est dapibus luctus quis quis enim. Ut
                                        bibendum ultricies nisl ut aliquam. Ut in arcu id nunc elementum ultricies eu eget
                                        lacus nam at neque lorem.</p>
                                </article>
                                <div class="meta-wrap">
                                    <div class="tag-links">
                                        <a href="#">Destination</a>,
                                        <a href="#">hiking</a>,
                                        <a href="#">Travel Dairies</a>,
                                        <a href="#">Travelling</a>,
                                        <a href="#">Trekking</a>
                                    </div>
                                </div>
                                <div class="author-wrap">
                                    <div class="author-thumb">
                                        <img src="assets/images/user-img.png" alt="">
                                    </div>
                                    <div class="author-content">
                                        <h3 class="author-name">Demoteam</h3>
                                        <p>Anim eligendi error magnis. Pretium fugiat cubilia ullamcorper adipisci, lobortis
                                            repellendus sit culpa maiores!</p>
                                        <a href="blog-archive.html" class="button-text">View All Posts > </a>
                                    </div>
                                </div>
                                <!-- post comment html -->
                                <div id="commentArea" class="comment-area">
                                    <h3 class="comment-title">3 Comments</h3>
                                    <div class="comment-area-inner">
                                        <ol>
                                            <li>
                                                <figure class="comment-thumb">
                                                    <img src="assets/images/img18.jpg" alt="">
                                                </figure>
                                                <div class="comment-content">
                                                    <div class="comment-header">
                                                        <h5 class="author-name">WILLIAM WRIGHT</h5>
                                                        <span class="post-on">March 10 2022</span>
                                                    </div>
                                                    <p>Fames tincidunt diamlorem tristique accumsan nulla, sem. Voluptatibus
                                                        doloremque, luctus.</p>
                                                    <a href="#replyForm" class="reply"><i
                                                            class="fas fa-reply"></i>Reply</a>
                                                </div>
                                            </li>
                                            <li>
                                                <ol>
                                                    <li>
                                                        <figure class="comment-thumb">
                                                            <img src="assets/images/img19.jpg" alt="">
                                                        </figure>
                                                        <div class="comment-content">
                                                            <div class="comment-header">
                                                                <h5 class="author-name">ALISON WHITE</h5>
                                                                <span class="post-on">March 10 2022</span>
                                                            </div>
                                                            <p>Fames tincidunt diamlorem tristique accumsan nulla, sem.
                                                                Voluptatibus doloremque, luctus.</p>
                                                            <a href="#replyForm" class="reply"><i
                                                                    class="fas fa-reply"></i>Reply</a>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
                                    </div>
                                    <div id="replyForm" class="comment-form-wrap">
                                        <h3 class="comment-title">Leave a Reply</h3>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form class="comment-form">
                                            <p class="full-width">
                                                <label>Comment</label>
                                                <textarea rows="9"></textarea>
                                            </p>
                                            <p>
                                                <label>Name *</label>
                                                <input type="text" name="name">
                                            </p>
                                            <p>
                                                <label>Email *</label>
                                                <input type="email" name="email">
                                            </p>
                                            <p>
                                                <label>Website</label>
                                                <input type="text" name="web">
                                            </p>
                                            <p>
                                                <label>
                                                    <input type="checkbox" name="s">
                                                    Save my name, email, and website in this browser for the next time I
                                                    comment.
                                                </label>
                                            </p>
                                            <p class="full-width">
                                                <input type="submit" name="submit" value="Post comment">
                                            </p>
                                        </form>
                                    </div>
                                    <!-- post navigation html -->
                                    <div class="post-navigation">
                                        <div class="nav-prev">
                                            <a href="blog-single.html">
                                                <span class="nav-label">Previous</span>
                                                <span class="nav-title">A Sample of a BlockQuote</span>
                                            </a>
                                        </div>
                                        <div class="nav-next">
                                            <a href="blog-single.html">
                                                <span class="nav-label">Next</span>
                                                <span class="nav-title">Blog Can Be Everything Nowadays.</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog post item html end -->
                            </div>
                            <div class="col-lg-4 secondary">
                                <div class="sidebar">
                                    <aside class="widget author_widget">
                                        <h3 class="widget-title">ABOUT AUTHOR</h3>
                                        <div class="widget-content text-center">
                                            <div class="profile">
                                                <figure class="avatar">
                                                    <a href="#">
                                                        <img src="assets/images/img20.jpg" alt="">
                                                    </a>
                                                </figure>
                                                <div class="text-content">
                                                    <div class="name-title">
                                                        <h4>
                                                            <a href="#">James Watson</a>
                                                        </h4>
                                                    </div>
                                                    <p>Accumsan? Aliquet nobis doloremque, aliqua? Inceptos voluptatem, duis
                                                        tempore optio quae animi viverra distinctio cumque vivamus, earum
                                                        congue, anim velit</p>
                                                </div>
                                                <div class="socialgroup">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="https://www.facebook.com/">
                                                                <i class="fab fa-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.google.com/">
                                                                <i class="fab fa-google"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.twitter.com/">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.instagram.com/">
                                                                <i class="fab fa-instagram"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="https://www.pinterest.com/">
                                                                <i class="fab fa-pinterest"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
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
                                        <figure>
                                            <img src="assets/images/add-banner.jpg">
                                        </figure>
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
