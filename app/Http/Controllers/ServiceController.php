<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
        
        public function index()
        {
            $services = Service::all();
            return view('services.index', compact('services'));
        }
    
        public function create()
        {
            return view('services.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'category' => 'nullable',
                'content' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'page_name' => 'required'
            ]);
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services_images', 'public');
            }
    
            Service::create([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'banner_images' => json_encode([$imagePath]),
                'page_name' => $request->page_name,
                'show_on_consulting' => $request->page_name == 'consulting' ? 1 : 0,
                'show_on_parts_repairs' => $request->page_name == 'parts_repairs' ? 1 : 0,
                'show_on_engineering' => $request->page_name == 'engineering' ? 1 : 0,
                'show_on_installation' => $request->page_name == 'installation' ? 1 : 0,
                'show_on_after_sales' => $request->page_name == 'after_sales' ? 1 : 0,
            ]);
    
            return redirect()->route('dashboard')->with('success', 'Service created successfully.');
        }
    
        public function edit(Service $service)
        {
            return view('services.edit', compact('service'));
        }
    
        public function update(Request $request, Service $service)
        {
            $request->validate([
                'title' => 'required',
                'category' => 'nullable|string',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'page_name' => 'required',
            ]);
            
            // Handle the image upload if a new image is provided
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services_images', 'public');
            } else {
                // If no new image is uploaded, keep the existing one
                $imagePath = json_decode($service->banner_images, true)[0]; // Decode JSON to get the existing image path
            }
        
            // Update the service with the new values
            $service->update([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'banner_images' => json_encode([$imagePath]), // Store the updated image path
                'page_name' => $request->page_name,
                // Set flags based on the selected page_name
                'show_on_consulting' => $request->page_name == 'consulting' ? 1 : 0,
                'show_on_parts_repairs' => $request->page_name == 'parts_repairs' ? 1 : 0,
                'show_on_engineering' => $request->page_name == 'engineering' ? 1 : 0,
                'show_on_installation' => $request->page_name == 'installation' ? 1 : 0,
                'show_on_after_sales' => $request->page_name == 'after_sales' ? 1 : 0,
            ]);
        
            return redirect()->route('dashboard')->with('success', 'Service updated successfully.');
        }
        

        
        public function destroy(Service $service)
        {
            $service->delete();
        
            return response()->json([
                'success' => true,
                'message' => 'Service deleted successfully.'
            ]);
        }
        public function consulting()
        {
            $services = Service::where('show_on_consulting', true)->get();
            return view('services.moshavere', compact('services'));
        }
        
        public function partsRepairs()
        {
            $services = Service::where('show_on_parts_repairs', true)->get(); 
            return view('services.taminghatat', compact('services'));
        }
        
        public function engineering()
        {
            $services = Service::where('show_on_engineering', true)->get();
            return view('services.khadamat-mohandesi', compact('services'));
        }
                
        public function installation()
        {
            $services = Service::where('show_on_installation', true)->get(); 
            return view('services.nasbvarahandazi', compact('services'));
        }
        
        public function afterSales()
        {
            $services = Service::where('show_on_after_sales', true)->get(); // Adjust as needed
            return view('services.khadamat-pasazforosh', compact('services'));
        }
        
}
