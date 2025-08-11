@extends('layouts.app')

@section('title', 'Create Product')

@section('contents')
<div class="container py-5">
  <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    {{-- 🌈 Header --}}
    <div class="card-header bg-primary text-white py-3">
      <h3 class="mb-0 fw-bold"><i class="fa fa-plus-circle me-2"></i> Add New Product</h3>
    </div>

    {{-- 🧾 Form Body --}}
    <div class="card-body bg-white px-4 py-5">

      {{-- 🔔 Validation Errors --}}
      @if($errors->any())
        <div class="alert alert-danger shadow-sm mb-4">
          <strong><i class="fa fa-exclamation-triangle me-1"></i> Please fix the following:</strong>
          <ul class="mt-2 mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 📦 Product Info --}}
        <h5 class="text-primary fw-bold mb-3"><i class="fa fa-box me-2"></i> Product Info</h5>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" id="product_name" name="product_name"
                   class="form-control shadow-sm @error('product_name') is-invalid @enderror"
                   value="{{ old('product_name') }}" placeholder="Enter product name" required>
            @error('product_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id"
                    class="form-control shadow-sm @error('category_id') is-invalid @enderror" required>
              <option value="">Select Category</option>
              @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                  {{ $c->category_name }}
                </option>
              @endforeach
            </select>
            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        {{-- 🏷️ Brand & Model --}}
        <h5 class="text-primary fw-bold mb-3"><i class="fa fa-tags me-2"></i> Brand & Model</h5>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="brand_id" class="form-label">Brand</label>
            <select name="brand_id" id="brand_id"
                    class="form-control shadow-sm @error('brand_id') is-invalid @enderror" required>
              <option value="">Select Brand</option>
              @foreach($brands as $b)
                <option value="{{ $b->id }}" {{ old('brand_id') == $b->id ? 'selected' : '' }}>
                  {{ $b->brand_name }}
                </option>
              @endforeach
            </select>
            @error('brand_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="model_id" class="form-label">Model</label>
            <select name="model_id" id="model_id"
                    class="form-control shadow-sm @error('model_id') is-invalid @enderror" required>
              <option value="">Select Model</option>
              @foreach($models as $m)
                <option value="{{ $m->id }}" {{ old('model_id') == $m->id ? 'selected' : '' }}>
                  {{ $m->model_name }}
                </option>
              @endforeach
            </select>
            @error('model_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        {{-- 🔢 Serial Numbers --}}
        <h5 class="text-primary fw-bold mb-3"><i class="fa fa-barcode me-2"></i> Serial Numbers</h5>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="serial_no" class="form-label">Serial No</label>
            <input type="text" id="serial_no" name="serial_no"
                   class="form-control shadow-sm @error('serial_no') is-invalid @enderror"
                   value="{{ old('serial_no') }}" placeholder="Enter serial number" required>
            @error('serial_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="project_serial_no" class="form-label">Project Serial No</label>
            <input type="text" id="project_serial_no" name="project_serial_no"
                   class="form-control shadow-sm @error('project_serial_no') is-invalid @enderror"
                   value="{{ old('project_serial_no') }}" placeholder="Enter project serial number" required>
            @error('project_serial_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        {{-- 📍 Position & Description --}}
        <h5 class="text-primary fw-bold mb-3"><i class="fa fa-map-marker-alt me-2"></i> Position & Description</h5>
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" id="position" name="position"
                   class="form-control shadow-sm @error('position') is-invalid @enderror"
                   value="{{ old('position') }}" placeholder="Optional: Enter position">
            @error('position') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="user_description" class="form-label">User Description</label>
            <textarea id="user_description" name="user_description"
                      class="form-control shadow-sm @error('user_description') is-invalid @enderror"
                      rows="3" placeholder="Describe user">{{ old('user_description') }}</textarea>
            @error('user_description') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        {{-- 📝 Remarks --}}
        <h5 class="text-primary fw-bold mb-3"><i class="fa fa-comment-alt me-2"></i> Remarks</h5>
        <div class="mb-4">
          <label for="remarks" class="form-label">Remarks</label>
          <input type="text" id="remarks" name="remarks"
                 class="form-control shadow-sm @error('remarks') is-invalid @enderror"
                 value="{{ old('remarks') }}" placeholder="Any remarks?">
          @error('remarks') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- 🚀 Submit Buttons --}}
        <div class="d-flex justify-content-between mt-4">
          <button type="submit" class="btn btn-primary px-4 fw-bold">
            <i class="fa fa-check-circle me-1"></i> Create
          </button>
          <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">
            <i class="fa fa-times-circle me-1"></i> Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
