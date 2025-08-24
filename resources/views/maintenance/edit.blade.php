@extends('layouts.app')

@section('title', 'Edit Maintenance Record')

@section('contents')
<div class="container py-5">
  <div class="card border-0 shadow-lg rounded-4">
    <div class="card-header bg-warning text-dark py-3">
      <h3 class="mb-0 fw-bold">
        <i class="fa fa-edit me-2"></i> Edit Maintenance #{{ $maintenance->id }}
      </h3>
    </div>

    <div class="card-body bg-light px-4 py-5">
      @if($errors->any())
        <div class="alert alert-danger shadow-sm fw-semibold">
          <i class="fa fa-exclamation-circle me-1"></i> Please fix the errors below
        </div>
      @endif

      <form action="{{ route('maintenance.update', $maintenance->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Product Selection --}}
        <div class="mb-4">
          <label for="product_id" class="form-label fw-bold">Product</label>
          <select name="product_id" id="product_id" class="form-select" required>
            @foreach($products as $p)
              <option value="{{ $p->id }}" {{ $p->id == $maintenance->product_id ? 'selected' : '' }}>
                {{ $p->product_name }} ({{ $p->serial_no }})
              </option>
            @endforeach
          </select>
        </div>

        {{-- Issue Description --}}
        <div class="mb-4">
          <label for="description" class="form-label fw-bold">Issue Description</label>
          <textarea name="description" id="description" rows="3" class="form-control" required>{{ old('description', $maintenance->description) }}</textarea>
        </div>

        {{-- Start and End Time --}}
        <div class="row mb-4">
          <div class="col-md-6">
            <label for="start_time" class="form-label fw-bold">Start Time</label>
            <input type="datetime-local" name="start_time" id="start_time" class="form-control"
              value="{{ old('start_time', optional($maintenance->start_time)->format('Y-m-d\TH:i')) }}" required>
          </div>
          <div class="col-md-6">
            <label for="end_time" class="form-label fw-bold">End Time</label>
            <input type="datetime-local" name="end_time" id="end_time" class="form-control"
              value="{{ old('end_time', optional($maintenance->end_time)->format('Y-m-d\TH:i')) }}" required>
          </div>
        </div>

        {{-- Action Buttons --}}
        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-warning">
            <i class="fa fa-save me-1"></i> Update Record
          </button>
          <a href="{{ route('maintenance.index') }}" class="btn btn-secondary">
            <i class="fa fa-arrow-left me-1"></i> Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
