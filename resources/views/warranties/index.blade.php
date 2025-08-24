@extends('layouts.app')

@section('title', 'Warranty Overview')

@section('contents')
<div class="container py-5">
  <div class="card border-0 shadow-lg rounded-4">
    <div class="card-header bg-primary text-white py-3">
      <h3 class="mb-0 fw-bold">
        <i class="fa fa-shield-alt me-2"></i> Product Warranties
      </h3>
    </div>

    <div class="card-body bg-light px-4 py-5">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center shadow-sm">
          <thead class="bg-light text-uppercase fw-bold text-primary">
            <tr>
              <th scope="col">SL</th>
              <th scope="col">Product Name</th>
              <th scope="col">Serial No</th>
              <th scope="col">Project Serial</th>
              <th scope="col">Warranty Ends</th>
              <th scope="col">Countdown</th>
            </tr>
          </thead>
          <tbody>
            @forelse($products as $index => $p)
              <tr>
                <td>{{ $products->firstItem() + $index }}</td>
                <td>{{ $p->product_name }}</td>
                <td>{{ $p->serial_no }}</td>
                <td>{{ $p->project_serial_no }}</td>
                <td>
                  {{ $p->warranty_end ? \Carbon\Carbon::parse($p->warranty_end)->format('d M Y') : '—' }}
                </td>
                <td>
                  @if($p->warranty_end && $p->warranty_start)
                    @php
                      $now = \Carbon\Carbon::now();
                      $end = \Carbon\Carbon::parse($p->warranty_end);
                      $expired = $end->isPast();

                      if ($expired) {
                          $badgeText = 'Expired';
                          $badgeClass = 'bg-danger text-white';
                          $tooltip = 'Expired on ' . $end->format('d M Y');
                      } else {
                          $totalMinutes = $now->diffInMinutes($end);
                          $totalDays = floor($totalMinutes / (60 * 24));
                          $remainingHours = floor(($totalMinutes % (60 * 24)) / 60);

                          $badgeText = "{$totalDays} days {$remainingHours} hours";
                          $tooltip = 'Ends on ' . $end->format('d M Y');

                          if ($totalDays <= 7) {
                              $badgeClass = 'bg-danger text-white';
                          } elseif ($totalDays <= 30) {
                              $badgeClass = 'bg-warning text-dark';
                          } else {
                              $badgeClass = 'bg-success text-white';
                          }
                      }
                    @endphp

                    <span class="badge {{ $badgeClass }}" title="{{ $tooltip }}">
                      {{ $badgeText }}
                    </span>
                  @else
                    <span class="text-muted">—</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="text-muted py-5 text-center">
                  <i class="fa fa-shield-alt fa-2x mb-3 text-danger"></i>
                  <h5 class="fw-bold">No warranty data found</h5>
                  <p class="small">Make sure products have warranty info assigned.</p>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-4">
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
