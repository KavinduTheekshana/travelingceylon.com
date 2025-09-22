@forelse ($destinations as $key => $destination)
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
@empty
<div class="col-12">
   <div class="no-results-found text-center py-5">
      <div class="no-results-icon mb-3">
         <i class="fas fa-search fa-3x text-muted"></i>
      </div>
      <h4 class="text-muted">No Destinations Found</h4>
      <p class="text-muted mb-4">
         We couldn't find any destinations matching your search criteria.
         Try adjusting your filters or search terms.
      </p>
      <button type="button" class="btn btn-primary" id="clearAllFilters">
         <i class="fas fa-refresh me-2"></i>View All Destinations
      </button>
   </div>
</div>
@endforelse