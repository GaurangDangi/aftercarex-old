@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Clinic</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('updateClinic',$clinic['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            @php $name_of_clinic = old('name_of_clinic') ? old('name_of_clinic') : $clinic['name_of_clinic']; @endphp
            <label class="form-label" for="formValidationType">Name of Clinic</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Name of Clinic" name="name_of_clinic" value="{{ $name_of_clinic }}" />
            @if ($errors->has('name_of_clinic'))
            <span class="text-danger">{{ $errors->first('name_of_clinic') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $registration_no = old('registration_no') ? old('registration_no') : $clinic['registration_no']; @endphp
            <label class="form-label" for="formValidationTitle">Registration Number</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Registration Number" name="registration_no" value="{{ $registration_no }}"/>
            @if ($errors->has('registration_no'))
            <span class="text-danger">{{ $errors->first('registration_no') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $contact_person_name = old('contact_person_name') ? old('contact_person_name') : $clinic['contact_person_name']; @endphp
            <label class="form-label" for="formValidationType">Contact Person Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Contact Person Name" name="contact_person_name" value="{{ $contact_person_name }}"/>
            @if ($errors->has('contact_person_name'))
            <span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $mobile_no = old('mobile_no') ? old('mobile_no') : $clinic['mobile_no']; @endphp
            <label class="form-label" for="formValidationType">Mobile Number</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Mobile Number" name="mobile_no" value="{{ $mobile_no }}"/>
            @if ($errors->has('mobile_no'))
            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $email_id = old('email_id') ? old('email_id') : $clinic['email_id']; @endphp
            <label class="form-label" for="formValidationType">Email ID</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Email ID" name="email_id" value="{{ $email_id }}"/>
            @if ($errors->has('email_id'))
            <span class="text-danger">{{ $errors->first('email_id') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $subscription_price = old('subscription_price') ? old('subscription_price') : $clinic['subscription_price']; @endphp
            <label class="form-label" for="formValidationType">Subscription Amount</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Subscription Amount" name="subscription_price" value="{{ $subscription_price }}"/>
            @if ($errors->has('subscription_price'))
            <span class="text-danger">{{ $errors->first('subscription_price') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $address_1 = old('address_1') ? old('address_1') : $clinic['address_1']; @endphp
            <label class="form-label" for="formValidationBio">Address Line 1</label><label class="text-danger">*</label>
            <textarea class="form-control" id="formValidationBio" name="address_1" rows="3">{{ $address_1 }}</textarea>
            @if ($errors->has('address_1'))
            <span class="text-danger">{{ $errors->first('address_1') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $address_2 = old('address_2') ? old('address_2') : $clinic['address_2']; @endphp
            <label class="form-label" for="formValidationBio">Address Line 2</label>
            <textarea class="form-control" id="formValidationBio" name="address_2" rows="3">{{ $address_2 }}</textarea>
          </div>

          <div class="col-md-6">
            @php $city = old('city') ? old('city') : $clinic['city']; @endphp
            <label class="form-label" for="formValidationType">City</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="City" name="city" value="{{ $city }}"/>
            @if ($errors->has('city'))
            <span class="text-danger">{{ $errors->first('city') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $state = old('state') ? old('state') : $clinic['state']; @endphp
            <label class="form-label" for="formValidationType">State</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="State" name="state" value="{{ $state }}"/>
            @if ($errors->has('state'))
            <span class="text-danger">{{ $errors->first('state') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $country = old('country') ? old('country') : $clinic['country']; @endphp
            <label class="form-label" for="formValidationType">Country</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Country" name="country" value="{{ $country }}"/>
            @if ($errors->has('country'))
            <span class="text-danger">{{ $errors->first('country') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $clinic['status']; @endphp
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