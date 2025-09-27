@foreach ($packages as $key => $package)
    <article class="package-item" data-animscroll="fade-up" data-animscroll-delay="{{ $key * 100 }}">
        <figure class="package-image-holder">
            <img src="{{ asset($package->image) }}" class="package-image lazyload" alt="{{ $package->title }}">
        </figure>

        <div class="package-content">
            <h3>
                <a href="{{ route('packages.single', ['slug' => $package->slug]) }}">
                    {{ $package->title }}
                </a>
            </h3>
            <p>
                {!! Str::limit(
                    str_replace('&nbsp;', ' ', strip_tags($package->description)),
                    110,
                    '... <a href="' . route('packages.single', ['slug' => $package->slug]) . '">read more</a>',
                ) !!}
            </p>

            <div class="package-meta">
                <ul>
                    <li>
                        <i class="fas fa-clock"></i>
                        {{ $package->days }}D/ {{ $package->nights }}N
                    </li>
                </ul>
            </div>
            <div class="package-meta">
                <ul>
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        {{ $package->location }}
                    </li>
                </ul>
            </div>
            <br>

         <a href="{{ route('packages.single', ['slug' => $package->slug]) }}"
                class="round-btn mt-3">View More Details</a>

        </div>
    </article>
@endforeach