@extends('layout')
@section('title')
	@yield('title', $project->title)
@endsection

@section('content')
	<h1 class="title"> {{ $project->title }} </h1>

	<div class="content"> 
		{{ $project->description }} 
		
		<p>
			<a href="/projects/{{ $project->id }}/edit">edit</a>
		</p>
	</div>

	@if ($project->tasks->count())
		<div class="box">
			@foreach ($project->tasks as $task)
				<div>
					<form method="POST" action="/completed-tasks/{{ $task->id }}">
						@csrf

						@if ($task->completed)
							@method('DELETE')
						@endif
						
						<label class="checkbox {{ $task->completed ? 'is-complete' : '' }}">
						  <input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
						  	{{ $task->description }}
						</label>
					</form>
				</div>
			@endforeach
		</div>
	@endif


	{{-- add a new task form --}}
	<form method="POST" action="/projects/{{ $project->id }}/tasks" class="box">
		@csrf
		<div class="field">
			<label class="label">New Task</label>
			<div class="control">
				<input class="input {{ $errors->has('description')? 'is-danger':'' }}" type="text" name="description" placeholder="New Task">
			</div>
		</div>

		<div class="control">
			<button class="button is-primary">Add Task</button>
		</div>

		@include('errors')
	</form>
@endsection