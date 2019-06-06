@extends('layout')

@section('content')
        <h1 class="title">Projects</h1>

        <ul>
            @foreach($projects as $project)
            <li>
                <a href="/projects/{{ $project->id }}">
                    {{$project->title}}    
                </a> 
            </li>
            @endforeach
        </ul>

        <br>
        <br>
        <a href="/projects/create" class="button is-success">New Project ?</a>
    </body>
@endsection