@foreach ($gallery as $image)
<div class="single-gallery grid-item">
    <figure class="gallery-img">
        <a href="{{asset(url($image->image))}}" data-fancybox="gallery">
            <img class="lazyload" src="{{asset(url($image->thumbnail))}}" alt="{{$image->title}}" width="100%" height="100%">
        </a>
    </figure>
</div>
@endforeach
