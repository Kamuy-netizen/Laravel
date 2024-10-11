<?php

namespace App\Http\Controllers;

use App\Models\Mbps;
use Illuminate\Http\Request;

class MbpsController extends Controller
{
    public function index()
    {
        // Show all Mbps packages
        $mbps = Mbps::all();
        return view('mbps.index', compact('mbps'));
    }

    public function create()
    {
        // Show form to create a new Mbps package
        return view('mbps.create');
    }

    public function store(Request $request)
    {
        // Validate and save a new Mbps package
        $request->validate([
            'name' => 'required|string|max:255',
            
            'description' => 'required|string',
        ]);

        $mbps = new Mbps();
        $mbps->name = $request->name;

        // Handle image upload
       

        $mbps->deskripsi = $request->description;
        $mbps->save();

        return redirect()->route('mbps.index')->with('success', 'Mbps package created successfully.');
    }

    public function show($id)
    {
        // Show a single Mbps package
        $mbps = Mbps::findOrFail($id);
        return view('mbps.show', compact('mbps'));
    }

    public function edit($id)
    {
        // Show form to edit an existing Mbps package
        $mbps = Mbps::findOrFail($id);
        return view('mbps.edit', compact('mbps'));
    }

    public function update(Request $request, $id)
    {
        // Validate and update an existing Mbps package
        $request->validate([
            'name' => 'required|string|max:255',
        
            'description' => 'required|string',
        ]);

        $mbps = Mbps::findOrFail($id);
        $mbps->name = $request->name;

        // Handle image upload
    
        $mbps->deskripsi = $request->description;
        $mbps->save();

        return redirect()->route('mbps.index')->with('success', 'Mbps package updated successfully.');
    }

    public function destroy($id)
    {
        // Delete an existing Mbps package
        $mbps = Mbps::findOrFail($id);
        $mbps->delete();

        return redirect()->route('mbps.index')->with('success', 'Mbps package deleted successfully.');
    }
}
