@extends('admin.layouts.app')
@push('style-datatable')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<!-- Row Group CSS -->
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
@endpush
@section('panel')
<style>
.pagination-div{ 
  padding: 10px 25px 10px 10px;
  float: right;
  margin-top: 15px;
}
</style>
<!-- Advanced Search -->
<div class="card">
  <div class="card-datatable table-responsive">
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
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
      <div class="card-header flex-column flex-md-row">
        <div class="head-label text-center">
          <h5 class="card-title" style="float: left;">Client List</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
          <div class="dt-buttons"> 
            <a href="{{ auth()->user()->role == 'institution' ? route('addInstitutionClient') : route('addClient') }}" class="dt-button create-new btn btn-info" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
              <span class="d-none d-sm-inline-block"><i class="bx bx-plus me-sm-1"></i> Add Client</span>
            </a>
          </div>
        </div>
      </div>
      <div class="card-datatable text-nowrap">
        <table id="ClientTables" class="datatables-ajax table table-bordered">
          <thead>
            <tr>
            	<th>#</th>
              <th>LENGTH OF AFTERCARE SERVICE</th>
              <th>NO OF DAYS LEFT</th>
              <th>START DATE OF SERVICE</th>
              <th>Name</th>
              <th>CLIENT CATEGORY</th>
        			<th>Mobile Number</th>
              <th>Email ID</th>
              <th>SMS Service</th>
              <th>CLIENT TYPE</th>
              <th>Status</th>
        			<th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<!--/ Add New Credit Card Modal -->
@endsection
@push('script-datatable')
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
<script type="text/javascript"> 
$(document).ready(function(){
  var userRole = @json(auth()->user()->role);
  if(userRole == 'institution') {
    var url = "{{route('getAllInstitutionClient')}}";
  } else {
    var url = "{{route('getAllClient')}}";
  }

  // DataTable
  $('#ClientTables').DataTable({
    processing: true,
    serverSide: true,
    order: [[0, "desc"]],
    pageLength:25,
    ajax: {
      url : url,
      type : "GET"
    },
    columns: [
      {data: 'id', name: 'id'},
      {data: 'aftercare_service_length', name: 'aftercare_service_length'},
      {data: 'no_of_days_left', name: 'no_of_days_left'},
      {data: 'service_date', name: 'service_date'},
      {data: 'name', name: 'name'},
      {data: 'category', name: 'category'},
      {data: 'mobile_no', name: 'mobile_no'},
      {data: 'email_id', name: 'email_id'},
      {data: 'sms_service', name: 'sms_service'},
      {data: 'type', name: 'type'},
      {data: 'status', name: 'status'},
      {data: 'Action', "orderable": false}
    ],
    columnDefs: [{
      "targets": 11,
      "orderable": false,
      "render": function (data, type, row, meta) {
        //alert(row["show_expiry_tabs"]);
        let text="";
        let base_url="{{URL::to('/') }}";
        if(userRole == 'institution') {
          var edit_url =base_url+"/institution/client/edit/"+row["encrypted_id"];
          var delete_url =base_url+"/institution/client/destroy/"+row["encrypted_id"];
          var renew_url =base_url+"/institution/client/renew-client/"+row["encrypted_id"];
          var progress_bar =base_url+"/institution/client/progress-bar/"+row["encrypted_id"];  
          
        } else {
          var progress_bar =base_url+"/admin/client/progress-bar/"+row["encrypted_id"];
          var edit_url =base_url+"/admin/client/edit/"+row["encrypted_id"];
          var delete_url =base_url+"/admin/client/destroy/"+row["encrypted_id"];
          var renew_url =base_url+"/admin/client/renew-client/"+row["encrypted_id"];  
        }
        var show_expiry_tabs = '';
        if(row["show_expiry_tabs"]==1){
          show_expiry_tabs=`<a class="btn btn-primary btn-sm" title="Renew" href="${renew_url}">
            <i class="bx bxl-redbubble me-1" aria-hidden="true"></i></a>`;
        }
        
        return `
        <a class="btn btn-primary btn-sm" href="${edit_url}" title="Edit">
          <i class="bx bx-edit-alt me-1" aria-hidden="true"></i>
        </a>
        <a class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\');" title="Delete" href="${delete_url}">
          <i class="bx bx-trash-alt me-1" aria-hidden="true"></i>
        </a>
        <a class="btn btn-success btn-sm client-progress-bar" client_id="${row["encrypted_id"]}" title="Progress Bar" href="javascript:;" data-bs-toggle="modal" data-bs-target="#clientProgressBarModal">
          <i class="bx bx-bar-chart-alt-2 me-1" aria-hidden="true"></i>
        </a> 
        ${show_expiry_tabs}`
      }
    }],
  });
});
</script>
@endpush