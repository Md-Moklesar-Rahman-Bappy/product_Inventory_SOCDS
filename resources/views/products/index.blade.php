@extends('layouts.app')

@section('title', 'Home Product')

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

            {{-- Header Start --}}
            <div class="card-header text-white" style="background: linear-gradient(90deg, #00bcd4, #2196f3); padding: 1.5rem;">
                <div class="row align-items-center g-3">
                    <div class="col-md-4 text-left">
                        <h3 class="mb-0 fw-bold">
                            <i class="fa fa-boxes me-2"></i> Product Inventory
                            <span class="badge bg-light text-dark ms-2">{{ $products->total() }} items</span>
                        </h3>
                    </div>

                    <div class="col-md-4 d-flex justify-content-center">
                        <form method="GET" action="{{ route('products.index') }}" role="search" style="width: 100%; max-width: 400px;">
                            <div class="input-group">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    class="form-control bg-light border-0 small" placeholder="Search by Serial Number" aria-label="Search by Serial Number">
                                <button class="btn btn-primary" type="submit" aria-label="Search">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-4 text-end">
                        <a href="{{ route('products.create') }}" class="btn btn-warning btn-lg fw-bold shadow-sm" aria-label="Add Product">
                            <i class="fa fa-plus me-1"></i> Add Product
                        </a>
                    </div>
                </div>
            </div>
            {{-- Header End --}}

            {{-- Body Start --}}
            <div class="card-body bg-light p-4">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm fw-semibold" role="alert">
                        <i class="fa fa-check-circle me-1"></i> {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center shadow-sm" style="min-width: 1400px; font-size: 1rem;">
                        <thead class="text-uppercase fw-bold text-primary" style="background-color: #e3f2fd;">
                            <tr style="height: 60px;">
                                <th>SL</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Serial No</th>
                                <th>Project Serial</th>
                                <th>Position</th>
                                <th>User Description</th>
                                <th>Remarks</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $p)
                            <tr style="height: 55px; background-color: {{ $loop->even ? '#f9f9f9' : '#ffffff' }};">
                                <td class="fw-bold text-info">{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                                <td class="fw-semibold text-dark">{{ Str::limit($p->product_name, 8, '...') }}</td>
                                <td><span class="badge bg-primary text-light">{{ Str::limit(ucfirst($p->category?->category_name ?? 'N/A'), 8, '...') }}</span></td>
                                <td><span class="badge bg-success text-light">{{ Str::limit(ucfirst($p->brand?->brand_name ?? 'N/A'), 8, '...') }}</span></td>
                                <td><span class="badge bg-danger text-light">{{ Str::limit(ucfirst($p->model?->model_name ?? 'N/A'), 8, '...') }}</span></td>
                                <td>
                                    @if(request('search'))
                                        {!! str_replace(request('search'), '<mark>' . e(request('search')) . '</mark>', e($p->serial_no)) !!}
                                    @else
                                        {{ $p->serial_no ?? '-' }}
                                    @endif
                                </td>
                                <td>{{ Str::limit($p->project_serial_no ?? '-', 10, '...') }}</td>
                                <td>{{ Str::limit($p->position ?? '-', 8, '...') }}</td>
                                <td>{{ Str::limit($p->user_description ?? '-', 8, '...') }}</td>
                                <td>{{ Str::limit($p->remarks ?? '-', 8, '...') }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('products.show', $p->id) }}" class="btn btn-sm btn-outline-info" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11" class="text-center py-5 text-muted">
                                    <div class="d-flex flex-column align-items-center justify-content-center">
                                        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No products" width="100" class="mb-3 opacity-75">
                                        <h5 class="fw-bold text-danger">No products found</h5>
                                        <p class="small">Start by adding a new product to your inventory.</p>
                                        <a href="{{ route('products.create') }}" class="btn btn-outline-primary btn-lg fw-bold">
                                            <i class="fa fa-plus me-1"></i> Add Product
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <x-pagination-block :paginator="$products" />
            </div>
            {{-- Body End --}}
        </div>
    </div>
</div>
@endsection
