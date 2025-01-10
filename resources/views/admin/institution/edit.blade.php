@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Institution</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('updateInstitution',$institution['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-6">
            @php $institution_name = old('institution_name') ? old('institution_name') : $institution['institution_name']; @endphp
            <label class="form-label" for="formValidationName">Name of Institution</label><label class="text-danger">*</label>
            <input type="text" id="formValidationName" class="form-control" placeholder="Name of Institution" name="institution_name" value="{{ $institution_name }}"/>
            @if ($errors->has('institution_name'))
            <span class="text-danger">{{ $errors->first('institution_name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $industry = old('industry') ? old('industry') : $institution['industry']; @endphp
            <label class="form-label" for="formValidationType">Industry</label><label class="text-danger">*</label>
            <select id="formValidationType" name="industry" class="form-control">
              <option value="">Select Industry</option>
              <option value="Clinic" @if($industry == "Clinic") selected @endif>Clinic</option>
              <option value="Doctor" @if($industry == "Doctor") selected @endif>Doctor</option>
              <option value="Lawyer" @if($industry == "Lawyer") selected @endif>Lawyer</option>
              <option value="Rehab Centre" @if($industry == "Rehab Centre") selected @endif>Rehab Centre</option>
            </select>
            @if ($errors->has('industry'))
            <span class="text-danger">{{ $errors->first('industry') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $registration_no = old('registration_no') ? old('registration_no') : $institution['registration_no']; @endphp
            <label class="form-label" for="formValidationTitle">Registration Number</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Registration Number" name="registration_no" value="{{ $registration_no }}"/>
            @if ($errors->has('registration_no'))
            <span class="text-danger">{{ $errors->first('registration_no') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $contact_person_name = old('contact_person_name') ? old('contact_person_name') : $institution['contact_person_name']; @endphp
            <label class="form-label" for="formValidationType">Contact Person Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Contact Person Name" name="contact_person_name" value="{{ $contact_person_name }}"/>
            @if ($errors->has('contact_person_name'))
            <span class="text-danger">{{ $errors->first('contact_person_name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $mobile_no = old('mobile_no') ? old('mobile_no') : $institution['mobile_no']; @endphp
            @php $country_code = old('country_code') ? old('country_code') : $institution['country_code']; @endphp
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
            @php $email_id = old('email_id') ? old('email_id') : $institution['email_id']; @endphp
            <label class="form-label" for="formValidationType">Email ID</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Email ID" name="email_id" value="{{ $email_id }}"/>
            @if ($errors->has('email_id'))
            <span class="text-danger">{{ $errors->first('email_id') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $subscription_price = old('subscription_price') ? old('subscription_price') : $institution['subscription_price']; @endphp
            <label class="form-label" for="formValidationType">Subscription Amount</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Subscription Amount" name="subscription_price" value="{{ $subscription_price }}"/>
            @if ($errors->has('subscription_price'))
            <span class="text-danger">{{ $errors->first('subscription_price') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $company_website = old('company_website') ? old('company_website') : $institution['company_website']; @endphp
            <label class="form-label" for="formValidationWebsite">Company Website</label>
            <input type="text" id="formValidationWebsite" class="form-control" placeholder="Company Website" name="company_website" value="{{ $company_website }}"/>
            @if ($errors->has('company_website'))
            <span class="text-danger">{{ $errors->first('company_website') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $address_1 = old('address_1') ? old('address_1') : $institution['address_1']; @endphp
            <label class="form-label" for="formValidationBio">Address Line 1</label><label class="text-danger">*</label>
            <textarea class="form-control" id="formValidationBio" name="address_1" rows="3">{{ $address_1 }}</textarea>
            @if ($errors->has('address_1'))
            <span class="text-danger">{{ $errors->first('address_1') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $address_2 = old('address_2') ? old('address_2') : $institution['address_2']; @endphp
            <label class="form-label" for="formValidationBio">Address Line 2</label>
            <textarea class="form-control" id="formValidationBio" name="address_2" rows="3">{{ $address_2 }}</textarea>
          </div>

          <div class="col-md-6">
            @php $city = old('city') ? old('city') : $institution['city']; @endphp
            <label class="form-label" for="formValidationType">City</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="City" name="city" value="{{ $city }}"/>
            @if ($errors->has('city'))
            <span class="text-danger">{{ $errors->first('city') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $state = old('state') ? old('state') : $institution['state']; @endphp
            <label class="form-label" for="formValidationType">State</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="State" name="state" value="{{ $state }}"/>
            @if ($errors->has('state'))
            <span class="text-danger">{{ $errors->first('state') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $country = old('country') ? old('country') : $institution['country']; @endphp
            <label class="form-label" for="formValidationType">Country</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Country" name="country" value="{{ $country }}"/>
            @if ($errors->has('country'))
            <span class="text-danger">{{ $errors->first('country') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $total_expected_client = old('total_expected_client') ? old('total_expected_client') : $institution['total_expected_client']; @endphp
            <label class="form-label" for="formValidationType">Total Expected Client</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Total Expected Client" name="total_expected_client" value="{{ $total_expected_client }}"/>
            @if ($errors->has('total_expected_client'))
            <span class="text-danger">{{ $errors->first('total_expected_client') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $institution['status']; @endphp
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
            <label class="form-label">Remote Alcohol & Drug Health Analytics (RADHA):</label><label class="text-danger">*</label>
            <div>
                <input style="margin-top: 12px;" type="radio" class="form-check-input" name="radha" id="formValidationRadhaYes" value="Yes" {{ old('radha', $institution['radha']) == 'Yes' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationRadhaYes" style="margin-right: 35px;margin-top: 10px;">
                    Yes
                </label>

                <input style="margin-top: 12px" type="radio" class="form-check-input" name="radha" id="formValidationRadhaNo" value="No" {{ old('radha', $institution['radha']) == 'No' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationRadhaNo" style="margin-right: 35px;margin-top: 10px;">
                    No
                </label>
            </div>
            @error('radha')
            <div class="text-danger">{{ $errors->first('radha') }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">White Label Client:<label class="text-danger">*</label></label>
            <div>
                <input style="margin-top: 12px;" type="radio" class="form-check-input" name="white_label_client" id="formValidationWhiteLabelClientYes" value="Yes" {{ old('white_label_client', $institution['white_label_client']) == 'Yes' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationWhiteLabelClientYes" style="margin-right: 35px;margin-top: 10px;">
                    Yes
                </label>

                <input style="margin-top: 12px" type="radio" class="form-check-input" name="white_label_client" id="formValidationWhiteLabelClientNo" value="No" {{ old('white_label_client', $institution['white_label_client']) == 'No' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationWhiteLabelClientNo" style="margin-right: 35px;margin-top: 10px;">
                    No
                </label>
            </div>
            @error('white_label_client')
            <div class="text-danger">{{ $errors->first('white_label_client') }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Group Counselors:<label class="text-danger">*</label></label>
            <div>
                <input style="margin-top: 12px;" type="radio" class="form-check-input" name="group_counselors" id="formValidationGroupCounselorsSelf" value="Self Provided" {{ old('group_counselors', $institution['group_counselors']) == 'Self Provided' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationGroupCounselorsSelf" style="margin-right: 35px;margin-top: 10px;">
                    Self Provided
                </label>

                <input style="margin-top: 12px" type="radio" class="form-check-input" name="group_counselors" id="formValidationGroupCounselorsXaftercare" value="Provided by Xaftercare" {{ old('group_counselors', $institution['group_counselors']) == 'Provided by Xaftercare' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationGroupCounselorsXaftercare" style="margin-right: 35px;margin-top: 10px;">
                    Provided by Xaftercare
                </label>
            </div>
            @error('group_counselors')
            <div class="text-danger">{{ $errors->first('group_counselors') }}</div>
            @enderror
          </div>

          <div class="col-md-6">
            <label class="form-label">Access to Content Creation:<label class="text-danger">*</label></label>
            <div>
                <input style="margin-top: 12px;" type="radio" class="form-check-input" name="content_creation_access" id="formValidationAccessYes" value="Yes" {{ old('content_creation_access', $institution['content_creation_access']) == 'Yes' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationAccessYes" style="margin-right: 35px;margin-top: 10px;">
                    Yes
                </label>

                <input style="margin-top: 12px" type="radio" class="form-check-input" name="content_creation_access" id="formValidationAccessNo" value="No" {{ old('content_creation_access', $institution['content_creation_access']) == 'No' ? 'checked' : '' }}>
                <label class="form-check-label" for="formValidationAccessNo" style="margin-right: 35px;margin-top: 10px;">
                    No
                </label>
            </div>
            @error('content_creation_access')
            <div class="text-danger">{{ $errors->first('content_creation_access') }}</div>
            @enderror
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