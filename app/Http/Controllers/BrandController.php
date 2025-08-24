<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

class BrandController extends Controller
{
    /**
     * Display a listing of all brands.
     */
    public function index()
    {
        $brands = Brand::latest()->get(); // More concise than sortByDesc
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form to create a new brand.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created brand.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255|unique:brands,brand_name',
        ]);

        Brand::create($request->only('brand_name'));

        return redirect()->route('brands.index')
            ->with('success', '✅ Brand created successfully.');
    }

    /**
     * Display a specific brand.
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form to edit a brand.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update a brand.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255|unique:brands,brand_name,' . $id,
        ]);

        $brand = Brand::findOrFail($id);
        $brand->update($request->only('brand_name'));

        return redirect()->route('brands.index')
            ->with('success', '✏️ Brand updated successfully.');
    }

    /**
     * Delete a brand.
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->route('brands.index')
            ->with('success', '🗑️ Brand deleted successfully.');
    }

    /**
     * Display products under a specific brand.
     */
    public function products($id)
    {
        $brand = Brand::findOrFail($id);

        $products = Product::where('brand_id', $id)
            ->with(['category', 'model'])
            ->latest()
            ->paginate(20);

        return view('brands.products', compact('brand', 'products'));
    }
}
