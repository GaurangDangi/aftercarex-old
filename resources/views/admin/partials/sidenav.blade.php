<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <!-- ! Hide app brand if navbar-full -->

  @if (auth()->user()->role == 'institution')
  <div class="app-brand demo">
    <a href="javascript:;" class="app-brand-link">
      <span class="app-brand-logo demo">
        {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 160px;"> --}}
        <h4>{{ ucwords(auth()->user()->role) }} Panel</h4>
      </span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item active">
      <a href="{{route('institution.dashboard')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div class="text-truncate">Dashboards</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('institution.client.index')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate">Add Client</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('institution.reports')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bxs-report"></i>
        <div class="text-truncate">Reports</div>
      </a>
    </li>
  </ul>
  @elseif (auth()->user()->role == 'speaker')
  <div class="app-brand demo">
    <a href="javascript:;" class="app-brand-link">
      <span class="app-brand-logo demo">
        {{-- <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 160px;"> --}}
        <h4>{{ ucwords(auth()->user()->role) }} Panel</h4>
      </span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item active">
      <a href="{{route('speaker.dashboard')}}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div class="text-truncate">Dashboards</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('speaker.classSetup')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-calendar-event"></i>
        <div class="text-truncate">Class Setup</div>
      </a>
    </li>
  </ul>
  @else
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
      <a href="{{route('institution')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-calendar"></i>
        <div class="text-truncate">Add Institutional Client</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('client')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-user"></i>
        <div class="text-truncate">Add Client</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('resourceLibrary')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-library"></i>
        <div class="text-truncate">Resource Library</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('speaker')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-speaker"></i>
        <div class="text-truncate">Speaker</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('classSetup')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-calendar-event"></i>
        <div class="text-truncate">Class Setup</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{ route('sobriety') }}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-color-fill"></i>
        <div class="text-truncate">Client Sobriety <br/> Progress Data <br/> Collection</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{ route('milestone') }}" class="menu-link" >
        <i class="menu-icon tf-icons bx bx-star"></i>
        <div class="text-truncate">Milestone</div>
      </a>
    </li>
    <li class="menu-item active">
      <a href="{{route('admin.reports')}}" class="menu-link" >
        <i class="menu-icon tf-icons bx bxs-report"></i>
        <div class="text-truncate">Reports</div>
      </a>
    </li>
  </ul>
  @endif
</aside>