<div class="primary-sidebar">
    @if (!empty($categoriesList) && $categoriesList->isNotEmpty())
        <aside class="widget">
            <h3 class="widget-title text-uppercase text-center">Categories</h3>
            <ul>
                @foreach ($categoriesList as $value)
                    <li>
                        <a href="{{ route('blogs.categories.single', ['slug' => $value->slug]) }}">
                            {{ $value->name }}
                        </a>
                        <span class="post-count pull-right"> ({{ $value->blogPosts->count() }})</span>
                    </li>
                @endforeach
            </ul>
        </aside>
    @endif

    <aside class="widget pos-padding">
        <h3 class="widget-title text-uppercase text-center">
            Recent Posts
        </h3>

        <div class="thumb-latest-posts">
            <div class="media">
                <div class="media-left">
                    <a href="#" class="popular-img">
                        <img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="" height="60">
                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="#" class="text-uppercase">
                        Home is peaceful Place
                    </a>
                    <span class="p-date">
                        February 15, 2016
                    </span>
                </div>
            </div>
        </div>

        <div class="thumb-latest-posts">
            <div class="media">
                <div class="media-left">
                    <a href="#" class="popular-img">
                        <img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="" height="60">
                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="#" class="text-uppercase">
                        Home is peaceful Place
                    </a>
                    <span class="p-date">
                        February 15, 2016
                    </span>
                </div>
            </div>
        </div>
        <div class="thumb-latest-posts">
            <div class="media">
                <div class="media-left">
                    <a href="#" class="popular-img">
                        <img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="" height="60">
                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="#" class="text-uppercase">
                        Home is peaceful Place
                    </a>
                    <span class="p-date">
                        February 15, 2016
                    </span>
                </div>
            </div>
        </div>
        <div class="thumb-latest-posts">
            <div class="media">
                <div class="media-left">
                    <a href="#" class="popular-img">
                        <img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="" height="60">
                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="#" class="text-uppercase">
                        Home is peaceful Place
                    </a>
                    <span class="p-date">
                        February 15, 2016
                    </span>
                </div>
            </div>
        </div>
    </aside>

    <aside class="widget">
        <h3 class="widget-title text-uppercase text-center">
            Popular Posts
        </h3>

        <div class="popular-post">
            <a href="#" class="popular-img">
                <img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="">
                <div class="p-overlay"></div>
            </a>
            <div class="p-content">
                <a href="#" class="text-uppercase">
                    Home is peaceful Place
                </a>
                <span class="p-date">
                    February 15, 2016
                </span>
            </div>
        </div>

        <div class="popular-post">
            <a href="#" class="popular-img"><img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="">
                <div class="p-overlay"></div>
            </a>
            <div class="p-content">
                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                <span class="p-date">February 15, 2016</span>
            </div>
        </div>
        <div class="popular-post">
            <a href="#" class="popular-img"><img src="{{ asset('uploads/images/blog-1.jpg') }}" alt="">
                <div class="p-overlay"></div>
            </a>
            <div class="p-content">
                <a href="#" class="text-uppercase">Home is peaceful Place</a>
                <span class="p-date">February 15, 2016</span>
            </div>
        </div>
    </aside>
</div>
