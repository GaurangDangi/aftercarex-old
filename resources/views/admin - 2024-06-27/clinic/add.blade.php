@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Add Clinic</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('storeClinic') }}" class="row g-3" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Name of Clinic</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Name of Clinic" name="name_of_clinic" value="{{ old('name_of_clinic') }}" />
            @if ($errors->has('name_of_clinic'))
            <span class="text-danger">{{ $errors->first('name_of_clinic') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationTitle">Registration Number</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Registration Number" name="registration_no" value="{{ old('registration_no') }}"/>
            @if ($errors->has('registration_no'))
            <span class="text-danger">{{ $errors->first('registration_no') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Contact Person Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Contact Person Name" name="contact_person_name" value="{{ old('contact_person_name') }}"/>
            @if ($errors->has('contact_person_name'))
            <span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
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
            <label class="form-label" for="formValidationType">Subscription Amount</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Subscription Amount" name="subscription_price" value="{{ old('subscription_price') }}"/>
            @if ($errors->has('subscription_price'))
            <span class="text-danger">{{ $errors->first('subscription_price') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationBio">Address Line 1</label><label class="text-danger">*</label>
            <textarea class="form-control" id="formValidationBio" name="address_1" rows="3">{{ old('address_1') }}</textarea>
            @if ($errors->has('address_1'))
            <span class="text-danger">{{ $errors->first('address_1') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationBio">Address Line 2</label>
            <textarea class="form-control" id="formValidationBio" name="address_2" rows="3">{{ old('address_2') }}</textarea>
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">City</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="City" name="city" value="{{ old('city') }}"/>
            @if ($errors->has('city'))
            <span class="text-danger">{{ $errors->first('city') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">State</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="State" name="state" value="{{ old('state') }}"/>
            @if ($errors->has('state'))
            <span class="text-danger">{{ $errors->first('state') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Country</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Country" name="country" value="{{ old('country') }}"/>
            @if ($errors->has('country'))
            <span class="text-danger">{{ $errors->first('country') }}</span>
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