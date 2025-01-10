@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Add Client</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('storeClient') }}" class="row g-3" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" />
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Mobile Number</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Mobile Number" name="mobile_no" value="{{ old('mobile_no') }}"/>
            @if ($errors->has('mobile_no'))
            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Email ID</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Email ID" name="email_id" value="{{ old('email_id') }}"/>
            @if ($errors->has('email_id'))
            <span class="text-danger">{{ $errors->first('email_id') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            <label class="form-label" for="formValidationStatus">Status</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="status" class="form-control">
              <option value="1">Active</option>
              <option value="0">Inactive</option>
            </select>
            @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>
          <div class="col-md-6">
            <label class="form-label">Are Sure You Want SMS Service</label><br/>
            <input class="form-check-input" name="sms_service" type="checkbox" value="1" id="inlineRadio1" />
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>
          <div class="col-12">
            <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /FormValidation -->
</div>
<!-- / Content -->
@endsection