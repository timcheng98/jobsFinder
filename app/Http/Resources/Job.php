<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'job_title' => $this->job_title,         
        //     'job_description' => $this->description,
        //     // 'location' => $this->location
        // ];
    }

    public function with($request) {
        return [
            'location' => $this->location
        ];
       
    }
}
