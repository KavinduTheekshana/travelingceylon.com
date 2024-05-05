<section class="home-testimonial mt-gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-heading">
                    <h5 class="sub-title">CLIENT'S REVIEWS</h5>
                    <h2 class="section-title">TRAVELLER'S TESTIMONIAL</h2>
                    <p>Real stories, real experiences. Explore traveler testimonials and get inspired for your next adventure.</p>
                </div>
            </div>
        </div>
        <div class="testimonial-section testimonial-slider">

            @foreach ($testimonials as $testimonial)
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <div class="rating-start-wrap">
                        <div class="rating-start">
                            <span style="width: {{$testimonial->star*20}}%"></span>
                        </div>
                    </div>
                    <p>{{ Str::limit(strip_tags($testimonial->comment), 200, '...') }}</p>
                    <div class="author-content">
                        <figure class="testimonial-img">
                            <img loading="lazy" src="{{ asset($testimonial->image) }}" alt="">
                        </figure>
                        <div class="author-name">
                            <h5>{{ Str::limit(strip_tags($testimonial->name), 15, '...') }}</h5>
                            <span>TRAVELLERS</span>
                        </div>
                    </div>
                    <div class="testimonial-icon">
                        <i aria-hidden="true" class="fas fa-quote-left"></i>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>