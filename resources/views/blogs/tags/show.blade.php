@extends('blogs.layouts.default')

@php
/** @var \App\Models\Blogs\BlogTag $item */
$title = $item->name;
@endphp

@section('title', $title)

@section('content')
    @php /** @var \Illuminate\Pagination\Paginator $paginator */ @endphp
    @if ($paginator->isNotEmpty())
        @foreach ($paginator as $value)
            @include('blogs.blocks._post-list')
        @endforeach
        {{ $paginator->links('vendor.pagination.bootstrap-4') }}
    @endif
@endsection
