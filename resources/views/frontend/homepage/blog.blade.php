<section class="home-blog">
    <div class="container">
        <div class="section-heading d-sm-flex align-items-center justify-content-between">
            <div class="heading-group">
                <h5 class="sub-title">LATEST BLOG</h5>
                <h2 class="section-title">OUR RECENT POSTS</h2>
                <p>Stay updated with the latest trends, tips, and insights from our experts.</p>
            </div>
            <div class="heading-btn">
                <a href="{{ route('blog.list.all') }}" class="round-btn">View All Blog</a>
            </div>
        </div>
        <div class="blog-section">
            <div class="row gx-4">

                @foreach ($blogs as $blog)
                    <div class="col-lg-6">
                        <article class="post">
                            <figure class="featured-post"
                                style="background-image: url({{ $blog->image ? asset('storage/' . $blog->image) : asset('backend/assets/images/default.jpg') }});">
                            </figure>
                            <div class="post-content">
                                <div class="cat-meta">
                                    <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"> {{ $blog->category->name }}</a>
                                </div>
                                <h3><a href="{{ route('blog.details', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h3>
                                <p>{{ Str::limit(str_replace('&nbsp;', ' ', strip_tags($blog->content)), 80, '...') }}
                                </p>
                                <div class="post-footer d-flex justify-content-between align-items-center">
                                    <div class="post-btn">
                                        <a href="{{ route('blog.details', ['slug' => $blog->slug]) }}"
                                            class="round-btn">Read More</a>
                                    </div>

                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
