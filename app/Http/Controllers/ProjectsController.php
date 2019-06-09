<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $attributes = $this->validatedProjects();
        $attributes['owner_id'] = auth()->id();
        $project = Project::create($attributes);
        
        // \Mail::to($project->owner->email)->send(
        //     new ProjectCreated($project)
        // );
        
        return redirect('/projects'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // all these ways to authorize that this user is authorized to see this project
        // abort_unless()
        // abort_if($project->owner_id !== auth()->id(),403);
        // $this->authorize('update',$project);
        // if(\Gate::denies('update',$project))
        // {
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update',$project),403);
        // abort_unless(\Gate::allows('update',$project),403);
        // auth()->user()->can('update', $project);
        $this->authorize('update',$project);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize('update',$project);
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('update',$project);
        $project->update(
            $this->validatedProjects()
        );
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('update',$project);
        $project->delete();
        return redirect('/projects');

    }

    protected function validatedProjects()
    {
        return request()->validate([
            'title' => ['required','min:3','max:255'],
            'description' => ['required','min:3']
        ]);
    }
}
