@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Add Group Class</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{route('storeClassSetup')}}" class="row g-3" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            @php $speaker_id = old('speaker_id') ? old('speaker_id') : ''; @endphp
            <label class="form-label" for="formValidationStatus">Speaker</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="speaker_id" class="form-control">
              <option value="">Select Speaker</option>
              @if(!empty($speakers) && count($speakers)>0)
                @foreach($speakers as $speaker)
                  <option value="{{ $speaker->id }}" @if($speaker->id == $speaker_id) selected @endif>{{ $speaker->name }}</option>
                @endforeach
              @endif
            </select>
            @if ($errors->has('speaker_id'))
            <span class="text-danger">{{ $errors->first('speaker_id') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Title</label><label class="text-danger">*</label>
            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}" />
            @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationStatus">Subject</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="subject" class="form-control">
              <option value="">Select Subject</option>
              <option value="Health">Health</option>
              <option value="Relapse Prevention">Relapse Prevention</option>
            </select>
            @if ($errors->has('subject'))
            <span class="text-danger">{{ $errors->first('subject') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Zoom Link</label><label class="text-danger">*</label>
            <input type="text" class="form-control" placeholder="Zoom Link" name="zoomLink" value="{{ old('zoomLink') }}" />
            @if ($errors->has('zoomLink'))
            <span class="text-danger">{{ $errors->first('zoomLink') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Start Date</label><label class="text-danger">*</label>
            <input type="date" class="form-control" placeholder="Start Date" name="start_date" value="{{ old('start_date') }}"/>
            @if ($errors->has('start_date'))
            <span class="text-danger">{{ $errors->first('start_date') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Start Time</label><label class="text-danger">*</label>
            <input type="time" class="form-control" placeholder="Start Time" name="start_time" value="{{ old('start_time') }}"/>
            @if ($errors->has('start_time'))
            <span class="text-danger">{{ $errors->first('start_time') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Duration</label><label class="text-danger">*</label>
            <input type="text" class="form-control" placeholder="Duration" name="duration" value="{{ old('duration') }}"/>
            @if ($errors->has('duration'))
            <span class="text-danger">{{ $errors->first('duration') }}</span>
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