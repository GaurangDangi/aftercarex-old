@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Client</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('updateClinic',$client['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            @php $name = old('name') ? old('name') : $client['name']; @endphp
            <label class="form-label" for="formValidationType">Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Name" name="name" value="{{ $name }}" />
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $mobile_no = old('mobile_no') ? old('mobile_no') : $client['mobile_no']; @endphp
            <label class="form-label" for="formValidationType">Mobile Number</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Mobile Number" name="mobile_no" value="{{ $mobile_no }}"/>
            @if ($errors->has('mobile_no'))
            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $email_id = old('email_id') ? old('email_id') : $client['email_id']; @endphp
            <label class="form-label" for="formValidationType">Email ID</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Email ID" name="email_id" value="{{ $email_id }}"/>
            @if ($errors->has('email_id'))
            <span class="text-danger">{{ $errors->first('email_id') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $client['status']; @endphp
            <label class="form-label" for="formValidationStatus">Status</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="status" class="form-control">
              <option value="1" @if($status == 1) selected @endif>Active</option>
              <option value="0" @if($status == 0) selected @endif>Inactive</option>
            </select>
            @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $sms_service = old('sms_service') ? old('sms_service') : $client['sms_service']; @endphp
            <label class="form-label">Are Sure You Want SMS Service</label><br/>
            <input class="form-check-input" name="sms_service" type="checkbox" value="1" id="inlineRadio1" @if($sms_service == 1) checked @endif/>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="col-12">
            <button type="submit" name="submitButton" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /FormValidation -->
</div>
<!-- / Content -->
@endsection