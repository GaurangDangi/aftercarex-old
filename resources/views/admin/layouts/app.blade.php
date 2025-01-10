@extends('admin.layouts.master')
@section('content')
<!-- Layout Content -->
<div class="layout-wrapper layout-content-navbar ">
    <div class="layout-container">
    <!-- Layout page -->
    <div class="layout-page">
        @include('admin.partials.sidenav')
        @include('admin.partials.topnav')
        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                @yield('panel') 
            </div>
            <!-- / Content -->

            <!-- Footer -->
            {{-- @include('admin.partials.footer') --}}
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
@endsection