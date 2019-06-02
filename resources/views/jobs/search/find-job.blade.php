@extends('layouts.app')

@section('content')

<div id="search-bar" class="bg-secondary" style="padding-top:1%;padding-bottom:1%;">
  {!! Form::open(array('action' => 'JobsController@search','method' => 'POST')) !!}
  <div class="row" style="margin-left:20%">
  {{ Form::text('job_title', '', [
               'placeholder' => 'Keywords or job title',                       
                  'class' => 'form-control form-control-lg', 
                  'autocomplete' => 'off',
                  'style' => 'width:25%;margin-right:10px'
                ] 
              )}}
  {{ Form::select('location_id', $locations, null,
                [
                  'placeholder' => 'Location',                       
                  'class' => 'custom-select custom-select-lg mb-3', 
                  // 'required' => 'required',
                  'style' => 'width:25%; margin-right:10px'
                ]) }}
{{ Form::select('category_id', $categoriesName, null,
                [
                  'placeholder' => 'Category',                       
                  'class' => 'custom-select custom-select-lg mb-3', 
                  // 'required' => 'required',
                  'style' => 'width:25%; margin-right:10px'
                ]) }}
       
              {{ Form::submit('Search', ['class' => 'btn btn-outline-info  text-white', 'style' => 'height:46px'])}}
            </div>
{!! Form::close() !!}
</div>

<div class="" class=""  style="background-color:#F2F2F2">
    <div  class="col-md-10" style="margin-left:30rem  ">
    <div class="row">
        <div id="job-items" class="col-8 col-md-3 col-sm-4 job-items" style="overflow-y:auto;height:calc(85vh - 20px); " >
          <div class="bg-white job-item"><h3 class="text-center text-primary">Job List</h3></div>
        
          @foreach ($jobs as $job)
        <div class="job-item" id="job-item-{{$job->id}}" onclick="showIndividualJob({{$job->id}})">
  
          <h3 class="text-primary font-weight-bold">{{ $job->job_title}}</h3>
            
              <p style="font-size:1rem">{{ $job->company}}</p>
              <p class="text-muted" style="font-size:1rem">{{ $job->location->location}}</p>
              <p class="text-muted" style="font-size:1rem">{{ $job->created_at}}</p>
         
          </div>
     
        
        @endforeach   
        </div>
        <div id="details" class="col-6 col-md-6 col-sm-8 card"  style="padding-bottom: auto;padding-left:10px;">
          <div id="details-bg-bg" class=""></div>
          <div id="details-description" class=""></div>
          <div id="details-contact" class=""></div>
        </div>
      </div>
</div>
 </div>

 
 
<script>
  $('body').css('overflow-x', 'hidden')

  //fix the search bar position
  let lastScrollTop = 0;
  $(window).scroll(function(event){
    console.log(lastScrollTop)
   var st = $(this).scrollTop();
   if (st > lastScrollTop && st >= 110){
       // downscroll code
       $('#search-bar').addClass('fixed-top')
   } else {
      // upscroll code
      $('#search-bar').removeClass('fixed-top')
   }
   lastScrollTop = st;
  });

  

   function showIndividualJob(id){
    $('.job-item').css("background-color","");
    $(`#job-item-${id}`).css("background-color","rgb(239, 248, 255)");
    $.ajax({
    type:'get',
    url:`/api/job/${id}`,
    success:function(data){     
      let location = data.location;
      this.data = data.data;   
      
      $('#details').removeClass('card')
      $('#details-bg-bg')
        .empty()
        .addClass('job-item-content bg-white')
        .append(`
        <div>
        <br>
        <div class="job-item-content-1">
        <h3 class="font-weight-bold text-primary">${this.data.job_title}</h3>
        <h5>${this.data.company}</h5>
        </div>
        <div class="job-item-content-2">
          <span><h4>${location.location}</h4></span>
          <span><h4>${this.data.salary}</h4></span>
          <span><h4>${this.data.created_at}</h4></span>
        </div>
       
      
        </div>
        `);
      $('#details-description')
        .empty()
        .addClass('job-item-content bg-white')
        .append(`
       
          <div class="job-item-content-3">
          <br>
          <h3>Job Description</h3>
          <hr>
          <p>${this.data.description}</p>
          </div>
        `);

      $('#details-contact')
        .empty()
        .addClass('job-item-content bg-white')
        .append(`           
          <div class="job-item-content-4">
          <h3>Contact Method</h3>
          <hr>   
          <h4><strong>Contact Person </strong>${this.data.contact_user}</h4>
          <h4><strong>Contact Email </strong>${this.data.contact_email}</h4>
          </div>
        
        `);

      }
    });
   }
</script>
  

@endsection