@extends('blogs.layouts.default')

@php
    $title = 'Search';
@endphp

@section('title', $title)

@section('content')
@php /** @var \Illuminate\Pagination\Paginator $paginator */ @endphp
@if ($paginator->isNotEmpty())
    @foreach ($paginator as $value)
        @include('blogs.blocks._post-list')
    @endforeach
    {{ $paginator->links('vendor.pagination.bootstrap-4') }}
@else
    <div class="alert alert-danger" role="alert">
        Nothing found for your request!
    </div>
@endif
@endsection
