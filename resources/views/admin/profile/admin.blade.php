@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">My Profile</h5>
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
        <form id="addTemplateForm" method="POST" action="{{ route('updateAdminProfile',$adminDetails['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-12">
            
            <label for="formValidationFile" class="form-label">Profile Pic</label>
            <?php if($adminDetails['image_url']!=''){?>
              <img src="{{ asset($adminDetails['image_url'])}}" alt="<?=$adminDetails['name'];?>" style=" max-width: 100%; height: auto;">
            <?php } ?>
            <input class="form-control" type="file" id="formValidationFile" name="profile">
          </div>

          <div class="col-md-6">
            @php $name = old('name') ? old('name') : $adminDetails['name']; @endphp
            <label class="form-label" for="formValidationName">Name</label><label class="text-danger">*</label>
            <input type="text" id="formValidationName" class="form-control" placeholder="Name of adminDetails" name="name" value="{{ $name }}"/>
            @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $email = old('email') ? old('email') : $adminDetails['email']; @endphp
            <label class="form-label" for="formValidationType">Email ID</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Email ID" name="email" value="{{ $email }}"/>
            @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
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