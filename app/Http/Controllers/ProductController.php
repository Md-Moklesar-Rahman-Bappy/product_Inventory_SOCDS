<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AssetModel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('serial_no', 'like', '%' . $request->search . '%');
        }

        $products = $query->with(['category', 'brand', 'model'])->paginate(10)->withQueryString();

        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'models' => AssetModel::all(), // or Model::all() if your model is named that
        ]);
    }



    public function store(Request $request)
    {
        $request->merge([
            'serial_no' => strtoupper($request->serial_no),
            'project_serial_no' => strtoupper($request->project_serial_no),
        ]);

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:asset_models,id',
            'serial_no' => 'required|string|max:255|unique:products,serial_no',
            'project_serial_no' => 'required|string|max:255|unique:products,project_serial_no',
            'position' => 'nullable|string|max:255',
            'user_description' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ], [
            'serial_no.unique' => 'This serial number already exists in the system.',
            'project_serial_no.unique' => 'This project serial number already exists in the system.',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }




    public function show(string $id)
    {
        $product = Product::with(['category', 'brand', 'model'])->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $models = AssetModel::all();

        return view('products.edit', compact('product', 'categories', 'brands', 'models'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'model_id' => 'required|exists:asset_models,id',
            'serial_no' => 'nullable|string|max:255',
            'project_serial_no' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'user_description' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
