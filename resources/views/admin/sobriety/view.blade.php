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
<div class="card">
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
      <div class="card-header flex-column flex-md-row">
        <div class="head-label text-center">
          <h5 class="card-title" style="float: left;">Sobriety Detail Lists</h5>
        </div>
      </div>
      <div class="card-datatable text-nowrap">
        <table id="OrdersTables" class="datatables-ajax table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Question</th>
                <th>Answere One</th>
                <th>Marks One</th>
                <th>Answere Two</th>
                <th>Marks Two</th>
                <th>Answere Three</th>
                <th>Marks Three</th>
                <th>Answere Four</th>
                <th>Marks Four</th>
              </tr>
            </thead>
            @if(count($sobriety->questionAns)>0)
            <tbody>
              @foreach($sobriety->questionAns as $key => $s)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $sobriety->title }}</td>
                <td>{{ $s->question }}</td>
                <td>{{ $s->answere_one }}</td>
                <td>{{ $s->marks_one }}</td>
                <td>{{ $s->answere_two }}</td>
                <td>{{ $s->marks_two }}</td>
                <td>{{ $s->answere_three }}</td>
                <td>{{ $s->marks_three }}</td>
                <td>{{ $s->answere_four }}</td>
                <td>{{ $s->marks_four }}</td>
              </tr>
              @endforeach
            </tbody>
            @endif
          </table>
      </div>
    </div>
  </div>
</div>
<!--/ Add New Credit Card Modal -->
@endsection
@push('script-datatable')
<script src="{{ asset('backend/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('backend/assets/js/tables-datatables-basic.js') }}"></script>
@endpush