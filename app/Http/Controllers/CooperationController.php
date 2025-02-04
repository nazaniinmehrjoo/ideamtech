<?php

namespace App\Http\Controllers;
use App\Models\Cooperation;

use Illuminate\Http\Request;

class CooperationController extends Controller
{
    public function index()
    {
        $cooperations = Cooperation::paginate(10);
        return view('cooperations.index', compact('cooperations'))->with('locale', app()->getLocale());

    }


    public function create()
    {
        return view('cooperations.create');
    }
    public function store(Request $request)
    {
        // Validation rules
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|max:15',
            'company_email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'national_id' => 'required|string|max:50',
            'address' => 'required|string',
            'activity_field' => 'required|string|max:255',
            'representative_first_name' => 'required|string|max:255',
            'representative_last_name' => 'required|string|max:255',
            'representative_phone' => 'required|string|max:15',
        ]);

        // Create new cooperation record
        Cooperation::create($validatedData);

        // Redirect with success message
        return redirect()->route('home', ['locale' => app()->getLocale()])->with('success', __('messages.form_created_successfully'));
    }
    public function edit($id)
    {
        // Fetch cooperation record by ID
        $cooperation = Cooperation::findOrFail($id);

        // Return the edit view
        return view('cooperations.edit', compact('cooperation'));
    }


    public function update(Request $request, $id)
    {
        // Validate request
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_phone' => 'required|string|max:15',
            'company_email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'national_id' => 'required|string|max:50',
            'address' => 'required|string',
            'activity_field' => 'required|string|max:255',
            'representative_first_name' => 'required|string|max:255',
            'representative_last_name' => 'required|string|max:255',
            'representative_phone' => 'required|string|max:15',
        ]);

        // Find the specific cooperation record by ID
        $cooperation = Cooperation::findOrFail($id);

        // Update the cooperation record
        $cooperation->update($validatedData);

        return redirect()->route('cooperations.index', ['locale' => app()->getLocale()])->with('success', __('messages.cooperation_updated'));
    }
    public function destroy($id)
    {
        $cooperation = Cooperation::findOrFail($id);
        $cooperation->delete();
        return redirect()->route('cooperations.index', ['locale' => app()->getLocale()])->with('success', __('messages.cooperation_deleted'));
    }


}
