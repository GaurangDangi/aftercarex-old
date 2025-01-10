@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Add Template</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('storeTemplate') }}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-6">
              <label class="form-label" for="formValidationType">TYPE</label><label class="text-danger">*</label>
              <select id="formValidationType" name="type" class="form-control">
                  <option value="">Select Type</option>
                  <option value="Email" {{ old('type') == "Email" ? 'selected' : ''}}>Email</option>
                  <option value="SMS" {{ old('type') == "SMS" ? 'selected' : ''}}>SMS</option>
              </select>
              @if ($errors->has('type'))
              <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
          </div>
          <div class="col-md-6">
            <label class="form-label" for="formValidationTitle">TITLE</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}"/>
            @if ($errors->has('title'))
              <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            <label class="form-label" for="formValidationSequence">SEQUENCE</label><label class="text-danger">*</label>
            <select  id="formValidationSequence" name="sequence" class="form-control">
                <option value="">Select Sequence</option>
                @for ($i = 1; $i <= 90; $i++)
                <option value="{{$i}}" {{ old('sequence') == $i ? 'selected' : ''}}>{{$i}}</option>
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
                <option value="1" {{ old('status') == 1 ? 'selected' : ''}}>Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : ''}}>Inactive</option>
            </select>
            @if ($errors->has('status'))
              <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>
          
          <div class="col-md-6">
            <label class="form-label" for="formValidationAddiction">Addiction</label><label class="text-danger">*</label>
            <select id="formValidationAddiction" name="addiction" class="form-control">
                <option value="">Select Addiction</option>
                <option value="Alcohol Addiction"  {{ old('addiction') == "Alcohol Addiction" ? 'selected' : ''}}>Alcohol Addiction</option>
                <option value="Drug Addiction"  {{ old('addiction') == "Drug Addiction" ? 'selected' : ''}}>Drug Addiction</option>
                <option value="Behavioral Addiction"  {{ old('addiction') == "Behavioral Addiction" ? 'selected' : ''}}>Behavioral Addiction</option>
            </select>
            @if ($errors->has('addiction'))
              <span class="text-danger">{{ $errors->first('addiction') }}</span>
            @endif
          </div>

          <div class="col-md-12">
            <label class="form-label" for="formValidationContent">CONTENT</label><label class="text-danger">*</label>
            <textarea class="form-control" id="formValidationContent" name="content" rows="10">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
              <span class="text-danger">{{ $errors->first('content') }}</span>
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
@push('script-datatable')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#formValidationContent'))
        .catch(error => {
            console.error(error);
        });


$(document).ready(function() {
    $("#formValidationType").on('change',function() {
        $('#formValidationSequence').prop('selectedIndex',0);
        $('#formValidationSequence option:disabled').prop('disabled', false).css('background-color',"");
        var type = $("#formValidationType").val();
        var url = "{{route('getInactiveSequences', ':type')}}";
        url = url.replace(':type', type);

        $.ajax({
            type: 'GET', 
            url : url,
            success : function (data) {
                $.each(data, function(key, val) {
                    $("#formValidationSequence").find("option[value='"+val.sequence+"']").prop("disabled", true).css('background-color',"gray");
                });
            }
        });
    });
});

</script>
@endpush