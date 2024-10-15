<?php

namespace App\Http\Controllers;
use App\Models\Cooperation;

use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function index()
    {
        $cooperations = Cooperation::all();
        return view('cooperations.index', compact('cooperations'));
    }

    public function create()
    {
        return view('cooperations.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|max:15',
            'company_email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'national_id' => 'required|string|max:50',
            'address' => 'required|string',
            'activity_field' => 'required|string|max:255',
        ]);
        Cooperation::create($validatedData);

        return redirect('/')->with('success', 'Cooperation created successfully.');
    }
    public function edit($id)
    {
        // Fetch the specific cooperation record by its ID
        $cooperation = Cooperation::findOrFail($id);

        // Return the edit view with the cooperation data
        return view('cooperations.edit', compact('cooperation'));
    }

public function update(Request $request, $id)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'company_name' => 'required|string|max:255',
        'company_phone' => 'required|string|max:15',
        'company_email' => 'required|email|max:255',
        'country' => 'required|string|max:255',
        'national_id' => 'required|string|max:50',
        'address' => 'required|string',
        'activity_field' => 'required|string|max:255',
    ]);

    // Fetch the specific cooperation record by its ID
    $cooperation = Cooperation::findOrFail($id);

    // Update the cooperation record
    $cooperation->update($validatedData);

    // Redirect to the cooperation list with a success message
    return redirect()->route('cooperations.index')->with('success', 'Cooperation updated successfully.');
}

}
