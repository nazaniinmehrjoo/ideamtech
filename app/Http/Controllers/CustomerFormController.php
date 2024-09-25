<?php

namespace App\Http\Controllers;

use App\Models\CustomerForm;
use Illuminate\Http\Request;

class CustomerFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerForms = CustomerForm::all();
        return view('forms.customer_form_index', compact('customerForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.customer_form_create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'factory_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'factory_number' => 'required|string|max:50',
        'mobile_number' => 'required|string|max:50',
        'province' => 'required|string|max:100',
        'city' => 'required|string|max:100',
        'address' => 'required|string',
        'products' => 'required|json',
        'kiln_type' => 'required|string|max:100',
        'drying_method' => 'required|string|max:100',
        'brick_count' => 'required|integer',
        'messaging_platforms' => 'nullable|json',
    ]);

    // Create a new customer form entry
    CustomerForm::create($validatedData);

    // Redirect with a success message
    return redirect()->route('customer_forms.index')->with('success', 'Customer form created successfully!');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerForm $customerForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerForm $customerForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerForm $customerForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerForm $customerForm)
    {
        //
    }
}
