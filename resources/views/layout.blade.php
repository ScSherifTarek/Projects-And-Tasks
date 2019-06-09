@extends('layouts.app')

@section('moreInHead')
    <title>@yield('title', 'my website')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
<style>
    .is-complete
    {
        text-decoration: line-through;
    }
</style>
@endsection

@section('content')
    @yield('content')
@endsection
