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
.row{margin-right: calc(var(--bs-gutter-x)* -.0)};
</style>
<!-- Advanced Search -->
<div class="card">
  <div class="card-body">
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
    <form action="{{auth()->user()->role=='institution'?route('institution.getData'):route('admin.getData') }}" method="POST">
    @csrf
    @if(auth()->user()->role == 'institution')
    <div class="row">
      <div class="col-md-3">
        @php $from_date = old('from_date') ? old('from_date') : $from_date; @endphp
        <label class="form-label" for="formValidationService">From Date</label>
        <input type="date" class="form-control" name="from_date" name="from_date" format="dd-mm-YYYY" id="html5-date-input" value="{{ $from_date }}"/>
        @if ($errors->has('from_date'))
          <span class="text-danger">{{ $errors->first('from_date') }}</span>
        @endif
      </div>
      <div class="col-md-3">
        @php $to_date = old('to_date') ? old('to_date') : $to_date; @endphp
        <label class="form-label" for="formValidationService">To Date</label>
        <input type="date" class="form-control" name="to_date" name="to_date" format="dd-mm-YYYY" id="html5-date-input" value="{{ $to_date }}"/>
        @if ($errors->has('to_date'))
          <span class="text-danger">{{ $errors->first('to_date') }}</span>
        @endif
      </div>
      <div class="col-md-3">
        @php $status = old('status') ? old('status') : $status; @endphp
        <label class="form-label" for="formValidationStatus">Status</label>
        <select id="formValidationStatus" name="status" class="form-control">
          <option value="1" @if($status == "1") selected @endif>Active</option>
          <option value="0" @if($status == "0") selected @endif>Expired</option>
        </select>
      </div>
      <div class="col-md-3">
        <label class="form-label" for="formValidationService"></label> 
        <button type="submit" name="submitButton" value="submit" class="btn btn-primary" style="margin-top: 30px;">Submit</button>
      </div>
    </div>
    @else
    <div class="row">
      <div class="col-md-3">
        @php $from_date = old('from_date') ? old('from_date') : $from_date; @endphp
        <label class="form-label" for="formValidationService">From Date</label>
        <input type="date" class="form-control" name="from_date" name="from_date" format="dd-mm-YYYY" id="html5-date-input" value="{{ $from_date }}"/>
        @if ($errors->has('from_date'))
          <span class="text-danger">{{ $errors->first('from_date') }}</span>
        @endif
      </div>
      <div class="col-md-3">
        @php $to_date = old('to_date') ? old('to_date') : $to_date; @endphp
        <label class="form-label" for="formValidationService">To Date</label>
        <input type="date" class="form-control" name="to_date" name="to_date" format="dd-mm-YYYY" id="html5-date-input" value="{{ $to_date }}"/>
        @if ($errors->has('to_date'))
          <span class="text-danger">{{ $errors->first('to_date') }}</span>
        @endif
      </div>
      <div class="col-md-3">
        @php $institution_id = old('institution_id') ? old('institution_id') : $institution_id; @endphp   
        <label class="form-label" for="formValidationService">Institution</label>     
        <select id="formValidationInstitution" name="institution_id" class="form-control">
          <option value="">Select Institution</option>
          @if(count($institution)>0)
            @foreach($institution as $s)
              <option value="{{ $s->id }}" @if($institution_id == $s->id) selected @endif>{{ $s->institution_name }}</option>
            @endforeach
          @endif
        </select>
      </div>
      <div class="col-md-2">
        @php $status = old('status') ? old('status') : $status; @endphp
        <label class="form-label" for="formValidationStatus">Status</label>
        <select id="formValidationStatus" name="status" class="form-control">
          <option value="1" @if($status == "1") selected @endif>Active</option>
          <option value="0" @if($status == "0") selected @endif>Expired</option>
        </select>
      </div>
      <div class="col-md-1">
        <label class="form-label" for="formValidationService"></label> 
        <button type="submit" name="submitButton" value="submit" class="btn btn-primary" style="width: 70px;margin-top: 7px;">Submit</button>
      </div>
    </div>
    @endif
    </form>
  </div>
</div>

@if(count($data)>0)
<div class="card">
  <div class="card-datatable table-responsive">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
      <div class="card-datatable text-nowrap">
        <table id="TemplatesTables" class="datatables-ajax table table-bordered">
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
            </tr>
          </thead>
          <tbody>
            @php $i=1; @endphp
            @foreach($data as $d)
            @php 
              $current_date = date('Y-m-d');
              $now = time(); // or your date as well
              $service_date = date('Y-m-d', strtotime($d['service_date']));
              $your_date  = strtotime($service_date);
              $datediff   =  $now - $your_date;
              $no_of_days =  round($datediff / (60 * 60 * 24));
              $no_of_days_left = '';
              if($current_date < $service_date){
                  $no_of_days_left = '<span class="badge bg-label-primary me-1">Service Not Started</span>';
              }else{
                  if($no_of_days <= $d['aftercare_service_length']){
                      $no_of_days_left = '<span class="badge bg-label-success me-1">'.$d['aftercare_service_length'] - $no_of_days. '/'. $d['aftercare_service_length'].' Days</span>';
                  }else{
                      $no_of_days_left = '<span class="badge bg-label-danger me-1">Service Expired</span>';
                  }
              }
            @endphp
            <tr>
              <td>{{ $i; }}</td>
              <td>{{ $d['aftercare_service_length']." Days" }}</td>
              <td>{!! $no_of_days_left !!}</td>
              <td>{{ date('M d Y', strtotime($d['service_date'])) }}</td>
              <td>{{ ucwords($d['name']) }}</td>
              <td>{{ $d['category'] }}</td>
              <td>{{ $d['mobile_no'] }}</td>
              <td>{{ $d['email_id'] }}</td>
              <td>{{ ($d['sms_service']==1)?'Yes':'No' }}</td>
              <td>{{ $d['type'] }}</td>
              <td>{{ ($d['status']==1)?'Yes':'No' }}</td>
            </tr>
            @php $i++; @endphp
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-header justify-content-center">
      {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
    </div>
  </div>
</div>
@endif
<!--/ Add New Credit Card Modal -->
@endsection
@push('script-datatable')
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
@endpush