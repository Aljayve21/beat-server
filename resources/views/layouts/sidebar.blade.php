<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Beat-Server</sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('patients') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Current Admit</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('patients.create') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Admission</span></a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="{{ route('profile') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('attendance') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Attendance</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('hospitalrecords') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Hospital Records</span></a>
  </li>

  
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>


  
  
</ul>