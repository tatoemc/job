<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
   
    public function index()
    {
        $jobs =  Job::all();
        return view ('jobs.index',compact('jobs'));
    }

   
    public function store(StoreJobRequest $request)
    {
        try {
            $validated = $request->validated();
            Job::create([
                'name' => $request->name,
                'desc' => $request->desc,
               
                ]);
    
                session()->flash('Add_job');
                return redirect('/jobs');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

    
    public function show(Job $job)
    {
        return view ('jobs.show',compact('job'));
    }

   
    public function edit(Job $job)
    {
        return view ('jobs.edit',compact('job'));
    }

   
    public function update(UpdateJobRequest $request, Job $job)
    {
        try {
            $validated = $request->validated();

            $job->update([
                'name' => $request->name,
                'desc' => $request->desc,
               
            ]);
    
                session()->flash('update_job');
                return redirect('/jobs');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function destroy(Request $request)
    {
        $job_id = $request->id;
        $job = Job::where('id', $job_id)->first();
        $job->delete();

        session()->flash('delete_job');
        return redirect('/jobs');
    }
}
