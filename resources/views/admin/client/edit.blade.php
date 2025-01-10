@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Client</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ auth()->user()->role == 'institution' ? route('updateInstitutionClient',$client['id']) : route('updateClient',$client['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-6">
            @php $aftercare_service_length = old('aftercare_service_length') ? old('aftercare_service_length') : $client['aftercare_service_length']; @endphp
            <label class="form-label" for="formValidationService">Length of Aftercare Service</label><label class="text-danger">*</label>
            <select id="formValidationService" name="aftercare_service_length" class="form-control">
              <option value="">Please Select</option>
              <option value="30" @if($aftercare_service_length == "30") selected @endif>30 Days</option>
              <option value="60" @if($aftercare_service_length == "60") selected @endif>60 Days</option>
              <option value="90" @if($aftercare_service_length == "90") selected @endif>90 Days</option>
            </select>
            @if ($errors->has('aftercare_service_length'))
            <span class="text-danger">{{ $errors->first('aftercare_service_length') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            @php $service_date = old('service_date') ? old('service_date') : $client['service_date']; @endphp
            <label class="form-label" for="formValidationStartDate">Start Date of Service</label><label class="text-danger">*</label>
            <input type="date" id="formValidationStartDate" class="form-control" placeholder="Start Date of Service" name="service_date" value="{{ $service_date }}" />
            @if ($errors->has('service_date'))
            <span class="text-danger">{{ $errors->first('service_date') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $name = old('name') ? old('name') : $client['name']; @endphp
            <label class="form-label" for="formValidationType">Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Name" name="name" value="{{ $name }}" />
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $category = old('category') ? old('category') : $client['category']; @endphp
            <label class="form-label" for="formValidationCategory">Client Category</label><label class="text-danger">*</label>
            <select id="formValidationCategory" name="category" class="form-control">
              <option value="">Please Select</option>
              <option value="Aftercare" @if($category == "Aftercare") selected @endif>Aftercare</option>
              <option value="Home Detox" @if($category == "Home Detox") selected @endif>Home Detox</option>
              <option value="Rehab" @if($category == "Rehab") selected @endif>Rehab</option>
              <option value="RADHA System" @if($category == "RADHA System") selected @endif>RADHA System</option>
            </select>
            @if ($errors->has('category'))
            <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $mobile_no = old('mobile_no') ? old('mobile_no') : $client['mobile_no']; @endphp
            @php $country_code = old('country_code') ? old('country_code') : $client['country_code']; @endphp
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
            @php $type = old('type') ? old('type') : $client['type']; @endphp
            <label class="form-label" for="formValidationType">Client Type</label><label class="text-danger">*</label>
            <select id="formValidationType" name="type" class="form-control">
              <option value="">Please Select</option>
              <option value="Institutional Subclient" @if($type == "Institutional Subclient") selected @endif>Institutional Subclient</option>
              <option value="Direct Client (Added by Us)" @if($type == "Direct Client (Added by Us)") selected @endif>Direct Client (Added by Us)</option>
              <option value="Direct Client (From Website)" @if($type == "Direct Client (From Website)") selected @endif>Direct Client (From Website)</option>
            </select>
            @if ($errors->has('type'))
            <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
          </div>


          <div class="col-md-6">
            @php $note = old('note') ? old('note') : $client['note']; @endphp
            <label class="form-label" for="formValidationBio">Note</label>
            <textarea class="form-control" id="formValidationBio" name="note" rows="3">{{ $note }}</textarea>
          </div>

          <div class="col-md-6">
            @php $sms_service = old('sms_service') ? old('sms_service') : $client['sms_service']; @endphp
            <label class="form-label">Are Sure You Want SMS Service</label><br/>
            <input class="form-check-input" name="sms_service" type="checkbox" value="1" id="inlineRadio1" @if($sms_service == 1) checked @endif/>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>

          <div class="col-md-12">
            @php $disclaimer = old('disclaimer') ? old('disclaimer') : $client['disclaimer']; @endphp
            <input class="form-check-input" name="disclaimer" type="checkbox" value="1" id="inlineRadio2" @if($disclaimer == 1) checked @endif/>
            <label class="form-check-label" for="inlineRadio2">I consent to receiving text messages or emails from Xaftercare. I understand that I can opt out at any time. I assume any and all risks related to the transmission of information by text messages or emails.</label>
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