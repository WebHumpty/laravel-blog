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

    @if (!empty($recentPosts) && $recentPosts->isNotEmpty())
        <aside class="widget pos-padding">
            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
            @foreach ($recentPosts as $value)
                <div class="thumb-latest-posts">
                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="popular-img">
                                <img src="{{ $value->getImage() }}" alt="" height="60">
                                <div class="p-overlay"></div>
                            </a>
                        </div>
                        <div class="p-content">
                            <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}"
                               class="text-uppercase">
                                {{ $value->title }}
                            </a>
                            <span class="p-date">
                        {{ $value->publishedDate() }}
                    </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </aside>
    @endif

    @if (!empty($popularPosts) && $popularPosts->isNotEmpty())
        <aside class="widget border pos-padding">
            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
            @foreach ($popularPosts as $value)
                <div class="popular-post">
                    <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}" class="popular-img">
                        <img src="{{ $value->getImage() }}" alt="">
                        <div class="p-overlay"></div>
                    </a>
                    <div class="p-content">
                        <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}" class="text-uppercase">
                            {{ $value->title }}
                        </a>
                        <span class="p-date">
                {{ $value->publishedDate() }}
            </span>
                    </div>
                </div>
            @endforeach
        </aside>
    @endif
</div>
