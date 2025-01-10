@extends('admin.layouts.app')
@push('style-datatable')
@endpush
@section('panel')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
    Session::forget('success');
    @endphp
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
    {{ Session::get('error') }}
    @php
    Session::forget('error');
    @endphp
</div>
@endif
<!-- New Visitors & Activity -->
<div class="col-lg-12 mb-4">
    <div class="card">
        <div class="card-body row g-4">
            <div class="col-md-12 ps-md-4">
                <a href="{{ route('institution.client.index') }}">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="mb-0 text-center">Welcome Speaker Dashboard</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
