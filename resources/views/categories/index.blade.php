@extends('layouts.app')

@section('title', 'Home Category')

@section('contents')
<div class="container py-5">
  {{-- Card Wrapper --}}
  <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

    {{-- Gradient Header --}}
    <div class="card-header text-white d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, #00C9FF, #92FE9D); padding: 1.5rem;">
      <h3 class="mb-0 fw-bold"><i class="fa fa-list-alt me-2"></i> Category List</h3>
      <a href="{{ route('categories.create') }}" class="btn btn-lg fw-bold shadow-sm" style="background: linear-gradient(to right, #FF512F, #DD2476); color: white;">
        <i class="fa fa-plus me-1"></i> Add Category
      </a>
    </div>

    {{-- Card Body --}}
    <div class="card-body bg-light" style="padding: 2rem;">

      {{-- Success Message --}}
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm fw-semibold" role="alert">
          <i class="fa fa-check-circle me-1"></i> {{ Session::get('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      {{-- Category Table --}}
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center shadow-sm" style="min-width: 800px;">
          <thead style="background: linear-gradient(to right, #FFB75E, #ED8F03); color: white;">
            <tr style="height: 60px;">
              <th style="width: 80px;">SL</th>
              <th style="min-width: 200px;">Category</th>
              <th style="min-width: 220px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($categories as $c)
              <tr style="height: 55px;">
                <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                <td class="fw-semibold text-dark">{{ $c->category_name }}</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('categories.show', $c->id) }}" class="btn btn-sm btn-outline-info" title="Detail">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ route('categories.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')" style="display:inline;">
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
                <td colspan="3" class="text-center py-5 text-muted">
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No categories" width="100" class="mb-3 opacity-75">
                    <h5 class="fw-bold text-danger">No categories found</h5>
                    <p class="small">Start by adding a new category to your list.</p>
                    <a href="{{ route('categories.create') }}" class="btn btn-lg fw-bold" style="background: linear-gradient(to right, #FF512F, #DD2476); color: white;">
                      <i class="fa fa-plus me-1"></i> Add Category
                    </a>
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
