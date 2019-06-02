@extends('layouts.app')

@section('content')
   <h2> {{ $job->job_title }}</h2>
    <p>{{ $job->company }}</p>
    <p>Posted on {{ $job->created_at }} </p>
    <p>Job Description</p>
    <p>{{ $job->description}}</p>

@auth
@if (auth()->user()->id === $job->user_id)  
    <a href="/job/{{ $job->id }}/edit" class="btn btn-primary">Edit</a>
    {!! Form::open(array('action' => ['JobsController@destroy', $job->id], 'method' => 'POST')) !!}
    {{ Form::hidden('_method', 'DELETE') }}
    {{ Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
@endif
@endauth

@endsection