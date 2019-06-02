<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Job as JobResource;
use App\Http\Requests;
use App\Job;
use App\Location;

class JobsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs =  Job::paginate(15);

        return JobResource::collection($jobs);
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
        $job = $request->isMethod('put') ? Job::findOrFail($request->id) : new Job;
        
        $job->company = $request->input('company');
        $job->job_title = $request->input('job_title');
        $job->category_id = $request->input('category_id');
        $job->description = $request->input('description');
        $job->salary = $request->input('salary');
        $job->location_id = $request->input('location_id');
        $job->contact_email = $request->input('contact_email');
        $job->contact_user = $request->input('contact_user');

        if($job->save()) {
            return new JobResource($job);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $job = Job::findOrFail($id);
        return new JobResource($job);
        
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
        $job = Job::findOrFail($id);

        if($job->delete()) {
            return new JobResource($job);
        }
    
    }
}
