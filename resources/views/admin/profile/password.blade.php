@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Change Password</h5>
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
        <form id="addTemplateForm" method="POST" action="{{ route('changePassword',$adminDetails['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-6">
            <label class="form-label" for="formValidationPassword">Password</label><label class="text-danger">*</label>
            <input type="password" id="formValidationPassword" class="form-control" placeholder="Password" name="password" value="{{ old('confirm') }}"/>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationConfirmPassword">Confirm Password</label><label class="text-danger">*</label>
            <input type="password" id="formValidationConfirmPassword" class="form-control" placeholder="Confirm Password" name="confirm_password" value="{{ old('confirm_password') }}"/>
            @if ($errors->has('confirm_password'))
            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
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