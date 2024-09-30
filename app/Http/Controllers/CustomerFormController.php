<?php

namespace App\Http\Controllers;

use App\Models\customerForm;
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
        $customers = CustomerForm::all(); 
        return view('forms.indexForm', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.createForm');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'factory_code' => 'required|string',
            'factory_name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'factory_phone' => 'required|string',
            'mobile_phone' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'products' => 'required|array',
            'kiln_type' => 'required|string',
            'dryer_type' => 'required|string',
            'dough_count' => 'required|integer',
            'messenger' => 'nullable|array',
            'instagram_id' => 'nullable|string',
        ]);
    
        // Assuming you have a CustomerForm model to handle the data
        CustomerForm::create($validatedData);
    
        return redirect()->route('customer.index'); // Redirect to index route
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function show(customerForm $customerForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = CustomerForm::findOrFail($id); 
        return view('forms.editForm', compact('customer')); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'factory_code' => 'required|string|max:255',
            'factory_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'factory_phone' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'products' => 'nullable|string', // Optional
            'kiln_type' => 'required|string|max:255',
            'dryer_type' => 'required|string|max:255',
            'dough_count' => 'required|integer',
            'messenger' => 'nullable|string', // Optional
            'instagram_id' => 'nullable|string|max:255', // Optional
        ]);
    
        // Find the customer by ID
        $customer = CustomerForm::findOrFail($id);
    
        // Update the customer data
        $customer->factory_code = $request->input('factory_code');
        $customer->factory_name = $request->input('factory_name');
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->factory_phone = $request->input('factory_phone');
        $customer->mobile_phone = $request->input('mobile_phone');
        $customer->province = $request->input('province');
        $customer->city = $request->input('city');
        
        // Handle products and messengers as arrays
        $customer->products = explode(',', $request->input('products'));
        $customer->kiln_type = $request->input('kiln_type');
        $customer->dryer_type = $request->input('dryer_type');
        $customer->dough_count = $request->input('dough_count');
        
        // Convert messenger input to array if it's a string
        $customer->messenger = $request->input('messenger') ? explode(',', $request->input('messenger')) : [];
        $customer->instagram_id = $request->input('instagram_id');
    
        // Save the updated customer
        $customer->save();
    
        // Redirect back with a success message
        return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customerForm  $customerForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the customer by ID
        $customer = CustomerForm::findOrFail($id);
        
        // Delete the customer
        $customer->delete();
    
        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully!');
    }

    public function export(Request $request)
    {
        // Fetch all customer data from the database
        $customers = CustomerForm::all();

        // Start output buffering to capture the output
        ob_start();

        // Generate the HTML table for Excel
        $output = '<table border="1">';
        $output .= '<tr>
                        <th>کد</th>
                        <th>نام کارخانه</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>شماره کارخانه</th>
                        <th>شماره همراه</th>
                        <th>استان</th>
                        <th>شهر</th>
                        <th>محصولات</th>
                        <th>نوع کوره</th>
                        <th>نوع خشک کن</th>
                        <th>تعداد قمیر</th>
                        <th>پیام رسان‌ها</th>
                        <th>آیدی اینستاگرام</th>
                    </tr>';

        foreach ($customers as $customer) {
            $output .= '<tr>';
            $output .= '<td>' . $customer->factory_code . '</td>';
            $output .= '<td>' . $customer->factory_name . '</td>';
            $output .= '<td>' . $customer->first_name . '</td>';
            $output .= '<td>' . $customer->last_name . '</td>';
            $output .= '<td>' . $customer->factory_phone . '</td>';
            $output .= '<td>' . $customer->mobile_phone . '</td>';
            $output .= '<td>' . $customer->province . '</td>';
            $output .= '<td>' . $customer->city . '</td>';
            $output .= '<td>' . implode(', ', $customer->products) . '</td>'; 
            $output .= '<td>' . $customer->kiln_type . '</td>';
            $output .= '<td>' . $customer->dryer_type . '</td>';
            $output .= '<td>' . $customer->dough_count . '</td>';
            $output .= '<td>' . implode(', ', $customer->messenger ?? []) . '</td>'; 
            $output .= '<td>' . ($customer->instagram_id ?? '-') . '</td>';
            $output .= '</tr>';
        }

        $output .= '</table>';

        // Set headers to force download as an Excel file
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=customer_data.xls");

        // Output the table
        echo $output;

        // Clean the output buffer and exit
        ob_end_flush();
        exit;
    }
}
