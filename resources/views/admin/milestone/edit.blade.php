@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Milestone</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{route('updateMilestone',$milestone['id'])}}" class="row g-3" enctype="multipart/form-data">@csrf

          <div class="col-md-6">
            @php $title = old('title') ? old('title') : $milestone['title']; @endphp
            <label class="form-label" for="formValidationType">Title</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Title" name="title" value="{{ $title }}" />
            @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $days_no = old('days_no') ? old('days_no') : $milestone['days_no']; @endphp
            <label class="form-label" for="formValidationStatus">Day Number</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="days_no" class="form-control">
              <option value="">Day Number</option>
              <?php for($i=1; $i<=90; $i++){ ?>
              <option value="<?=$i;?>" @if($days_no == $i) selected @endif ><?=(strlen($i)==1)?'0'.$i:$i;?></option>
              <?php } ?>
            </select>
            @if ($errors->has('days_no'))
            <span class="text-danger">{{ $errors->first('days_no') }}</span>
            @endif
          </div>

          @if($milestone['image_url']!='')
          <div class="col-md-4">
            <label class="form-label" for="formValidationType">Award Image</label>
            <input type="file" id="formValidationTitle" class="form-control" name="image_url" />
            @if ($errors->has('image_url'))
            <span class="text-danger">{{ $errors->first('image_url') }}</span>
            @endif
          </div>
          <div class="col-md-2">
            <img src="{{asset($milestone['image_url'])}}" alt="<?=$milestone['title'];?>" style="height: 100px; width: 100%; background: #4F84C4;">
          </div>
          @else
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Award Image</label>
            <input type="file" id="formValidationTitle" class="form-control" name="image_url" />
            @if ($errors->has('image_url'))
            <span class="text-danger">{{ $errors->first('image_url') }}</span>
            @endif
          </div>
          @endif

          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $milestone['status']; @endphp
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