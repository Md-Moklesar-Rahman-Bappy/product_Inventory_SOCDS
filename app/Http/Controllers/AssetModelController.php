<?php

namespace App\Http\Controllers;

use App\Models\AssetModel;
use Illuminate\Http\Request;

class AssetModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = AssetModel::latest()->get();
        return view('models.index', compact('models'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model_name' => 'required|string|max:255',
            // Add other fields here if needed
        ]);

        AssetModel::create($validated);

        return redirect()->route('models.index')->with('success', 'Model created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = AssetModel::findOrFail($id);
        return view('models.show', compact('model'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = AssetModel::findOrFail($id);
        return view('models.edit', compact('model'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'model_name' => 'required|string|max:255',
            // Add other fields here if needed
        ]);

        $model = AssetModel::findOrFail($id);
        $model->update($validated);

        return redirect()->route('models.index')->with('success', 'Model updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = AssetModel::findOrFail($id);
        $model->delete();

        return redirect()->route('models.index')->with('success', 'Model deleted successfully.');
    }

}
