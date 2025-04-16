<?php

namespace App\Http\Controllers;

use App\Models\CustomerForm;
use Illuminate\Http\Request;

class CustomerFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $locale)
    {
        app()->setLocale($locale);
    
        $cities = CustomerForm::select('city')->distinct()->pluck('city');
    
        $customers = CustomerForm::query()
            ->when($request->filled('city'), function ($query) use ($request) {
                $query->where('city', $request->city);
            })
            ->get();
    
        return view('forms.indexForm', compact('customers', 'locale', 'cities'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($locale)
    {
        app()->setLocale($locale);
        return view('forms.createForm', compact('locale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $locale)
    {
        app()->setLocale($locale);

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
            'products' => 'array|nullable',
            'kiln_type' => 'required|string',
            'dryer_type' => 'required|string',
            'dough_count' => 'required|integer',
            'messenger' => 'array|nullable',
            'messenger_details' => 'array|nullable',
        ]);

        $customer = new CustomerForm();
        $customer->fill($validatedData);

        // ذخیره محصولات به صورت JSON
        $customer->products = json_encode($request->products ?? []);

        // ذخیره پیام‌رسان‌ها (فقط مواردی که مقدار دارند)
        $messengerData = [];
        if (!empty($request->messenger)) {
            foreach ($request->messenger as $platform) {
                $id = $request->messenger_details[$platform] ?? null;
                if (!empty($id)) {
                    $messengerData[$platform] = $id;
                }
            }
        }

        $customer->messenger = !empty($messengerData) ? json_encode($messengerData, JSON_UNESCAPED_UNICODE) : null;

        $customer->save();

        return redirect()->route('customer.index', ['locale' => $locale])->with('success', __('Customer added successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($locale, $id)
    {
        app()->setLocale($locale);
        $customer = CustomerForm::findOrFail($id);
        return view('forms.editForm', compact('customer', 'locale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $locale, CustomerForm $customer)
    {
        app()->setLocale($locale);

        $validatedData = $request->validate([
            'factory_code' => 'required|string|max:255',
            'factory_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'factory_phone' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'products' => 'nullable|array',
            'kiln_type' => 'required|string|max:255',
            'dryer_type' => 'required|string|max:255',
            'dough_count' => 'required|integer',
            'messenger' => 'nullable|array',
            'messenger_details' => 'array|nullable',
        ]);

        $customer->fill($validatedData);

        // ✅ Fix products update
        $customer->products = json_encode($request->products ?? []);

        // ✅ Fix messenger update (Only save messengers with values)
        $messengerData = [];
        if (!empty($request->messenger)) {
            foreach ($request->messenger as $platform) {
                $id = $request->messenger_details[$platform] ?? null;
                if (!empty($id)) {
                    $messengerData[$platform] = $id;
                }
            }
        }

        $customer->messenger = !empty($messengerData) ? json_encode($messengerData, JSON_UNESCAPED_UNICODE) : null;

        $customer->save();

        return redirect()->route('customer.index', ['locale' => $locale])->with('success', __('Customer updated successfully.'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($locale, $id)
    {
        app()->setLocale($locale);
        $customer = CustomerForm::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer.index', ['locale' => $locale])->with('success', __('Customer deleted successfully.'));
    }

    /**
     * Export customer data to Excel.
     */
    public function export($locale)
    {
        app()->setLocale($locale);
        $customers = CustomerForm::all();

        $headers = [
            "Content-Type" => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=customer_data.xls"
        ];

        $output = '<table border="1">';
        $output .= '<tr>
                        <th>' . __('کد') . '</th>
                        <th>' . __('نام کارخانه') . '</th>
                        <th>' . __('نام') . '</th>
                        <th>' . __('نام خانوادگی') . '</th>
                        <th>' . __('شماره کارخانه') . '</th>
                        <th>' . __('شماره همراه') . '</th>
                        <th>' . __('استان') . '</th>
                        <th>' . __('شهر') . '</th>
                        <th>' . __('آدرس') . '</th>
                        <th>' . __('محصولات') . '</th>
                        <th>' . __('نوع کوره') . '</th>
                        <th>' . __('نوع خشک کن') . '</th>
                        <th>' . __('تعداد قمیر') . '</th>
                        <th>' . __('پیام رسان‌ها') . '</th>
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
            $output .= '<td>' . $customer->address . '</td>';
            $output .= '<td>' . implode(', ', json_decode($customer->products, true) ?? []) . '</td>';
            $output .= '<td>' . $customer->kiln_type . '</td>';
            $output .= '<td>' . $customer->dryer_type . '</td>';
            $output .= '<td>' . $customer->dough_count . '</td>';

            $messengerData = json_decode($customer->messenger, true) ?? [];
            $messengerOutput = [];
            foreach ($messengerData as $platform => $id) {
                $messengerOutput[] = "$platform: " . ($id ?? '-');
            }
            $output .= '<td>' . implode('<br>', $messengerOutput) . '</td>';
            $output .= '</tr>';
        }

        $output .= '</table>';

        return response($output, 200, $headers);
    }
}
