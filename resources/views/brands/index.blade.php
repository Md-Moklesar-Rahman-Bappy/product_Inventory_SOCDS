@extends('layouts.app')

@section('title', 'Home Brands')

@section('contents')
<div class="container py-5">
  <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    {{-- Header --}}
    <div class="card-header text-white d-flex justify-content-between align-items-center"
         style="background: linear-gradient(90deg, #ff5722, #ff9800); padding: 1.5rem;">
      <h3 class="mb-0 fw-bold">
        <i class="fa fa-tags me-2"></i> Brand List
      </h3>
      <a href="{{ route('brands.create') }}" class="btn btn-primary btn-lg fw-bold shadow-sm">
        <i class="fa fa-plus me-1"></i> Add Brand
      </a>
    </div>

    {{-- Body --}}
    <div class="card-body bg-light px-4 py-5">

      {{-- Success Message --}}
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm fw-semibold" role="alert">
          <i class="fa fa-check-circle me-1"></i> {{ Session::get('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      {{-- Brand Table --}}
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center shadow-sm rounded"
               style="min-width: 800px;">
          <thead class="table-warning text-uppercase fw-bold">
            <tr style="height: 60px;">
              <th style="width: 80px;">SL</th>
              <th style="min-width: 200px;">Brand</th>
              <th style="min-width: 280px;">Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @forelse($brands as $brand)
              <tr class="bg-white" style="height: 55px;">
                <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                <td class="fw-semibold text-dark">{{ $brand->brand_name }}</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    {{-- View Details --}}
                    <a href="{{ route('brands.show', $brand->id) }}"
                       class="btn btn-sm btn-outline-info"
                       title="View Details">
                      <i class="fa fa-eye"></i>
                    </a>

                    {{-- Edit Brand --}}
                    <a href="{{ route('brands.edit', $brand->id) }}"
                       class="btn btn-sm btn-outline-warning"
                       title="Edit Brand">
                      <i class="fa fa-edit"></i>
                    </a>

                    {{-- View Products --}}
                    <a href="{{ route('brands.products', $brand->id) }}"
                       class="btn btn-sm btn-outline-success"
                       title="View Products">
                      <i class="fa fa-box-open"></i>
                    </a>

                    {{-- Delete Brand --}}
                    <form action="{{ route('brands.destroy', $brand->id) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this brand?')">
                      @csrf
                      @method('DELETE')
                      <button type="submit"
                              class="btn btn-sm btn-outline-danger"
                              title="Delete Brand">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="text-center py-5 text-muted">
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <i class="fa fa-tags fa-2x mb-3 text-danger"></i>
                    <h5 class="fw-bold">No brands found</h5>
                    <p class="small">Start by adding a new brand to your inventory.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
