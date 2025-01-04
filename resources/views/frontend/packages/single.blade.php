@foreach ($packages as $key => $package)
<article class="package-item" data-animscroll="fade-up" data-animscroll-delay="{{$key*100}}">
    <figure class="package-image" style="background-image: url({{asset(url($package->image))}});"></figure>
    <div class="package-content">
       <h3>
          <a href="{{ route('packages.single', ['slug' => $package->slug]) }}">
            {{ $package->title }}
          </a>
       </h3>
       <p>{{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($package->description)), 110, '... read more') }}</p>
       <div class="package-meta">
          <ul>
             <li>
                <i class="fas fa-clock"></i>
                {{ $package->days }}D/ {{ $package->nights }}N
             </li>
             <li>
                <i class="fas fa-user-friends"></i>
                pax: {{ $package->peoples }}
             </li>
             <li>
                <i class="fas fa-map-marker-alt"></i>
                {{ $package->location }}
             </li>
          </ul>
       </div>
    </div>
    <div class="package-price">
       <div class="review-area">
          <span class="review-text">({{ $package->days }} reviews)</span>
          <div class="rating-start-wrap d-inline-block">
             <div class="rating-start">
                <span style="width: 100%"></span>
             </div>
          </div>
       </div>
       <br>
       <h6 class="price-list">
          <span>${{ $package->price }}</span>
          / per person
       </h6>
       <a href="{{ route('packages.single', ['slug' => $package->slug]) }}" class="outline-btn outline-btn-white">Book now</a>
    </div>
 </article>
 @endforeach