<div class="col-lg-4 secondary">
    <div class="sidebar">

        <aside class="widget widget_latest_post widget-post-thumb">
            <h3 class="widget-title">Recent Post</h3>
            <ul>
                @foreach ($recents as $blog)
                    <li>
                        <figure class="post-thumb">
                            <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"><img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('backend/assets/images/default.jpg') }}"
                                    alt="{{ $blog->title }}"></a>
                        </figure>
                        <div class="post-content">
                            <h5>
                                <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                            </h5>
                            <div class="entry-meta">
                                <span class="posted-on">
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->created_at->format('F j, Y') }}</a>
                                </span>
                                <span class="comments-link">
                                    <a href="blog-single.html">{{ $blog->category->name }}</a>
                                </span>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </aside>
        <aside class="widget widget_adds">
            <a href="{{ route('destinations.single', ['slug' => $distination->slug]) }}">
                <figure>
                    <img src="{{ asset($distination->image) }}" alt="{{ $distination->title }}">
                </figure>
            </a>
        </aside>
        <aside class="widget widget_category">
            <h3 class="widget-title">Categories</h3>
            <ul>
                @foreach($categories as $category)
                <li>
                    <i aria-hidden="true" class="fas fa-dot-circle"></i>
                    <a href="#">{{ $category->name }}</a>
                    {{-- <span>({{ $category->blogs_count }})</span> --}}
                </li>
                @endforeach
            </ul>
        </aside>
    </div>
</div>