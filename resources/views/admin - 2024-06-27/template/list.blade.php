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
          <h5 class="card-title" style="float: left;">Templates List</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
          <div class="dt-buttons"> 
            <a href="{{ route('addTemplate')}}" class="dt-button create-new btn btn-info" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
              <span class="d-none d-sm-inline-block"><i class="bx bx-plus me-sm-1"></i> Add Template</span>
            </a>
          </div>
        </div>
      </div>
      <div class="card-datatable text-nowrap">
        <table id="TemplatesTables" class="datatables-ajax table table-bordered">
          <thead>
            <tr>
            	<th>#</th>
              <th>Type</th>
        			<th>Title</th>
              <th>Sequence</th>
        			<th>Content</th>
              <th>Abuse</th>
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
  // DataTable
  $('#TemplatesTables').DataTable({
    processing: true,
    serverSide: true,
    order: [[0, "desc"]],
    pageLength:25,
    ajax: {
      url :"{{route('getAllTemplates')}}",
      type : "GET"
    },
    columns: [
      {data: 'id', name: 'id'},
      {data: 'type', name: 'type'},
      {data: 'title', name: 'title'},
      {data: 'sequence', name: 'sequence'},
      {data: 'content', name: 'content'},
      {data: 'abuse', name: 'abuse'},
      {data: 'status', name: 'status'},
      {data: 'Action', "orderable": false}
    ],
    columnDefs: [{
      "targets": 7,
      "orderable": false,
      "render": function (data, type, row, meta) {
        let text="";
        let base_url="{{URL::to('/') }}";
        let edit_url =base_url+"/admin/template/edit/"+row["encrypted_id"];
        let delete_url =base_url+"/admin/template/destroy/"+row["encrypted_id"];
        return `
        <a class="btn btn-primary btn-sm" href="${edit_url}">
          <i class="bx bx-edit-alt me-1" aria-hidden="true"></i>
        </a>
        <a class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\');" title="Delete" href="${delete_url}">
          <i class="bx bx-trash-alt me-1" aria-hidden="true"></i>
        </a>`
      }
    }],
  });
});
</script>
@endpush