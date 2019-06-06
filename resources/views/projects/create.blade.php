@extends('formLayout')
@section('title','Create Project')
@section('action','/projects')
@section('fields')
    @method('POST') 
    <div class="field control">
        <input class="input {{ $errors->has('title')? 'is-danger':'' }}" type="text" name="title" placeholder="Project Title" value="{{ old('title') }}">
    </div>

    <div class="field control">
        <textarea class="input {{ $errors->has('description')? 'is-danger':'' }}" name="description" placeholder="Project Description">{{ old('title') }}</textarea>
    </div>

    <div class="field control">
        <input class="button is-link" type="submit" value="submit">
    </div>
@endsection