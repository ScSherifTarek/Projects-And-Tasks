@extends('layout')

@section('title')
	@yield('title', 'Form')
@endsection
    
@section('content')
        <h1 class="title">@yield('title', 'Form')</h1>
        <form method="POST" action="@yield('action')" id="@yield('form-id')">
			{{ csrf_field() }}
            @yield('fields')
        </form>

        @yield('more')
        @include('errors')
@endsection