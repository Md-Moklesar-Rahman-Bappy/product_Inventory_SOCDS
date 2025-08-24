<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\AssetModel;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\MaintenanceController;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search  = $request->input('search');
        $status  = $request->input('warranty_status');

        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('serial_no', 'like', '%' . $search . '%')
                ->orWhere('product_name', 'like', '%' . $search . '%');
            });
        }

        if ($status === 'active') {
            $query->whereDate('warranty_end', '>=', now());
        } elseif ($status === 'expired') {
            $query->whereDate('warranty_end', '<', now());
        }

        $products = $query->paginate($perPage)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create', [
            'categories' => Category::all(),
            'brands'     => Brand::all(),
            'models'     => AssetModel::all(),
        ]);
    }

    public function store(Request $request)
    {
        // 🔁 Normalize serials before validation
        $request->merge([
            'serial_no'         => strtoupper($request->serial_no),
            'project_serial_no' => strtoupper($request->project_serial_no),
        ]);

        // ✅ Validate input
        $validated = $request->validate([
            'product_name'       => 'required|string|max:255',
            'category_id'        => 'required|exists:categories,id',
            'brand_id'           => 'required|exists:brands,id',
            'model_id'           => 'required|exists:asset_models,id',
            'serial_no'          => 'required|string|max:255|unique:products,serial_no',
            'project_serial_no'  => 'required|string|max:255|unique:products,project_serial_no',
            'position'           => 'nullable|string|max:255',
            'user_description'   => 'nullable|string|max:255',
            'remarks'            => 'nullable|string|max:255',
            'warranty_start'     => 'nullable|date',
            'warranty_end'       => 'nullable|date|after_or_equal:warranty_start',
        ]);

        // 🛠️ Create product
        $product = Product::create($validated);

        // 📝 Log activity
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
        $product    = Product::findOrFail($id);
        $categories = Category::all();
        $brands     = Brand::all();
        $models     = AssetModel::all();

        return view('products.edit', compact('product', 'categories', 'brands', 'models'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'product_name'       => 'required|string|max:255',
            'category_id'        => 'required|exists:categories,id',
            'brand_id'           => 'required|exists:brands,id',
            'model_id'           => 'required|exists:asset_models,id',
            'serial_no'          => 'nullable|string|max:255',
            'project_serial_no'  => 'nullable|string|max:255',
            'position'           => 'nullable|string|max:255',
            'user_description'   => 'nullable|string|max:255',
            'remarks'            => 'nullable|string|max:255',
            'warranty_start'     => 'nullable|date',
            'warranty_end'       => 'nullable|date|after_or_equal:warranty_start',
        ]);

        $product  = Product::findOrFail($id);
        $original = $product->getOriginal();

        $product->fill($validated); // Fill before checking changes

        if ($product->isClean()) {
            ActivityLogController::logAction(
                'update',
                'Product',
                $product->id,
                '<span class="text-muted fw-bold">No changes</span> made to product: <strong>' . $product->product_name . '</strong><br>Serial No: <code>' . $product->serial_no . '</code>'
            );

            return redirect()->route('products.index')->with('success', 'No changes were made.');
        }

        $product->save(); // Save changes

        $changes = $product->getChanges();

        $changedFields = collect($changes)->map(function ($value, $field) use ($original) {
            return '<span class="badge bg-warning text-dark me-1">' .
                Str::headline($field) . ': "' . ($original[$field] ?? '-') . '" → "' . $value . '"' .
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
        $product     = Product::findOrFail($id);
        $productName = $product->product_name;
        $serial      = $product->serial_no;
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
        $format   = $request->get('format', 'csv');
        $products = Product::with(['category', 'brand', 'model'])->get();

        if ($format === 'csv') {
            $filename = 'products_export_' . now()->format('Ymd_His') . '.csv';
            $headers  = [
                'Content-Type'        => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"$filename\"",
            ];

            $callback = function () use ($products) {
                $handle = fopen('php://output', 'w');
                fputcsv($handle, [
                    'Product Name', 'Category', 'Brand', 'Model',
                    'Serial No', 'Project Serial No', 'Position',
                    'User Description', 'Remarks', 'Warranty Start', 'Warranty End'
                ]);

                foreach ($products as $p) {
                    fputcsv($handle, [
                        $p->product_name,
                        $p->category?->category_name,
                        $p->brand?->brand_name,
                        $p->model?->model_name,
                        $p->serial_no,
                        $p->project_serial_no,
                        $p->position,
                        $p->user_description,
                        $p->remarks,
                        $p->warranty_start,
                        $p->warranty_end,
                    ]);
                }

                fclose($handle);
            };

            return Response::stream($callback, 200, $headers);
        }

        return back()->with('success', 'Exported successfully!');
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        ActivityLogController::logAction(
            'restore',
            'Product',
            $product->id,
            '<span class="text-success fw-bold">Restored</span> product: <strong>' . $product->product_name . '</strong><br>Serial No: <code>' . $product->serial_no . '</code>'
        );

        return redirect()->route('products.index')->with('success', 'Product restored successfully');
    }

    public function warranties(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $status  = $request->input('warranty_status');

        $query = Product::whereNotNull('warranty_end');

        if ($status === 'active') {
            $query->whereDate('warranty_end', '>=', now());
        } elseif ($status === 'expired') {
            $query->whereDate('warranty_end', '<', now());
        }

        $products = $query->latest()->paginate($perPage)->withQueryString();

        return view('warranties.index', compact('products'));
    }
}
