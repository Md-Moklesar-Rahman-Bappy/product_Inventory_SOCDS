<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Product;
use Spatie\Activitylog\Facades\Activity;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the maintenance records.
     */
    public function index()
    {
        $maintenances = Maintenance::with(['product', 'user'])->latest()->paginate(10);
        return view('maintenance.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new maintenance record.
     */
    public function create(Request $request)
    {
        $productId = $request->product_id;

        if (!$productId) {
            return redirect()->route('products.index')->with('error', 'No product selected for maintenance.');
        }

        $product = Product::findOrFail($productId);

        return view('maintenance.create', compact('product'));
    }

    /**
     * Store a newly created maintenance record in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'description'  => 'required|string|max:255',
            'start_time'   => 'required|date|before_or_equal:now',
            'end_time'     => 'required|date|after_or_equal:start_time',
        ]);

        $validated['user_id'] = Auth::id();

        $maintenance = Maintenance::create([
            'product_id'   => $validated['product_id'],
            'user_id'      => $validated['user_id'],
            'description'  => $validated['description'],
            'performed_at' => $validated['end_time'],
            'start_time'   => $validated['start_time'],
            'end_time'     => $validated['end_time'],
        ]);

        Activity::causedBy(Auth::user())
            ->performedOn($maintenance)
            ->withProperties([
                'description' => $validated['description'],
                'start_time'  => $validated['start_time'],
                'end_time'    => $validated['end_time'],
            ])
            ->log('Maintenance logged');

        return redirect()->route('maintenance.index')->with('success', 'Maintenance record added successfully.');
    }

    /**
     * Display the specified maintenance record.
     */
    public function show($id)
    {
        $maintenance = Maintenance::with(['product', 'user'])->findOrFail($id);
        return view('maintenance.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified maintenance record.
     */
    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $products = Product::all();

        return view('maintenance.edit', compact('maintenance', 'products'));
    }

    /**
     * Update the specified maintenance record in storage.
     */
    public function update(Request $request, $id)
    {
        $maintenance = Maintenance::findOrFail($id);

        $validated = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'description'  => 'required|string|max:255',
            'start_time'   => 'required|date',
            'end_time'     => 'required|date|after_or_equal:start_time',
        ]);

        $validated['user_id'] = Auth::id();

        $maintenance->update([
            'product_id'   => $validated['product_id'],
            'user_id'      => $validated['user_id'],
            'description'  => $validated['description'],
            'performed_at' => $validated['end_time'],
            'start_time'   => $validated['start_time'],
            'end_time'     => $validated['end_time'],
        ]);

        Activity::causedBy(Auth::user())
            ->performedOn($maintenance)
            ->withProperties([
                'description' => $validated['description'],
                'start_time'  => $validated['start_time'],
                'end_time'    => $validated['end_time'],
            ])
            ->log('Maintenance updated');

        return redirect()->route('maintenance.index')->with('success', 'Maintenance record updated.');
    }

    /**
     * Remove the specified maintenance record from storage.
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();

        Activity::causedBy(Auth::user())
            ->performedOn($maintenance)
            ->log('Maintenance deleted');

        return redirect()->route('maintenance.index')->with('success', 'Maintenance record deleted.');
    }

    /**
     * Fetch product details by serial number (used for AJAX lookup).
     */
    public function getProductBySerial($serial)
    {
        try {
            $product = Product::query()
                ->with(['model', 'category', 'brand'])
                ->whereRaw('UPPER(serial_no) = ?', [strtoupper($serial)])
                ->first();

            return response()->json([
                'id' => $product->id,
                'name' => $product->product_name,
                'serial_no' => strtoupper($product->serial_no),
                'project_serial_no' => $product->project_serial_no,
                'model_name' => optional($product->model)->name,
                'category_name' => optional($product->category)->name,
                'brand_name' => optional($product->brand)->name,
                'warranty_status' => $product->warranty_status,
                'warranty_countdown' => $product->warranty_countdown,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
