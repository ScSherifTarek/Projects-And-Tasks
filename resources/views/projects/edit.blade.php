@extends('formLayout')
@section('title','Edit Project')
@section('action',sprintf('/projects/%s',$project->id))
@section('form-id','edit')
@section('fields')	
		@method('Patch')
		<div class="field">
			<label class="label">Title</label>
		  	<div class="control">
			    <input class="input {{ $errors->has('title')? 'is-danger':'' }}" type="text" name="title" placeholder="Project title" value="{{ $project->title }}">
		  	</div>
		</div>

		<div class="field">
			<label class="label">Description</label>
		  	<div class="control">
			    <textarea class="textarea {{ $errors->has('description')? 'is-danger':'' }}" name="description" placeholder="Project Description">{{ $project->description }}</textarea>
		  	</div>
		</div>

		<div class="field">
		  	<div class="control">
			    <button form="edit" type="submit" class="button is-link">Update Project</button>
		  	</div>
		</div>
@endsection

@section('more')
	<form method="POST" action="/projects/{{ $project->id }}" id="delete">
		@csrf
		@method('DELETE')
		<br>
		<div class="field control">
			<button type="submit" form="delete" class="button">Delete Project</button>
		</div>
	</form>
@endsection
