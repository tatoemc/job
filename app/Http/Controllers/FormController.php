<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    
    public function index()
    {
        $forms =  Form::all();
        return view ('forms.index',compact('forms'));
    }

   
    public function create()
    {
        $jobs =  Job::all();
        return view ('forms.create',compact('jobs'));
    }

   
    public function store(StoreFormRequest $request)
    {
        try {
            $validated = $request->validated();
            Form::create([
                'job_id' => $request->job_id,
                'user_id' => Auth::user()->id,
                ]);
    
                session()->flash('Add_form');
                return redirect('/forms');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function show(Form $form)
    {
        return view ('forms.show',compact('form'));
    }

   
    public function edit(Form $form)
    {
        $jobs =  Job::all();
        return view ('forms.edit',compact('form','jobs'));
    }

   
    public function update(UpdateFormRequest $request, Form $form)
    {
        try {
            $validated = $request->validated();

            $form->update([
                'job_id' => $request->job_id,
              
            ]);
    
                session()->flash('update_form');
                return redirect('/forms');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }
    }

   
    public function destroy(Request $request)
    {
        $form_id = $request->form_id;
        $form = Form::where('id', $form_id)->first();
        $form->delete();

        session()->flash('delete_form');
        return redirect('/forms');
    }
}
