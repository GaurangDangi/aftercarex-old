@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Template</h5>
      <div class="card-body">
        <form id="editTemplateForm" method="POST" action="{{ route('updateTemplate',$template['id']) }}" class="row g-3" enctype="multipart/form-data">
          @csrf
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">TYPE</label><label class="text-danger">*</label>
              <select id="formValidationType" name="type" class="form-control">
                  <option value="">Select Type</option>
                  <option value="Email" {{$template['type'] == "Email"  ? 'selected' : ''}}>Email</option>
                  <option value="SMS" {{$template['type'] == "SMS"  ? 'selected' : ''}}>SMS</option>
              </select>
              @if ($errors->has('type'))
              <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationTitle">TITLE</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Title" name="title" value="{{$template['title']}}"/>
            @if ($errors->has('title'))
              <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationSequence">SEQUENCE</label><label class="text-danger">*</label>
            <select  id="formValidationSequence" name="sequence" class="form-control">
                <option value="">Select Sequence</option>
                @for ($i = 1; $i <= 30; $i++)
                <option value="{{$i}}" {{$template['sequence'] == $i  ? 'selected' : ''}}>
                    {{$i}}
                </option>
                @endfor
            </select>
            @if ($errors->has('sequence'))
              <span class="text-danger">{{ $errors->first('sequence') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationStatus">Status</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="status" class="form-control">
                <option value="">Select Status</option>
                <option value="1" {{$template['status'] == "1" ? 'selected' : ''}}>Active</option>
                <option value="0" {{$template['status'] == "0" ? 'selected' : ''}}>Inactive</option>
            </select>
            @if ($errors->has('status'))
              <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>

           <div class="col-md-6">
            <label class="form-label" for="formValidationAbuse">Abuse</label><label class="text-danger">*</label>
            <select id="formValidationAbuse" name="abuse" class="form-control">
                <option value="">Select Abuse</option>
                <option value="Drug Abuse"  {{$template['abuse'] == "Drug Abuse" ? 'selected' : ''}}>Drug Abuse</option>
                <option value="Alcohol Abuse"  {{$template['abuse'] == "Alcohol Abuse" ? 'selected' : ''}}>Alcohol Abuse</option>
                <option value="Gambling Addiction"  {{$template['abuse'] == "Gambling Addiction" ? 'selected' : ''}}>Gambling Addiction</option>
            </select>
            @if ($errors->has('abuse'))
              <span class="text-danger">{{ $errors->first('abuse') }}</span>
            @endif
          </div>

          <div class="col-md-12">
            <label class="form-label" for="formValidationContent">CONTENT</label>
            <textarea class="form-control" id="formValidationContent" name="content" rows="10">{{$template['content']}}</textarea>
            @if ($errors->has('content'))
              <span class="text-danger">{{ $errors->first('content') }}</span>
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
@push('script-datatable')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#formValidationContent'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush