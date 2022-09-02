@extends('blogs.layouts.default')

@php
    /** @var \App\Models\Blogs\BlogPost $item */
   $title = $item->title;
@endphp

@section('title', $title)

@section('content')
    <article class="post">
        <div class="post-thumb">
            <a href="{{ route('blogs.posts.single', ['slug' => $item->slug]) }}">
                <img src="{{ $item->getImage() }}" alt="">
            </a>
        </div>
        <div class="post-content">
            <header class="entry-header text-center text-uppercase">
                <h6>
                    <a href="{{ route('blogs.categories.single', ['slug' => $item->blogCategory->slug]) }}">
                        {{ $item->blogCategory->name }}
                    </a>
                </h6>
                <h1 class="entry-title">
                    <a href="{{ route('blogs.posts.single', ['slug' => $item->slug]) }}">
                        {{ $item->title }}
                    </a>
                </h1>
            </header>
            <div class="entry-content">
                {!! $item->content !!}
            </div>
            <div class="decoration">
                @if ($item->blogTags->isNotEmpty())
                    @foreach ($item->blogTags as $value)
                        <a href="#" class="btn btn-default">
                            {{ $value->name }}
                        </a>
                    @endforeach
                @endif
            </div>

            <div class="social-share">
                <span class="social-share-title pull-left text-capitalize">
                    By <a href="{{ route('blogs.posts.single', ['slug' => $item->slug]) }}">
                        {{ $item->blogAuthor->name }}
                    </a>
                    On {{ $item->publishedDate() }}
                </span>
                <ul class="text-center pull-right">
                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </article>

    <div class="top-comment">
        <img src="assets/images/comment.jpg" class="pull-left img-circle" alt="">
        <h4>Rubel Miah</h4>
        <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
            sed diam nonumy hello ro mod tempor
            invidunt ut labore et dolore magna aliquyam erat.
        </p>
    </div>

    <div class="row">
        <div class="col-md-6">
            @if (!empty($previousPost))
            <div class="single-blog-box">
                <a href="{{ route('blogs.posts.single', ['slug' => $previousPost->slug]) }}">
                    <img src="{{ $previousPost->getImage() }}" alt="">
                    <div class="overlay">
                        <div class="promo-text">
                            <p><i class=" pull-left fa fa-angle-left"></i></p>
                            <h5>
                                {{ $previousPost->title }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>

        <div class="col-md-6">
            @if (!empty($nextPost))
            <div class="single-blog-box">
                <a href="{{ route('blogs.posts.single', ['slug' => $nextPost->slug]) }}">
                    <img src="{{ $nextPost->getImage() }}" alt="">
                    <div class="overlay">
                        <div class="promo-text">
                            <p><i class=" pull-right fa fa-angle-right"></i></p>
                            <h5>
                                {{ $nextPost->title }}
                            </h5>
                        </div>
                    </div>
                </a>
            </div>
            @endif
        </div>
    </div>

    <div class="related-post-carousel">
        @if (!empty($postsCarousel))
            <div class="related-heading">
                <h4>You might also like</h4>
            </div>
            <div class="items">
                @foreach ($postsCarousel as $value)
                    <div class="single-item" style="padding:0 5px 0 0;">
                        <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}">
                            <img src="{{ $value->getImage() }}" alt="">
                            <p>
                                {{ $value->title }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="bottom-comment">
        <h4>{{ $item->blogComments()->count() }} comments</h4>
        @foreach ($item->blogComments as $value)
            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Replay</a>
                <h5>{{ $value->name }}</h5>

                <p class="comment-date">
                    {{ $value->publishedDate() }}
                </p>
                <p class="para">
                    {{ $value->comment }}
                </p>
            </div>
        @endforeach
    </div>

    <div class="leave-comment">
        <h4>Leave a reply</h4>
        <form method="post" class="form-horizontal contact-form js-comment" role="form">
            @csrf
            <div class="form-group">
                <div class="col-md-6">
                    <input id="name" name="name" value="" type="text"
                           class="form-control" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input id="email" name="email" type="email"
                           class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <textarea id="comment" name="comment"
                              class="form-control" rows="3" placeholder="Write Massage"></textarea>
                </div>
            </div>
            <input id="post_id" type="hidden" name="post_id" value="{{ $item->id }}">
            <input id="post_id" type="hidden" name="user_id" value="{{ Auth::user()->id ?? 0 }}">
            <button type="submit" class="btn send-btn">Add Comment</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/comments.js') }}"></script>
@endpush