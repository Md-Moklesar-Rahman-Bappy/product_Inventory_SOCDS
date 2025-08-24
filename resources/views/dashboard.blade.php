@extends('layouts.app')

@section('title', 'Dashboard - Department of Land Record and Survey - SOCDS Project')

@section('contents')
<div class="row">
  <div class="col-md-12">

    <!-- 👋 Welcome Card -->
    <div class="card shadow-lg border-0 mb-4 animate__animated animate__fadeIn">
      <div class="card-header bg-white border-bottom py-4 d-flex align-items-center justify-content-between">
        <h5 class="mb-0 text-primary fw-bold">👋 Welcome to Your Dashboard</h5>
        <span class="badge bg-info-subtle text-info fw-semibold px-3 py-2 rounded-pill">
          Product Inventory System
        </span>
      </div>
      <div class="card-body">
        <p class="mb-2 fs-6">
          This is your central hub for managing <strong>categories</strong>, <strong>brands</strong>, <strong>models</strong>, and <strong>products</strong> with clarity and control.
        </p>
        <p class="text-muted small mb-3">
          Use the sidebar to navigate between modules. All changes are reflected <span class="text-success fw-semibold">in real-time</span> for seamless updates.
        </p>
        <div class="d-flex gap-2 flex-wrap">
          <span class="badge bg-success-subtle text-success fw-medium">Modular</span>
          <span class="badge bg-warning-subtle text-warning fw-medium">Maintainable</span>
          <span class="badge bg-secondary-subtle text-secondary fw-medium">Joyful UI</span>
        </div>
      </div>
    </div>

    <!-- 📦 Summary Bar -->
    <div class="row mb-4 text-center">
      @foreach($entityCounts as $label => $count)
        <div class="col-md-2">
          <div class="card shadow-sm border-0">
            <div class="card-body py-3">
              <i class="fa fa-box-open text-primary mb-2" style="font-size: 1.5rem;"></i>
              <h6 class="fw-bold mb-0">{{ $count }}</h6>
              <small class="text-muted">{{ $label }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- 📊 Entity Distribution Chart -->
    <div class="card shadow-lg border-0 mb-4 animate__animated animate__fadeIn">
      <div class="card-header bg-white border-bottom py-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-primary fw-bold">📊 Entity Distribution</h5>
        <button class="btn btn-sm btn-outline-primary" onclick="toggleChartType()">Toggle Chart Type</button>
      </div>
      <div class="card-body text-center">
        <div class="mx-auto" style="max-width: 360px;">
          <canvas id="entityChart" width="300" height="300" style="max-width: 100%; height: auto;"></canvas>
        </div>
        <div class="d-flex gap-2 flex-wrap justify-content-center mt-4">
          @foreach($entityCounts as $label => $count)
            <span class="badge bg-light text-dark fw-medium px-3 py-2 rounded-pill shadow-sm">
              {{ $label }}: <strong>{{ $count }}</strong>
            </span>
          @endforeach
        </div>
      </div>
    </div>

    <!-- 📈 Warranty Status Chart -->
    <div class="card shadow-lg border-0 mb-4 animate__animated animate__fadeIn">
      <div class="card-header bg-white border-bottom py-4">
        <h5 class="mb-0 text-primary fw-bold">📈 Warranty Status Overview</h5>
      </div>
      <div class="card-body text-center">
        <div class="mx-auto" style="max-width: 500px;">
          <canvas id="warrantyChart" width="400" height="300" style="max-width: 100%; height: auto;"></canvas>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Chart Type Toggle
  let currentType = 'pie';
  let entityChart;
  const entityCtx = document.getElementById('entityChart').getContext('2d');

  function renderEntityChart(type) {
    entityChart = new Chart(entityCtx, {
      type: type,
      data: {
        labels: {!! json_encode(array_keys($entityCounts)) !!},
        datasets: [{
          data: {!! json_encode(array_values($entityCounts)) !!},
          backgroundColor: [
            '#0d6efd', '#6610f2', '#6f42c1',
            '#198754', '#ffc107', '#dc3545'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
          animateScale: true,
          duration: 1000
        },
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              boxWidth: 12,
              padding: 15
            }
          },
          tooltip: {
            callbacks: {
              label: ctx => `${ctx.label}: ${ctx.raw} items`
            }
          }
        }
      }
    });
  }

  function toggleChartType() {
    entityChart.destroy();
    currentType = currentType === 'pie' ? 'doughnut' : 'pie';
    renderEntityChart(currentType);
  }

  renderEntityChart(currentType);

  // Warranty Status Chart
  const warrantyCtx = document.getElementById('warrantyChart').getContext('2d');
  new Chart(warrantyCtx, {
    type: 'bar',
    data: {
      labels: ['Active', 'Expiring Soon', 'Expired'],
      datasets: [{
        label: 'Warranty Count',
        data: [12, 5, 3], // Replace with dynamic data
        backgroundColor: ['#198754', '#ffc107', '#dc3545'],
        borderRadius: 5,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: {
        duration: 800,
        easing: 'easeOutQuart'
      },
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: ctx => `${ctx.label}: ${ctx.raw} warranties`
          }
        }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1,
            font: {
              size: 12
            }
          },
          grid: {
            color: '#f0f0f0'
          }
        },
        x: {
          ticks: {
            font: {
              size: 12
            }
          },
          grid: {
            display: false
          }
        }
      }
    }
  });
</script>
@endpush
