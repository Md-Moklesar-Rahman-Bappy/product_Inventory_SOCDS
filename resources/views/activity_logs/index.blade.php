@extends('layouts.app')

@section('title', 'Activity Log For Product Inventory System')

@section('contents')
<div class="row">
  <div class="col-md-12">

    <!-- 📜 Activity Logs Card -->
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
              @php
                $isNoChange = $log->action === 'update' && Str::contains($log->description, 'No changes');
              @endphp
              <tr>
                <td class="fw-semibold text-dark">{{ $log->user->name ?? 'System' }}</td>
                <td>
                  <span class="badge
                    @if($log->action === 'create') bg-success text-white
                    @elseif($isNoChange) bg-secondary text-white
                    @elseif($log->action === 'update') bg-primary text-white
                    @elseif($log->action === 'delete') bg-danger text-white
                    @else bg-secondary text-white @endif">
                    {{ ucfirst($log->action) }}
                  </span>
                </td>
                <td><span class="text-muted">{{ $log->model ?? '-' }}</span></td>
                <td class="{{ $isNoChange ? 'text-muted fst-italic' : '' }}">
                  {!! $log->description !!}
                </td>
                <td>
                  <div class="text-nowrap" title="{{ $log->updated_at->format('Y-m-d H:i:s') }}">
                    <strong>{{ $log->updated_at->format('d M Y, h:i:s A') }}</strong><br>
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

        <!-- 📄 Pagination -->
        <x-pagination-block :paginator="$logs" />
      </div>
    </div>
  </div>
</div>
@endsection
