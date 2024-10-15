<?php

namespace App\Http\Controllers;

use App\Models\EmploymentForm;
use Illuminate\Http\Request;

class EmploymentFormController extends Controller
{
    public function index()
    {
        $forms = EmploymentForm::all();
        return view('employment_form.index', compact('forms'));
    }

    // Show the form for creating a new form
    public function create()
    {
        return view('employment_form.create');
    }

    // Store a newly created form in storage
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        
        // Handle file uploads (same as before)
        $validated = $this->handleFileUploads($request, $validated);

        EmploymentForm::create($validated);

        return redirect()->route('employment-forms.index')->with('success', 'Form submitted successfully!');
    }

    // // Display the specified form
    // public function show(EmploymentForm $employmentForm)
    // {
    //     return view('employment_form.show', compact('employmentForm'));
    // }

    // Show the form for editing the specified form
    public function edit(EmploymentForm $employmentForm)
    {
        return view('employment_form.edit', compact('employmentForm'));
    }

    // Update the specified form in storage
    public function update(Request $request, EmploymentForm $employmentForm)
    {
        $validated = $this->validateRequest($request);

        // Handle file uploads (same as before)
        $validated = $this->handleFileUploads($request, $validated);

        $employmentForm->update($validated);

        return redirect()->route('employment-forms.index')->with('success', 'Form updated successfully!');
    }

    // Remove the specified form from storage
    public function destroy(EmploymentForm $employmentForm)
    {
        $employmentForm->delete();
        return redirect()->route('employment-forms.index')->with('success', 'Form deleted successfully!');
    }

    // Validate the request
    private function validateRequest(Request $request)
    {
        return $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required',
            'marital_status' => 'required',
            'military_status' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'location' => 'required|string|max:255',
            'experience_years' => 'required|integer',
            'education_history' => 'required|string',
            'training_courses' => 'nullable|string',
            'training_certificate' => 'nullable|file|image|max:2048',
            'work_experience' => 'nullable|string',
            'work_experience_photo' => 'nullable|file|image|max:2048',
            'foreign_language' => 'required|string',
            'language_proficiency' => 'required|integer|min:1|max:5',
            'software_skills' => 'nullable|string',
            'about_me' => 'nullable|string',
        ]);
    }

    // Handle file uploads
    private function handleFileUploads(Request $request, $validated)
    {
        if ($request->hasFile('training_certificate')) {
            $validated['training_certificate'] = $request->file('training_certificate')->store('certificates');
        }

        if ($request->hasFile('work_experience_photo')) {
            $validated['work_experience_photo'] = $request->file('work_experience_photo')->store('work_photos');
        }

        return $validated;
    }
}
