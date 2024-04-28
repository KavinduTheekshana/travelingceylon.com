@foreach ($destinations as $key => $destination)
<div class="col-lg-4 col-md-6" data-animscroll="fade-up" data-animscroll-delay="{{$key*100}}">
   <article class="destination-item" style="background-image: url({{asset(url($destination->image))}});">
      <div class="destination-content">
         <div class="rating-start-wrap">
            <div class="rating-start">
               <span style="width: 100%"></span>
            </div>
         </div>
         <span class="cat-link">
            <a href="{{ route('destinations.single', ['slug' => $destination->slug]) }}">{{$destination->location}}</a>
         </span>
         <h3>
            <a href="{{ route('destinations.single', ['slug' => $destination->slug]) }}">{{$destination->title}}</a>
         </h3>
         <p>{{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($destination->description)), 50, '... read more') }}</p>
      </div>
   </article>
</div>
@endforeach