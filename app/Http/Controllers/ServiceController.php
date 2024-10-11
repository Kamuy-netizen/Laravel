<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services')); // Kembali ke view dengan data services
    }

    public function create()
    {
        return view('services.create'); // Tampilkan form untuk menambah layanan
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        Service::create($validatedData);
        return redirect()->route('services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service')); // Tampilkan form untuk mengedit layanan
    }

    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        $service->update($validatedData);
        return redirect()->route('services.index')->with('success', 'Service updated successfully!');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
