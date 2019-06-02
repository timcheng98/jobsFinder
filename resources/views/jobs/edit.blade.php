@extends('layouts.app')

@section('content')
@auth
@if (auth()->user()->id === $job->user_id)
<div class="container" style="margin-bottom: 10%">
{!! Form::open(array('action' => ['JobsController@update', $job->id], 'method' => 'POST')) !!}
  <div class="form-group">
    {{ Form::label('company', 'Company')}}  
    {{ Form::text('company', $job->company, ['placeholder' => 'Company', 'class' => 'form-control', 'required' => 'required']) }}  
  </div>
  <div class="form-group">  
  {{ Form::label('job_title', 'Job Title')}}  
  {{ Form::text('job_title', $job->job_title, ['placeholder' => 'Job Title', 'class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">  
      {{ Form::label('category_id', 'Category')}}    
      {{ Form::select('category_id', $categories, $job->category_id, ['placeholder' => 'Category', 'class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">
  {{ Form::label('description', 'Description')}}  
  {{ Form::textarea('description', $job->description, ['placeholder' => 'Description', 'class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">
  {{ Form::label('salary', 'Salary')}}  
  {{ Form::text('salary', $job->salary, ['placeholder' => 'Salary', 'class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">
  {{ Form::label('location_id', 'Location')}}  
  {{ Form::select('location_id',$locations, $job->location, ['placeholder' => 'Location', 'class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">
  {{ Form::label('contact_email', 'Contact Email')}}  
  {{ Form::text('contact_email', $job->contact_email, ['placeholder' => 'Contact Email', 'class' => 'form-control', 'required' => 'required']) }}
  </div>
  <div class="form-group">
  {{ Form::label('contact_user', 'Contact User')}}  
  {{ Form::text('contact_user', $job->contact_user, ['placeholder' => 'Contact User', 'class' => 'form-control', 'required' => 'required']) }}
  </div>

  {{ Form::hidden('_method', 'PUT')}}

  {{ Form::submit('submit', [ 'class' => 'btn btn-primary']) }}

{!! Form::close() !!}
</div> 
@endif
@endauth
@endsection