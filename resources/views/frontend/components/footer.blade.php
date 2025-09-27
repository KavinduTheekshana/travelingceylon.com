<footer id="colophon" class="site-footer footer-primary">
    <div class="top-footer">
        <div class="container">
            <div class="upper-footer">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <aside class="widget widget_text">
                            <div class="footer-logo">
                                <a href="{{ url('/') }}"><img loading="lazy" class="lazyload"
                                        src="{{ asset('frontend/assets/images/logo/travelingceylon.png') }}"
                                        alt="Traveling ceylon logo"></a>
                            </div>
                            <div class="textwidget widget-text">
                                Welcome to our travel website! With over 22 years of experience in organizing
                                unforgettable tours, we are dedicated to providing you with an exceptional travel
                                experience in Sri Lanka.
                            </div>

                            <!-- TrustBox widget - Review Collector -->
                            <div class="trustpilot-widget" data-locale="en-GB"
                                data-template-id="56278e9abfbbba0bdcd568bc"
                                style="    position: relative;
                                 margin-top: 10px;
                                 margin-left: -80px;"
                                data-businessunit-id="662ebc5e8020661380806157" data-style-height="52px"
                                data-style-width="100%">
                                <a href="https://uk.trustpilot.com/review/travelingceylon.com" target="_blank"
                                    rel="noopener">Trustpilot</a>
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
                                            <a class="footer-image"
                                                href="{{ route('packages.single', ['slug' => $package->slug]) }}"><img loading="lazy"
                                                    class="footer-image" src="{{ asset($package->image) }}"
                                                    alt="{{$package->title}}"></a>
                                        </figure>
                                        <div class="post-content">
                                            <h6>
                                                <a
                                                    href="{{ route('packages.single', ['slug' => $package->slug]) }}" area-label="{{$package->title}}">{{ Str::limit(strip_tags($package->title), 60, '...') }}</a>
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
                                        {{-- <a href="tel:+94706332644">
                                            <i aria-hidden="true" class="icon icon-phone1"></i>
                                            +94 70 633 2644
                                        </a> --}}
                                        <a href="tel:+447936331462" aria-label="Call">
                                            <i aria-hidden="true" class="icon icon-phone1"></i>
                                            +44 79 3633 1462
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailtop:info@travelingceylon.com" aria-label="Email">
                                            <i aria-hidden="true" class="icon icon-envelope1"></i>
                                            info@travelingceylon.com
                                        </a>
                                    </li>
                                    <li>
                                        <i aria-hidden="true" class="icon icon-map-marker1"></i>
                                        90/62, Athapaththu Gardens,Depanama, Pannipitiya.
                                    </li>
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <aside class="widget">
                            <h3 class="widget-title">Popular Distinations</h3>
                            <div class="gallery gallery-colum-3">

                                @foreach($destinations_list as $key => $destination)
                                <a class="footer-primary-text" href="{{ url('/destination/' . $destination->slug) }}" area-label="{{ $destination->title }}">{{ $destination->title }}</a>@if(!$loop->last),&nbsp; @endif
                            @endforeach

                                {{-- @foreach ($gallery_footer as $gallery)
                                    <figure class="gallery-item gallery-item-width">
                                        <a class="footer-image" href="{{ asset($gallery->image) }}"
                                            data-fancybox="gallery-1">
                                            <img loading="lazy" class="footer-image" src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}">
                                        </a>
                                    </figure>
                                @endforeach --}}
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="copy-right text-center">Copyright &copy; {{ now()->year }} Traveling Ceylon | Developed By:
                <a href="https://creatxsoftware.com" area-label="CreatxSoftware" target="_blank">CreatxSoftware</a>
            </div>
        </div>
    </div>
</footer>
<!-- ***site footer html end*** -->
