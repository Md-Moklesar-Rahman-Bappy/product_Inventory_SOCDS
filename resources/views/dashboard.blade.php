@extends('layouts.app')

@section('title', 'Dashboard - Department of Land Record and Survey - SOCDS Project')

@section('contents')
<div class="row">
  <div class="col-md-12">

    <!-- Welcome Card -->
<div class="card shadow-sm border-0 mb-4 animate__animated animate__fadeIn">
  <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
    <h5 class="mb-0 text-primary fw-bold">
      👋 Welcome to Your Dashboard
    </h5>
    <span class="badge bg-info-subtle text-info fw-semibold px-3 py-1 rounded-pill">
      SOCDS Project
    </span>
  </div>
  <div class="card-body">
    <p class="mb-2 fs-6">
      This is your central hub for managing <strong>categories</strong>, <strong>brands</strong>, <strong>models</strong>, and <strong>products</strong> with clarity and control.
    </p>
    <p class="text-muted small mb-3">
      Use the sidebar to navigate between modules. All changes are reflected <span class="text-success fw-semibold">in real-time</span> for seamless updates.
    </p>
    <div class="d-flex gap-2">
      <span class="badge bg-success-subtle text-success fw-medium">Modular</span>
      <span class="badge bg-warning-subtle text-warning fw-medium">Maintainable</span>
      <span class="badge bg-secondary-subtle text-secondary fw-medium">Joyful UI</span>
    </div>
  </div>
</div>

    <!-- Activity Logs Card -->
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-info fw-bold">Recent Activity Logs</h5>
        <span class="badge bg-light text-dark">{{ $logs->total() }} total logs</span>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-hover align-middle mb-0">
            <thead class="table-light text-uppercase text-primary small">
              <tr>
                <th>User</th>
                <th>Action</th>
                <th>Model</th>
                <th>Description</th>
                <th>Time</th>
              </tr>
            </thead>
            <tbody>
              @forelse($logs as $log)
              <tr>
                <td class="fw-semibold text-dark">{{ $log->user->name ?? 'System' }}</td>
                <td>
                  <span class="badge
                    @if($log->action === 'create') bg-success text-light
                    @elseif($log->action === 'update') bg-primary text-light
                    @elseif($log->action === 'delete') bg-danger text-light
                    @else bg-secondary @endif">
                    {{ ucfirst($log->action) }}
                  </span>
                </td>
                <td><span class="text-muted">{{ $log->model ?? '-' }}</span></td>
                <td>{!! $log->description !!}</td>
                <td>
                  <div class="text-nowrap">
                    <strong>{{ $log->updated_at->format('d M Y, h:i A') }}</strong><br>
                    <small class="text-muted fst-italic">({{ $log->updated_at->diffForHumans() }})</small>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center py-5 text-muted">
                  <div class="d-flex flex-column align-items-center justify-content-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="No logs" width="80" class="mb-3 opacity-75">
                    <h6 class="fw-bold text-danger">No activity logs found</h6>
                    <p class="small">Start interacting with the system to generate logs.</p>
                  </div>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <x-pagination-block :paginator="$logs" />
      </div>
    </div>

  </div>
</div>
@endsection
