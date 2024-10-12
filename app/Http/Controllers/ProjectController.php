<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Fetch all projects from the database
        $projects = Project::all();
    
        // Return the index view and pass the projects data
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        // Return the view to display the create project form
        return view('projects.create');
    }
    public function store(Request $request)
    {
        // Validate the input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|string',
            'type' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        // Create a new project in the database
        Project::create($validated);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Project created successfully!');
    }
    public function update(Request $request, $id)
    {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Validate the input fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|string',
            'type' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        // Update the project with validated data
        $project->update($validated);

        // Redirect back with success message
        return redirect()->route('dashboard')->with('success', ' با موفقیت ایجاد شد.');
    }
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }
        public function destroy($id)
    {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Delete the project from the database
        $project->delete();

        // Redirect back with success message
        return redirect()->route('dashboard')->with('success', ' با موفقیت ایجاد شد.');
    }
    public function customerView()
    {
        
        $completedProjects = Project::where('status', 'تکمیل شده')->count();
        $ongoingProjects = Project::where('status', 'در حال انجام')->count();
        $totalProjects = Project::count();

        
        $projects = Project::all();

        // Pass the data to the view
        return view('projects.projects', compact('completedProjects', 'ongoingProjects', 'totalProjects', 'projects'));
    }

}
