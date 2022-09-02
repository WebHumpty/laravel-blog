@extends('blogs.layouts.default')

@php
    $title = 'Blog';
@endphp

@section('title', $title)

@section('content')
@php /** @var \Illuminate\Pagination\Paginator $paginator */ @endphp
@if ($paginator->isNotEmpty())
    @foreach ($paginator as $value)
        <article class="post">
            <div class="post-thumb">
                <a href="#">
                    <img src="{{ $value->getImage() }}" alt="">
                </a>
                <a href="#"
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
                        <a href="#">
                            {{ $value->title }}
                        </a>
                    </h1>
                </header>
                <div class="entry-content">
                    <p>
                        {!! $value->miniDescription() !!}
                    </p>
                    <div class="btn-continue-reading text-center text-uppercase">
                        <a href="#" class="more-link">
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
@endif
@endsection
