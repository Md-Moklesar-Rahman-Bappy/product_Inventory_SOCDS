@extends('layouts.app')

@section('title', 'Show Product')

@section('contents')
  <div class="container py-4">
    <div class="card shadow-sm">
      <div class="card-header bg-info text-white">
        <h4 class="mb-0"><i class="fa fa-box-open me-2"></i> Product Details</h4>
      </div>

      <div class="card-body">
        {{-- Product & Category --}}
        <h5 class="text-secondary mb-3">📦 Product Info</h5>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" value="{{ $product->product_name }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" value="{{ $product->category?->category_name ?? 'N/A' }}" readonly>
          </div>
        </div>

        {{-- Brand & Model --}}
        <h5 class="text-secondary mb-3">🏷️ Brand & Model</h5>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Brand</label>
            <input type="text" class="form-control" value="{{ $product->brand?->brand_name ?? 'N/A' }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Model</label>
            <input type="text" class="form-control" value="{{ $product->model?->model_name ?? 'N/A' }}" readonly>
          </div>
        </div>

        {{-- Serial Numbers --}}
        <h5 class="text-secondary mb-3">🔢 Serial Numbers</h5>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Serial No</label>
            <input type="text" class="form-control" value="{{ $product->serial_no ?? '-' }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Project Serial No</label>
            <input type="text" class="form-control" value="{{ $product->project_serial_no ?? '-' }}" readonly>
          </div>
        </div>

        {{-- Position & Description --}}
        <h5 class="text-secondary mb-3">📍 Location & Description</h5>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Position</label>
            <input type="text" class="form-control" value="{{ $product->position ?? '-' }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">User Description</label>
            <input type="text" class="form-control" value="{{ $product->user_description ?? '-' }}" readonly>
          </div>
        </div>

        {{-- Remarks --}}
        <h5 class="text-secondary mb-3">📝 Remarks</h5>
        <div class="mb-3">
          <label class="form-label">Remarks</label>
          <input type="text" class="form-control" value="{{ $product->remarks ?? '-' }}" readonly>
        </div>

        {{-- Timestamps --}}
        <h5 class="text-secondary mb-3">📅 Timestamps</h5>
        <div class="row">
          <div class="col-md-6">
            <label class="form-label">Created At</label>
            <input type="text" class="form-control" value="{{ $product->created_at->format('Y-m-d H:i') }}" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">Updated At</label>
            <input type="text" class="form-control" value="{{ $product->updated_at->format('Y-m-d H:i') }}" readonly>
          </div>
        </div>

        {{-- Back Button --}}
        <div class="mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left me-1"></i> Go Back
        </a>
        </div>

      </div>
    </div>
  </div>
@endsection
