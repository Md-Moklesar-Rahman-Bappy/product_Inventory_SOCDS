<ul class="navbar-nav sidebar sidebar-dark accordion bg-gradient-primary" id="accordionSidebar">

  {{-- 🌟 Brand --}}
  <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15 text-warning">
      <img src="{{ asset('images/logo.svg') }}" alt="SOCDS Logo" style="height: 50px">
    </div>
    <div class="sidebar-brand-text mx-3 text-white">
      DLRS SOCDS Project
    </div>
  </a>

  <hr class="sidebar-divider my-0">

  {{-- 🧭 Dashboard --}}
  <li class="nav-item {{ request()->routeIs('dashboard') ? 'active bg-gradient-info shadow-sm' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}" data-toggle="tooltip" title="Dashboard">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  {{-- 📜 Activity Logs --}}
  <li class="nav-item {{ request()->routeIs('activity.logs') ? 'active bg-gradient-info shadow-sm' : '' }}">
    <a class="nav-link" href="{{ route('activity.logs') }}" data-toggle="tooltip" title="Activity Logs">
      <i class="fas fa-clipboard-list"></i>
      <span>Activity Logs</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  {{-- 🏷️ Category --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
      <i class="fas fa-tags"></i>
      <span>Category</span>
    </a>
    <div id="collapseCategory" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('categories.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Categories</a>
        <a class="collapse-item" href="{{ route('categories.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Category</a>
      </div>
    </div>
  </li>

  {{-- 🏭 Brand --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
      <i class="fas fa-industry"></i>
      <span>Brand</span>
    </a>
    <div id="collapseBrand" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('brands.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Brands</a>
        <a class="collapse-item" href="{{ route('brands.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Brand</a>
      </div>
    </div>
  </li>

  {{-- 📦 Model --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseModel" aria-expanded="true" aria-controls="collapseModel">
      <i class="fas fa-cubes"></i>
      <span>Model</span>
    </a>
    <div id="collapseModel" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('models.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Models</a>
        <a class="collapse-item" href="{{ route('models.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Model</a>
      </div>
    </div>
  </li>

  {{-- 📋 Product --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
      <i class="fas fa-box-open"></i>
      <span>Product</span>
    </a>
    <div id="collapseProduct" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('products.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Products</a>
        <a class="collapse-item" href="{{ route('products.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Product</a>
      </div>
    </div>
  </li>

  {{-- 🛠 Maintenance --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaintenance" aria-expanded="true" aria-controls="collapseMaintenance">
      <i class="fas fa-tools"></i>
      <span>Maintenance</span>
    </a>
    <div id="collapseMaintenance" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('maintenance.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Logs</a>
        <a class="collapse-item" href="{{ route('maintenance.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Entry</a>
      </div>
    </div>
  </li>

  {{-- 🛡️ Warranty (Optional Future Section) --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWarranty" aria-expanded="true" aria-controls="collapseWarranty">
      <i class="fas fa-shield-alt"></i>
      <span>Warranty</span>
    </a>
    <div id="collapseWarranty" class="collapse" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('warranties.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Status</a>
        {{-- <a class="collapse-item" href="{{ route('warranty.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Warranty</a>
      </div> --}}
    </div>
  </li>

  {{-- 👤 Profile --}}
  <li class="nav-item {{ request()->routeIs('profile') ? 'active bg-gradient-info shadow-sm' : '' }}">
    <a class="nav-link" href="{{ route('profile') }}" data-toggle="tooltip" title="Profile">
      <i class="fas fa-user-circle"></i>
      <span>Profile</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  {{-- 🔄 Sidebar Toggler --}}
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
