<ul class="navbar-nav sidebar sidebar-dark accordion bg-gradient-primary" id="accordionSidebar">

  {{-- 🌟 Brand --}}
  <a class="sidebar-brand d-flex align-items-center justify-content-center py-3" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15 text-warning">
      <i class="fas fa-laugh-wink fa-lg"></i>
    </div>
    <div class="sidebar-brand-text mx-3 text-white">DLRS SOCDS Project</div>
  </a>

  <hr class="sidebar-divider my-0">

  {{-- 🧭 Dashboard --}}
  <li class="nav-item {{ request()->routeIs('dashboard') ? 'active bg-gradient-info shadow-sm' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <hr class="sidebar-divider">

  {{-- 🏷️ Category --}}
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
      <i class="fas fa-tags"></i>
      <span>Category</span>
    </a>
    <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
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
    <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionSidebar">
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
    <div id="collapseModel" class="collapse" aria-labelledby="headingModel" data-parent="#accordionSidebar">
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
    <div id="collapseProduct" class="collapse" aria-labelledby="headingProduct" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('products.index') }}"><i class="fas fa-eye text-primary me-1"></i> View Products</a>
        <a class="collapse-item" href="{{ route('products.create') }}"><i class="fas fa-plus text-success me-1"></i> Add Product</a>
      </div>
    </div>
  </li>

  {{-- 🛠 Maintenance --}}
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-tools"></i>
      <span>Maintenance</span>
    </a>
  </li>

  {{-- 👤 Profile --}}
  <li class="nav-item {{ request()->routeIs('profile') ? 'active bg-gradient-info shadow-sm' : '' }}">
    <a class="nav-link" href="{{ route('profile') }}">
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
