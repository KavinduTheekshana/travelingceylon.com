 <!-- ***site footer html start form here*** -->
 <footer id="colophon" class="site-footer footer-primary">
     <div class="top-footer">
         <div class="container">
             <div class="upper-footer">
                 <div class="row">
                     <div class="col-lg-3 col-sm-6">
                         <aside class="widget widget_text">
                             <div class="footer-logo">
                                 <a href="index.html"><img src="{{ asset('frontend/assets/images/logo/travelingceylon.svg') }}"
                                         alt=""></a>
                             </div>
                             <div class="textwidget widget-text">
                                 Welcome to our travel website! With over 22 years of experience in organizing
                                 unforgettable tours, we are dedicated to providing you with an exceptional travel
                                 experience in Sri Lanka.
                             </div>

                             <!-- TrustBox widget - Review Collector -->
        <div class="trustpilot-widget" data-locale="en-GB" data-template-id="56278e9abfbbba0bdcd568bc"
        data-businessunit-id="662ebc5e8020661380806157" data-style-height="52px" data-style-width="100%">
        <a href="https://uk.trustpilot.com/review/travelingceylon.com" target="_blank" rel="noopener">Trustpilot</a>
    </div>
    <!-- End TrustBox widget -->


                         </aside>
                     </div>
                     <div class="col-lg-3 col-sm-6">
                         <aside class="widget widget_latest_post widget-post-thumb">
                             <h3 class="widget-title">Popular Package</h3>
                             <ul>
                                @foreach ($packages_footer as $package)
                                 <li>
                                     <figure class="post-thumb post-thumb-height">
                                         <a class="footer-image" href="{{ route('packages.single', ['slug' => $package->slug]) }}"><img class="footer-image" src="{{ asset($package->image) }}"
                                                 alt=""></a>
                                     </figure>
                                     <div class="post-content">
                                         <h6>
                                             <a href="{{ route('packages.single', ['slug' => $package->slug]) }}">{{ Str::limit(strip_tags($package->title), 60, '...') }}</a>
                                         </h6>

                                     </div>
                                 </li>
                             @endforeach
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
                                         <a href="tel:+94706332644">
                                             <i aria-hidden="true" class="icon icon-phone1"></i>
                                             +94 70 633 2644
                                         </a>
                                         <a href="tel:+447916177140">
                                            <i aria-hidden="true" class="icon icon-phone1"></i>
                                            +44 79 16 177 140
                                        </a>
                                     </li>
                                     <li>
                                         <a href="mailtop:info@travelingceylon.com">
                                             <i aria-hidden="true" class="icon icon-envelope1"></i>
                                             info@travelingceylon.com
                                         </a>
                                     </li>
                                     <li>
                                         <i aria-hidden="true" class="icon icon-map-marker1"></i>
                                         Bryanstone Road,
                                         Waltham Cross,
                                         United Kingdom
                                     </li>
                                 </ul>
                             </div>
                         </aside>
                     </div>
                     <div class="col-lg-3 col-sm-6">
                         <aside class="widget">
                             <h3 class="widget-title">Gallery</h3>
                             <div class="gallery gallery-colum-3">

                                @foreach ($gallery_footer as $gallery)
                                 <figure class="gallery-item gallery-item-width">
                                     <a class="footer-image" href="{{ asset($gallery->image) }}" data-fancybox="gallery-1">
                                         <img class="footer-image" src="{{asset($gallery->image)}}" alt="">
                                     </a>
                                 </figure>

                              @endforeach
                             </div>
                         </aside>
                     </div>
                 </div>
             </div>
             {{-- <div class="lower-footer">
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
          </div> --}}
         </div>
     </div>
     <div class="bottom-footer">
         <div class="container">
             <div class="copy-right text-center">Copyright &copy; {{ now()->year }} Traveling Ceylon | Developed By: <a
                     href="https://neuroon.lk" target="_blank">Neuroon Informatics</a></div>
         </div>
     </div>
 </footer>
 <!-- ***site footer html end*** -->
