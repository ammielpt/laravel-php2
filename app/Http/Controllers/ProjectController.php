<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the proyectos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projects.index', [
            "projects" => Project::orderBy('created_at', 'DESC')->paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new proyecto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create', [
            'project' => new Project()
        ]);
    }

    /**
     * Store a newly created proyecto in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);
        Project::create($fields);
        // Project::create(request()->all()); en caso tenemos el mismo nombre que la tabla y formulario.
        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con exito.');

        /*$fields=request()->validate([
            'title' => 'required',
            'url' => 'required',
            'description' => 'required'
        ]);*/
        //Project::create($fields);
        //Project::create(request()->only('title', 'url', 'description')); 
        //
    }

    /*
     public function store(CreateProjectRequest $request)
    {
        Project::create($request->validated());
        return redirect()->route('projects.index');
    }*/

    /**
     * Display the specified proyecto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Injectamos Project automaticamente se busca el proyecto por su id. ROUTE MODEL BINDING
    public function show(Project $project)
    {
        return view('projects.show', [
            "project" => $project
        ]);
    }

    /**
     * Show the form for editing the specified proyecto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified proyecto in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {
        $project->update([
            'title' => request('title'),
            'url' => request('url'),
            'description' => request('description')
        ]);
        //  return $project;
        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con exito.');
    }

    /**
     * Remove the specified proyecto from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // Project::destroy($id);
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con exito.');
    }   
}
