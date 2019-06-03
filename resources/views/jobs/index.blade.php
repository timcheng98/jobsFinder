@extends('layouts.index')

@section('content')


  <div class="col-10 col-sm-10 col-md-12  text-center bg-secondary " 
style="padding-top:10%;padding-bottom:10%;background-image:url({{ asset('storage/index-bg-3.jpg')}});background-size:cover;">
    
@include('include.index-navbar')
      <h1 class="text-dark font-weight-bold w3-animate-opacity text-md" style="">Find your Job</h1>
      <br><br> 
      {!! Form::open(array('action' => 'JobsController@search','method' => 'POST', 'class' => 'w3-animate-opacity')) !!}
      <div class="row" style="margin-left:20%">   
      {{ Form::text('job_title', '', [
                     'placeholder' => 'Keywords or job title',  
                        'id' => 'job_title',                     
                        'class' => 'form-control form-control-lg fadeIn animated', 
                        'autocomplete' => 'off',
                        // 'required' => 'required',
                        'style' => 'width:25%;margin-right:10px'
                      ] 
                    )}}
      {{ Form::select('location_id', $locations, null,
                      [
                        'placeholder' => 'Location',                       
                        'class' => 'custom-select custom-select-lg mb-3', 
                        // 'required' => 'required',
             
                        'style' => 'width:25%; margin-right:10px;max-height:100px'
                      ]) }}
      {{ Form::select('category_id', $categoriesName, null,
                      [
                        'placeholder' => 'Category',                       
                        'class' => 'custom-select custom-select-lg mb-3', 
                        // 'required' => 'required',
                        
                        'style' => 'width:25%; margin-right:10px'
                      ]) }}
       {{ Form::submit('Search', ['class' => 'btn btn-danger', 'style' => 'height:46px'])}}
       <br>
         <ul id="result" class="list-group" style="margin-top:50px;;position:absolute;width:20%" ></ul>
      </div>             
      <br><br>     
      {!! Form::close() !!}
    
    </div>
    <br>
    <div class="container col-md-11 category-item">
        <div class="col-md-11 col-sm-11">
          <h1 class="font-weight-bold">Job Category</h1><hr>       
            @foreach ($categories as $category)       
              <a href="search/findjob/<?php echo preg_replace('/(\s+)|(\/+)/','',$category->name); ?>/{{ $category->id}}">
                <h5 class="text-white btn btn-info btn-lg index-category-name" style="">
                  {{$category->name}} 
                </h5>
              </a>
            @endforeach  
        </div>     
    </div>  

    <div id="keyword" class="container"></div>
</div>

<script>
 $.ajax({
   type: 'get',
   url: '/api/jobs',
   success: data => { 
      getSearch(data);
   }
 });

 function getSearch(data) {
    $('#job_title').on('input', (event) => {  
      //initial ul content
      $('#result').html('');
      let search = $('#job_title').val();
      //filter the job by using regular expersion 
      let jobs = data.data.filter( item => {
         let regExp =  new RegExp(search, 'i');        
         return item.job_title.match(regExp);  
        });
    //get all the filterd jobs data
    jobs.forEach(item => {
       $('#result').append(`<li class="list-group-item result" onclick="autoField('${item.job_title}')" id="${item.id}">${item.job_title}</li>`);  
     });

     //validation
     if( search == '') {
        $('#result').html('');
     } 
    });
 }

 function autoField(title) {
  $('#job_title').val(title); 
  $(`#result`).html('');
 }


</script>
@endsection