@extends('layouts.app')

@section('content')
@auth

<div class="container col-12 col-md-12 col-sm-12 col-lg-6" style="margin-bottom: 10%">
<br><br>
{!! Form::open(array('action' => 'JobsController@store','method' => 'POST')) !!}

  <div class="" style="display: flex">
    {{ Form::label('company', 'Company', ['class' => 'col-md-6 font-weight-bold h5', 'style' => 'margin-left:-10px'])}} 
    {{ Form::label('location_id', 'Location', ['class' => 'col-md-4 font-weight-bold h5', 'style' => 'margin-left:3%'])}}  
  </div>
  <div class="form-group" style="display: flex">
    {{ Form::text('company', '', ['placeholder' => 'Company', 'class' => 'form-control form-control-lg col-md-6',  'style' => 'margin-right:3%;', 'required' => 'required']) }} 
    {{ Form::select('location_id', $locations, null, ['placeholder' => 'Location', 'class' => 'form-control form-control-lg col-md-3', 'required' => 'required']) }}  
  </div>
  <div class="" style="display: flex">
    {{ Form::label('job_title', 'Job Title', ['class' => 'col-md-6 font-weight-bold h5', 'style' => 'margin-left:-10px'])}}
    {{ Form::label('category_id', 'Category', ['class' => 'col-md-4 font-weight-bold h5', 'style' => 'margin-left:3%'])}}    
  </div>

  <div class="form-group" style="display: flex">  
  {{ Form::text('job_title', '', ['placeholder' => 'Job Title', 'class' => 'form-control form-control-lg  col-md-6', 'style' => 'margin-right:3%', 'required' => 'required']) }}   
  {{ Form::select('category_id', $categories, null, ['placeholder' => 'Category', 'class' => 'form-control form-control-lg  col-md-3', 'required' => 'required']) }}
  </div>
  <div class="" style="display: flex">
      {{ Form::label('contact_email', 'Contact Email', ['class' => 'col-md-6 font-weight-bold h5', 'style' => 'margin-left:-10px'])}} 
      {{ Form::label('contact_user', 'Contact User', ['class' => 'col-md-4 font-weight-bold h5', 'style' => 'margin-left:3%'])}}   
  </div>
  <div class="form-group" style="display: flex">   
      {{ Form::text('contact_email', '', ['placeholder' => 'Contact Email', 'class' => 'form-control form-control-lg col-md-6', 'style' => 'margin-right:3%', 'required' => 'required']) }}     
      {{ Form::text('contact_user', '', ['placeholder' => 'Contact User', 'class' => 'form-control form-control-lg col-md-3', 'required' => 'required']) }}
  </div>
  
  <div class="form-group">
  {{-- {{ Form::label('description', 'Description', ['class' => 'font-weight-bold h5'])}}   --}}
  {{ Form::textarea('description', ' ', ['placeholder' => 'Description', 'id' =>'editor', 'class' => 'col-md-12 col-lg-10', 'style' => "", 'required' => 'required']) }}
  </div>
  <div class="form-group">
  {{ Form::label('salary', 'Salary', ['class' => ' font-weight-bold h5'])}}  
  {{ Form::text('salary', '', ['placeholder' => 'Salary', 'class' => 'form-control form-control-l col-md-12 col-lg-10', ]) }}
  </div>
 
  

  {{ Form::submit('submit', [ 'class' => 'btn btn-primary']) }}

{!! Form::close() !!}
</div>
    
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

<script>
// import Highlight from '@ckeditor/ckeditor5-highlight/src/highlight';
// Remove a few plugins from the default setup.
ClassicEditor
    .create( document.querySelector( '#editor' ), {
      
        removePlugins: [''],
        toolbar: ['Heading','|','bold', 'italic', 'link', 'bulletedList', 'numberedList', '', 'undo','redo' ]
    } )
    .catch( error => {
        console.log( error );
    } );
</script>

@endauth
@endsection