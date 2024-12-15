<?php

namespace App\Http\Controllers;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request, $locale)
    {
        $locale = app()->getLocale();
        $validPages = [
            'consulting' => 'show_on_consulting',
            'parts_repairs' => 'show_on_parts_repairs',
            'engineering' => 'show_on_engineering',
            'installation' => 'show_on_installation',
            'after_sales' => 'show_on_after_sales',
        ];

        $pageName = $request->query('page_name', 'all_services');

        if (isset($validPages[$pageName])) {
            $services = Service::where($validPages[$pageName], true)->get();
            $pageDisplayName = ucfirst(str_replace('_', ' ', $pageName));
        } else {
            $services = Service::all();
            $pageDisplayName = 'All Services';
        }

        $services = $services->map(function ($service) use ($locale) {
            $service->title = json_decode($service->title, true)[$locale] ?? '';
            $service->category = json_decode($service->category, true)[$locale] ?? '';
            $service->content = json_decode($service->content, true)[$locale] ?? '';
            return $service;
        });

        return view('services.index', compact('locale', 'services', 'pageDisplayName'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $locale = app()->getLocale();

        $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.fa' => 'required|string|max:255',
            'category' => 'nullable|array',
            'category.en' => 'nullable|string|max:255',
            'category.fa' => 'nullable|string|max:255',
            'content' => 'required|array',
            'content.en' => 'required|string',
            'content.fa' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'page_name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services_images', 'public');
        }

        Service::create([
            'title' => json_encode($request->title), // Save localized data as JSON
            'category' => json_encode($request->category),
            'content' => json_encode($request->content),
            'banner_images' => json_encode([$imagePath]),
            'page_name' => $request->page_name,
            'show_on_consulting' => $request->page_name == 'consulting' ? 1 : 0,
            'show_on_parts_repairs' => $request->page_name == 'parts_repairs' ? 1 : 0,
            'show_on_engineering' => $request->page_name == 'engineering' ? 1 : 0,
            'show_on_installation' => $request->page_name == 'installation' ? 1 : 0,
            'show_on_after_sales' => $request->page_name == 'after_sales' ? 1 : 0,
        ]);

        return redirect()->route('services.index', ['locale' => app()->getLocale()])->with('success', 'Service created successfully.');
    }

    public function update(Request $request, $locale, Service $service)
    {
        $locale = app()->getLocale();

        $request->validate([
            'title' => 'required|array',
            'title.en' => 'required|string|max:255',
            'title.fa' => 'required|string|max:255',
            'category' => 'nullable|array',
            'category.en' => 'nullable|string|max:255',
            'category.fa' => 'nullable|string|max:255',
            'content' => 'required|array',
            'content.en' => 'required|string',
            'content.fa' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'page_name' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services_images', 'public');
        } else {
            $imagePath = json_decode($service->banner_images, true)[0];
        }

        $service->update([
            'title' => json_encode($request->title),
            'category' => json_encode($request->category),
            'content' => json_encode($request->content),
            'banner_images' => json_encode([$imagePath]),
            'page_name' => $request->page_name,
            'show_on_consulting' => $request->page_name == 'consulting' ? 1 : 0,
            'show_on_parts_repairs' => $request->page_name == 'parts_repairs' ? 1 : 0,
            'show_on_engineering' => $request->page_name == 'engineering' ? 1 : 0,
            'show_on_installation' => $request->page_name == 'installation' ? 1 : 0,
            'show_on_after_sales' => $request->page_name == 'after_sales' ? 1 : 0,
        ]);

        return redirect()->route('services.index', ['locale' => $locale])->with('success', 'Service updated successfully.');
    }

    public function edit($locale, Service $service)
    {
        return view('services.edit', compact('service'));
    }


    public function destroy($locale, Service $service)
    {
        $service->delete();
        return redirect()->route('services.index', ['locale' => app()->getLocale()])->with('success', 'Service deleted successfully.');
    }

    public function consulting()
    {
        $services = Service::where('show_on_consulting', true)->get();
        return view('services.moshavere', compact('services'));
    }

    public function partsRepairs()
    {
        $locale = app()->getLocale(); // Get the current locale
        $services = Service::where('show_on_parts_repairs', true)->get()->map(function ($service) use ($locale) {
            $service->title = json_decode($service->title, true)[$locale] ?? '';
            $service->category = json_decode($service->category, true)[$locale] ?? '';
            $service->content = json_decode($service->content, true)[$locale] ?? '';
            return $service;
        });

        return view('services.taminghatat', compact('services'));
    }
    public function engineering()
    {
        $locale = app()->getLocale();
        $services = Service::where('show_on_engineering', true)->get()->map(function ($service) use ($locale) {
            $service->title = json_decode($service->title, true)[$locale] ?? '';
            $service->content = json_decode($service->content, true)[$locale] ?? '';
            return $service;
        });

        return view('services.khadamat-mohandesi', compact('services'));
    }


    public function installation()
    {
        $locale = app()->getLocale(); // Get the current locale
        $services = Service::where('show_on_installation', true)->get()->map(function ($service) use ($locale) {
            $service->title = json_decode($service->title, true)[$locale] ?? '';
            $service->content = json_decode($service->content, true)[$locale] ?? '';
            return $service;
        });

        return view('services.nasbvarahandazi', compact('services'));
    }

    public function afterSales()
    {
        $locale = app()->getLocale();
        $services = Service::where('show_on_after_sales', true)->get()->map(function ($service) use ($locale) {
            $service->title = json_decode($service->title, true)[$locale] ?? '';
            $service->content = json_decode($service->content, true)[$locale] ?? '';
            return $service;
        });

        return view('services.khadamat-pasazforosh', compact('services'));
    }

}
