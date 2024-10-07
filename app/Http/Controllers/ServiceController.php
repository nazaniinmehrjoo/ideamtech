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
                'page_name' => 'required'
            ]);
        
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('services_images', 'public');
            } else {
                $imagePath = $service->banner_images; 
            }
        
            
            $service->update([
                'title' => $request->title,
                'category' => $request->category,
                'content' => $request->content,
                'banner_images' => json_encode([$imagePath]),
                'page_name' => $request->page_name,
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
        public function partsRepairs()
        {
            $services = Service::where('show_on_parts_repairs', true)->get();
            return view('services.parts_repairs', compact('services'));
        }

        
        public function engineering()
        {
            $services = Service::where('show_on_engineering', true)->get();
            return view('services.engineering', compact('services'));
        }

        
        public function installation()
        {
            $services = Service::where('show_on_installation', true)->get();
            return view('services.installation', compact('services'));
        }

        
        public function afterSales()
        {
            $services = Service::where('show_on_after_sales', true)->get();
            return view('services.after_sales', compact('services'));
        }
}
