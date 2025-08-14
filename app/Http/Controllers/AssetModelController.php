<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetModel;
use App\Models\Product;

class AssetModelController extends Controller
{
    /**
     * Display a listing of all models.
     */
    public function index()
    {
        $models = AssetModel::latest()->get();
        return view('models.index', compact('models'));
    }

    /**
     * Show the form to create a new model.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created model.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'model_name' => 'required|string|max:255|unique:asset_models,model_name',
        ]);

        AssetModel::create($validated);

        return redirect()->route('models.index')
            ->with('success', '✅ Model created successfully.');
    }

    /**
     * Display a specific model.
     */
    public function show($id)
    {
        $model = AssetModel::findOrFail($id);
        return view('models.show', compact('model'));
    }

    /**
     * Show the form to edit a model.
     */
    public function edit($id)
    {
        $model = AssetModel::findOrFail($id);
        return view('models.edit', compact('model'));
    }

    /**
     * Update a model.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'model_name' => 'required|string|max:255|unique:asset_models,model_name,' . $id,
        ]);

        $model = AssetModel::findOrFail($id);
        $model->update($validated);

        return redirect()->route('models.index')
            ->with('success', '✏️ Model updated successfully.');
    }

    /**
     * Delete a model.
     */
    public function destroy($id)
    {
        $model = AssetModel::findOrFail($id);
        $model->delete();

        return redirect()->route('models.index')
            ->with('success', '🗑️ Model deleted successfully.');
    }

    /**
     * Display products under a specific model.
     */
    public function products($id)
    {
        $model = AssetModel::findOrFail($id);

        $products = Product::where('model_id', $id)
            ->with(['brand', 'category'])
            ->latest()
            ->paginate(20);

        return view('models.products', compact('model', 'products'));
    }
}
