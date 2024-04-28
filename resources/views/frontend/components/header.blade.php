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
                      <h5 class="header-contact-no">+94 70 633 2644</h5>
                   </div>
                </a>
             </div>
             <div class="site-logo text-center">
                <h1 class="site-title">
                   <a href="{{url('/')}}">
                      <img src="{{ asset('frontend/assets/images/logo/travelingceylon.svg') }}" alt="Logo">
                   </a>
                </h1>
             </div>
             <div class="header-icon text-right">
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
                      <a href="https://www.facebook.com/profile.php?id=100093226444158&mibextid=ZbWKwL" target="_blank">
                         <i class="fab fa-facebook-f" aria-hidden="true"></i>
                      </a>
                   </li>
                   <li>
                      <a href="https://instagram.com/ithushani?igshid=ZGUzMzM3NWJiOQ==" target="_blank">
                         <i class="fab fa-instagram" aria-hidden="true"></i>
                      </a>
                   </li>
                   {{-- <li>
                      <a href="#" target="_blank">
                         <i class="fab fa-youtube" aria-hidden="true"></i>
                      </a>
                   </li> --}}
                </ul>
             </div>
             <div class="navigation-container d-none d-lg-block">
                <nav id="navigation" class="navigation">
                   <ul>
                      <li class="{{ request()->is('/') ? 'menu-active' : '' }}">
                         <a href="{{ route('/') }}">Home</a>
                      </li>
                      <li class="{{ request()->is('about') ? 'menu-active' : '' }}">
                         <a href="{{ route('about') }}">About us</a>
                      </li>
                      <li class="{{ Request::segment(1) === 'destinations' ? 'menu-active' : null }}">
                         <a href="{{ route('destinations.all') }}">Destination</a>
                      </li>

                      <li class="{{ Request::segment(1) === 'packages' ? 'menu-active' : null }}">
                        <a href="{{ route('packages.all') }}">Packages</a>
                     </li>
                     <li class="{{ request()->is('gallery') ? 'menu-active' : '' }}">
                        <a href="{{ route('gallery') }}">Gallery</a>
                     </li>
                     <li class="{{ request()->is('contact') ? 'menu-active' : '' }}">
                        <a href="{{ route('contact') }}">Contact Us</a>
                     </li>



                   </ul>
                </nav>
             </div>
             <div class="header-btn">
                <a href="{{ route('plan') }}" class="round-btn">Plan a Tour</a>
             </div>
          </div>
       </div>
    </div>
    <div class="mobile-menu-container"></div>
 </header>