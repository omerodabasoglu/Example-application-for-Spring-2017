@extends('layouts.master')

@push('head')
    <link href="/css/books/show.css" rel="stylesheet">
@endpush

@section('title')
    Show book: {{ $title }}
@endsection

@section('content')
    <h1>Show book: {{ $title }}
@endsection
