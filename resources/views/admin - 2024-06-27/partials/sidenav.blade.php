<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="javascript:;" class="app-brand-link">
      <span class="app-brand-logo demo">
        {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 160px;"> --}}
        <h4>Admin Panel</h4>
      </span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item active">
      <a href="{{route('dashboard')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div class="text-truncate">Dashboards</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('template')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-envelope"></i>
        <div class="text-truncate">Templates</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('clinic')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div class="text-truncate">Clinic</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('client')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate">Client</div>
      </a>
    </li>
  </ul>
</aside>