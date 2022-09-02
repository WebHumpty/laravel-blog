@extends('blogs.layouts.default')

@php
    $title = 'Search';
@endphp

@section('title', $title)

@section('content')
@php /** @var \Illuminate\Pagination\Paginator $paginator */ @endphp
@if ($paginator->isNotEmpty())
    @foreach ($paginator as $value)
        <article class="post">
            <div class="post-thumb">
                <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}">
                    <img src="{{ $value->getImage() }}" alt="">
                </a>
                <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}"
                   class="post-thumb-overlay text-center">
                    <div class="text-uppercase text-center">View Post</div>
                </a>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                    <h6>
                        <a href="#">
                            {{ $value->blogCategory->name }}
                        </a>
                    </h6>
                    <h1 class="entry-title">
                        <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}">
                            {{ $value->title }}
                        </a>
                    </h1>
                </header>
                <div class="entry-content">
                    <p>
                        {!! $value->miniDescription() !!}
                    </p>
                    <div class="btn-continue-reading text-center text-uppercase">
                        <a href="{{ route('blogs.posts.single', ['slug' => $value->slug]) }}" class="more-link">
                            Continue Reading
                        </a>
                    </div>
                </div>
                <div class="social-share">
                    <span class="social-share-title pull-left text-capitalize">
                        By <a href="#">
                            {{ $value->blogAuthor->name }}
                        </a>
                        On {{ $value->publishedDate() }}
                    </span>
                    <ul class="text-center pull-right">
                        <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li>
                        {{ $value->views }}
                    </ul>
                </div>
            </div>
        </article>
    @endforeach
    {{ $paginator->links('vendor.pagination.bootstrap-4') }}
@else
    <div class="alert alert-danger" role="alert">
        Nothing found for your request!
    </div>
@endif
@endsection
