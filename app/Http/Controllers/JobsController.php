<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Job;
use App\Location;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();      
        $categoriesName = Category::pluck('name');
        $locations = Location::pluck('location');
        $jobs = Job::all();
   
        $data = array(
            'categoriesName' => $categoriesName,
            'categories' => $categories,
            'jobs' => $jobs,
            'locations' => $locations           
        );
       
        return view('jobs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
       
        $categories = Category::pluck('name');
        $locations = Location::pluck('location');   

        return view('jobs.create')->with('categories', $categories)->with('locations', $locations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $job = new Job;
        $job->company = $request->input('company');
        $job->job_title = $request->input('job_title');
        $job->category_id = ( $request->input('category_id') + 1 );
        $job->description = $request->input('description');
        $job->salary = $request->input('salary');
        $job->location_id = ( $request->input('location_id') + 1 );
        $job->contact_email = $request->input('contact_email');
        $job->contact_user = $request->input('contact_user');
        $job->user_id = auth()->user()->id;
        $job->save();

        
      
    
    
      

        return redirect('/');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $job = Job::find($id);
      

        return view('jobs.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
        $job = Job::find($id);

        if(auth()->user()->id !== $job->user_id) {
          return  redirect('/');
        }

        $categories = Category::pluck('name');
        $locations = Location::pluck('location');
        $data = array (
            'job' => $job,
            'categories' => $categories,
            'locations' => $locations
        );

        return view('jobs.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $job = Job::find($id);
        $job->company = $request->input('company');
        $job->job_title = $request->input('job_title');
        $job->category_id = ( $request->input('category_id') + 1 );
        $job->description = $request->input('description');
        $job->salary = $request->input('salary');
        $job->location_id = ( $request->input('location_id') + 1 );
        $job->contact_email = $request->input('contact_email');
        $job->contact_user = $request->input('contact_user');
        $job->save();

        
      

        return redirect('/');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $job = Job::find($id);

        $job->delete();

        return redirect('/');
    }

    public function search(Request $request) {
       
        $categories = Category::all();
        $categoriesName = Category::pluck('name');
        $jobs = Job::all();
        $locations = Location::pluck('location');


        if($request->input('job_title') != null && 
           $request->input('location_id') != null && 
           $request->input('category_id') != null)
         {
            $jobs = Job::where('job_title', 'LIKE', '%'.$request->input('job_title').'%')
                        ->where('location_id', $request->input('location_id') + 1)
                        ->where('category_id', $request->input('category_id') + 1)
                        ->get();
         } 
        else if($request->input('job_title') != null && 
                $request->input('location_id') == null && 
                $request->input('category_id') == null) 
        {
            $jobs = Job::where('job_title', 'LIKE', '%'.$request->input('job_title').'%')->get();
        }
        else if($request->input('job_title') == null && 
                $request->input('location_id') != null && 
                $request->input('category_id') == null) 
        {
            $jobs = Job::where('location_id', $request->input('location_id') + 1)->get();
        }
        else if($request->input('job_title') == null && 
                $request->input('location_id') == null && 
                $request->input('category_id') != null) 
        {
            $jobs = Job::where('category_id', $request->input('category_id') + 1)->get();
        }        
        else if($request->input('job_title') != null && 
                $request->input('location_id') != null && 
                $request->input('category_id') == null) 
        {
            $jobs = Job::where('job_title', 'LIKE', '%'.$request->input('job_title').'%')
                        ->where('location_id', $request->input('location_id') + 1)
                        ->get();
        }
        else if($request->input('job_title') != null && 
                $request->input('location_id') == null && 
                $request->input('category_id') != null) 
        {
            $jobs = Job::where('job_title', 'LIKE', '%'.$request->input('job_title').'%')
                        ->where('category_id', $request->input('category_id'))
                        ->get();
        }        
        else if($request->input('job_title') == null && 
                $request->input('location_id') != null && 
                $request->input('category_id') != null) 
        {
            $jobs = Job::where('location_id', $request->input('location_id') + 1)
                        ->where('category_id', $request->input('category_id') + 1)
                        ->get();
        } else {
            $jobs = Job::all();
        } 
    
        $data = array(
            'jobs' => $jobs,   
            'categoriesName' => $categoriesName,
            'locations' => $locations,
            'locationsName' => $locations          
        );

        return view('/jobs/search/find-job')->with($data);
    }

    public function searchByCategory($name, $id) {
        // $category_id = $request->input('category_label');

        $categories = Category::all();
        $categoriesName = Category::pluck('name');
        $locations = Location::pluck('location');
        $jobs = Job::where('category_id', $id)->get();
        $data = array(
            'jobs' => $jobs,   
            'categoriesName' => $categoriesName,
            'locations' => $locations,
            'locationsName' => $locations          
        );
            
        return view('/jobs/search/find-job')->with($data);
    }

  

}
