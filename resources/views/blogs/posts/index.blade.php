@extends('blogs.layouts.default')

@php
    $title = 'Blog';
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
