<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AssetModel;
use App\Http\Controllers\ActivityLogController;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search');

        $query = Product::query();

        if ($search) {
            $query->where('serial_no', 'like', '%' . $search . '%');
        }

        $products = $query->paginate($perPage)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'models' => AssetModel::all(),
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

        $product = Product::create($validated);

        ActivityLogController::logAction(
            'create',
            'Product',
            $product->id,
            '<span class="text-success fw-bold">Created</span> product: <strong>' . $product->product_name . '</strong><br>Serial No: <code>' . $product->serial_no . '</code>'
        );

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    public function show(int $id)
    {
        $product = Product::with(['category', 'brand', 'model'])->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $models = AssetModel::all();

        return view('products.edit', compact('product', 'categories', 'brands', 'models'));
    }

    public function update(Request $request, int $id)
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
        $original = $product->getOriginal();
        $product->update($validated);
        $changes = $product->getChanges();

        $changedFields = collect($changes)->map(function ($value, $field) use ($original) {
            return '<span class="badge bg-warning text-dark me-1">' .
                Str::headline($field) . ': "' . $original[$field] . '" → "' . $value . '"' .
                '</span>';
        })->implode(' ');

        ActivityLogController::logAction(
            'update',
            'Product',
            $product->id,
            '<span class="text-primary fw-bold">Updated</span> product: <strong>' . $product->product_name . '</strong><br>Serial No: <code>' . $product->serial_no . '</code><br>Changes: ' . $changedFields
        );

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        $productName = $product->product_name;
        $serial = $product->serial_no;
        $product->delete();

        ActivityLogController::logAction(
            'delete',
            'Product',
            $id,
            '<span class="text-danger fw-bold">Deleted</span> product: <strong>' . $productName . '</strong><br>Serial No: <code>' . $serial . '</code>'
        );

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function export(Request $request)
    {
        $format = $request->get('format', 'csv');
        $products = Product::with(['category', 'brand', 'model'])->get();

        if ($format === 'csv') {
            // TODO: Generate CSV using Laravel Excel or native response
        } elseif ($format === 'pdf') {
            // TODO: Generate PDF using DomPDF or Snappy
        }

        return back()->with('success', 'Exported successfully!');
    }
}
