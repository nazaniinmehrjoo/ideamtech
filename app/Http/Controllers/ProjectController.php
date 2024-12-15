<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);
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
        return redirect()->route('projects.index', ['locale' => app()->getLocale()])
            ->with('success', 'پروژه با موفقیت ایجاد شد!');
    }
    public function update(Request $request, $locale, $id)
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
        // Redirect to the localized projects index with a success message
        return redirect()->route('projects.index', ['locale' => $locale])
            ->with('success', 'پروژه با موفقیت به‌روزرسانی شد.');
    }
    public function edit($locale, $id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project', 'locale'));
    }
    public function destroy($locale, $id)
    {
        try {
            // Find the project by ID or fail with 404
            $project = Project::findOrFail($id);

            // Delete the project from the database
            $project->delete();

            // Redirect to the localized projects index with a success message
            return redirect()->route('projects.index', ['locale' => $locale])
                ->with('success', 'پروژه با موفقیت حذف شد!');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error deleting project:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect back with an error message
            return redirect()->route('projects.index', ['locale' => $locale])
                ->withErrors(['error' => 'خطا در حذف پروژه. لطفاً مجدداً تلاش کنید.']);
        }
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
