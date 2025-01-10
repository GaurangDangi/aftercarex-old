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
<div class="col-lg-6 mb-4">
    <div class="card">
        <div class="card-body row g-4">
            <div class="col-md-6 ps-md-4">
                <a href="{{ route('institution.client.index') }}">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <h5 class="mb-0">Total Clients</h5>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="mt-auto">
                            <h2 class="text-success mb-2">{{ $total_client }}</h2>
                        </div>
                        <div id="activityChart"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!--/ New Visitors & Activity -->
<!-- Button trigger modal -->
<button style="display:none;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#StripCardModal" id="StripCardModalBtn">Launch demo modal</button>
@endsection
@push('script')
<script>
var strip_customer_id = "{{ $institution->strip_customer_id }}";
if(strip_customer_id ==""){
    $('#StripCardModalBtn').trigger('click');
}
</script>
@endpush