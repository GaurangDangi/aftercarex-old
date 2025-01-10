@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit speaker</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('updateSpeaker',$speaker['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-6">
            @php $name = old('name') ? old('name') : $speaker['name']; @endphp
            <label class="form-label" for="formValidationType">Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Name" name="name" value="{{ $name }}" />
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $mobile_no = old('mobile_no') ? old('mobile_no') : $speaker['mobile_no']; @endphp
            @php $country_code = old('country_code') ? old('country_code') : $speaker['country_code']; @endphp
            <label class="form-label" for="formValidationType">Mobile Number</label><label class="text-danger">*</label>
            <div class="input-group">
              <span class="input-group-text" style="height: 40px;">
                  <select id="formValidationType" name="country_code" class="form-control" style="height: 30px;    font-size: 13px">
                    <option value="+1" @if($country_code == "+1") selected @endif>US (+1)</option>
                    <option value="+61" @if($country_code == "+61") selected @endif>AUS (+61)</option>
                  </select>
              </span>
              <input type="text" style="height: 40px;" id="formValidationTitle" class="form-control phone-number-mask" placeholder="Mobile Number" name="mobile_no" value="{{ $mobile_no }}"/>
            </div>
            @if ($errors->has('mobile_no'))
            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            @php $email_id = old('email_id') ? old('email_id') : $speaker['email_id']; @endphp
            <label class="form-label" for="formValidationType">Email ID</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Email ID" name="email_id" value="{{ $email_id }}"/>
            @if ($errors->has('email_id'))
            <span class="text-danger">{{ $errors->first('email_id') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $speaker['status']; @endphp
            <label class="form-label" for="formValidationStatus">Status</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="status" class="form-control">
              <option value="1" @if($status == 1) selected @endif>Active</option>
              <option value="0" @if($status == 0) selected @endif>Inactive</option>
            </select>
            @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
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