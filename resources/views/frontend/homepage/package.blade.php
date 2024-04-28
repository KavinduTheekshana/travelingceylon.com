  <!-- ***Home package html start from here*** -->
  <section class="home-package">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 offset-lg-2 text-sm-center">
             <div class="section-heading">
                <h5 class="sub-title" data-animscroll="fade-up" data-animscroll-delay="100">POPULAR PACKAGES</h5>
                <h2 class="section-title" data-animscroll="fade-up" data-animscroll-delay="100">CHECKOUT OUR PACKAGES</h2>
                <p data-animscroll="fade-up" data-animscroll-delay="100">Make your dream vacation a reality with our affordable travel packages that offer high-quality accommodations, transportation, and activities at competitive prices.</p>
             </div>
          </div>
       </div>
       <div class="package-section">

      
         @include('frontend.packages.single')
    
          <div class="section-btn-wrap text-center" data-animscroll="fade-up" data-animscroll-delay="100">
             <a href="{{ route('packages.all') }}" class="round-btn">VIEW ALL PACKAGES</a>
          </div>
       </div>
    </div>
 </section>
 <!-- ***Home package html end here*** -->