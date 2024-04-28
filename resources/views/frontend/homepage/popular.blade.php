   <!-- ***Home destination html start from here*** -->
   <section class="home-destination">
    <div class="container">
       <div class="row">
          <div class="col-lg-8 offset-lg-2 text-sm-center">
             <div class="section-heading">
                <h5 class="sub-title" data-animscroll="fade-up" data-animscroll-delay="100">UNCOVER PLACE</h5>
                <h2 class="section-title" data-animscroll="fade-up" data-animscroll-delay="100">POPULAR DESTINATION</h2>
                <p data-animscroll="fade-up" data-animscroll-delay="100">Explore the must-see destinations of Sri Lanka, including ancient cities, pristine beaches, and natural wonders.</p>
             </div>
          </div>
       </div>
       <div class="destination-section">
          <div class="row">
       

            @include('frontend.destinations.single')

          </div>
          <div class="section-btn-wrap text-center">
             <a href="{{ route('destinations.all') }}" class="round-btn" data-animscroll="fade-up" data-animscroll-delay="100">More Destination</a>
          </div>
       </div>
    </div>
 </section>
 <!-- ***Home destination html end here*** -->