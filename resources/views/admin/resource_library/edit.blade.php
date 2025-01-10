@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Resource</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{route('updateResourceLibrary',$response_library['id'])}}" class="row g-3" enctype="multipart/form-data">
          @csrf

          <div class="col-md-6">
            @php $type = old('type') ? old('type') : $response_library['type']; @endphp
            <label class="form-label" for="formValidationService">Type</label><label class="text-danger">*</label>
            <select id="formValidationService" name="type" class="form-control">
              <option value="">Please Select</option>
              <option value="Article" @if($type == "Article") selected @endif>Article</option>
              <option value="Video" @if($type == "Video") selected @endif>Video</option>
            </select>
            @if ($errors->has('type'))
            <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $title = old('title') ? old('title') : $response_library['title']; @endphp
            <label class="form-label" for="formValidationType">Title</label><label class="text-danger">*</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Title" name="title" value="{{ $title }}" />
            @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>

          {{-- <div class="col-md-12">
            @php $short_description = old('short_description') ? old('short_description') : $response_library['short_description']; @endphp
            <label class="form-label" for="formValidationBio">Short Discription</label>
            <textarea class="form-control" id="formValidationBio" name="short_description" rows="3">{{ $short_description }}</textarea>
          </div> --}}

          <div class="col-md-12">
            @php $description = old('description') ? old('description') : $response_library['description']; @endphp
            <label class="form-label" for="formValidationBio">Discription</label>
            <textarea class="form-control" id="formValidationBio" name="description" rows="3">{{ $description }}</textarea>
          </div>

          @if($response_library['thumbnail']!='')
          <div class="col-md-4">
            <label class="form-label" for="formValidationType">Thumbnail</label>
            <input type="file" id="formValidationTitle" class="form-control" name="thumbnail" />
            @if ($errors->has('thumbnail'))
            <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
            @endif
          </div>
          <div class="col-md-2">
            <img src="{{asset($response_library['thumbnail'])}}" alt="<?=$response_library['title'];?>" style="height: 100px; width: 100%; background: #4F84C4;">
          </div>
          @else
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Thumbnail</label>
            <input type="file" id="formValidationTitle" class="form-control" name="thumbnail" />
            @if ($errors->has('thumbnail'))
            <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
            @endif
          </div>
          @endif

          @if($response_library['pdfUrl']!='')
          <div class="col-md-4">
            <label class="form-label" for="formValidationType">Upload PDF</label>
            <input type="file" id="formValidationTitle" class="form-control" name="pdfUrl" />
            @if ($errors->has('pdfUrl'))
            <span class="text-danger">{{ $errors->first('pdfUrl') }}</span>
            @endif
          </div>
          <div class="col-md-2">
            <a href="{{asset($response_library['pdfUrl'])}}" target="_blank"><i class="fas fa-newspaper" style="font-size: 6rem;"></i></a>
          </div>
          @else
          <div class="col-md-6">
            <label class="form-label" for="formValidationType">Upload PDF</label>
            <input type="file" id="formValidationTitle" class="form-control" name="pdfUrl" />
            @if ($errors->has('pdfUrl'))
            <span class="text-danger">{{ $errors->first('pdfUrl') }}</span>
            @endif
          </div>
          @endif

          <div class="col-md-6">
            @php $external_link = old('external_link') ? old('external_link') : $response_library['external_link']; @endphp
            <label class="form-label" for="formValidationType">External Link</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="External Link" name="external_link" value="{{ $external_link }}" />
            @if ($errors->has('external_link'))
            <span class="text-danger">{{ $errors->first('external_link') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $author = old('author') ? old('author') : $response_library['author']; @endphp
            <label class="form-label" for="formValidationType">Author</label>
            <input type="text" id="formValidationTitle" class="form-control" placeholder="Author" name="author" value="{{ $author }}" />
            @if ($errors->has('author'))
            <span class="text-danger">{{ $errors->first('author') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $role = old('role') ? old('role') : $response_library['role']; @endphp
            <label class="form-label" for="formValidationCategory">Role</label><label class="text-danger">*</label>
            <select id="formValidationCategory" name="role" class="form-control">
              <option value="">Please Select</option>
              <option value="Client" @if($role == "Client") selected @endif>Client</option>
              <option value="Institution" @if($role == "Institution") selected @endif>Institution</option>
              <option value="Mentor" @if($role == "Mentor") selected @endif>Mentor</option>
              <option value="Speaker" @if($role == "Speaker") selected @endif>Speaker</option>
            </select>
            @if ($errors->has('role'))
            <span class="text-danger">{{ $errors->first('role') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $category = old('category') ? old('category') : $response_library['category']; @endphp
            <label class="form-label" for="formValidationCategory">Category</label><label class="text-danger">*</label>
            <select id="formValidationCategory" name="category" class="form-control">
              <option value="">Please Select</option>
              <option value="Popular on Xaftercare" @if($category == "Popular on Xaftercare") selected @endif>Popular on Xaftercare</option>
              <option value="Substance Abuse" @if($category == "Substance Abuse") selected @endif>Substance Abuse</option>
              <option value="Behavioral Addictions" @if($category == "Behavioral Addictions") selected @endif>Behavioral Addictions</option>
              <option value="Sober Success Stories" @if($category == "Sober Success Stories") selected @endif>Sober Success Stories</option>
              <option value="Coping with Cravings" @if($category == "Coping with Cravings") selected @endif>Coping with Cravings</option>
              <option value="Personal Growth" @if($category == "Personal Growth") selected @endif>Personal Growth</option>
              <option value="Coping Strategies" @if($category == "Coping Strategies") selected @endif>Coping Strategies</option>
              <option value="Relapse Prevention" @if($category == "Relapse Prevention") selected @endif>Relapse Prevention</option>
              <option value="Mindfulness and Meditation" @if($category == "Mindfulness and Meditation") selected @endif>Mindfulness and Meditation</option>
              <option value="Holistic Healing" @if($category == "Holistic Healing") selected @endif>Holistic Healing</option>
              <option value="Mindset and Motivation" @if($category == "Mindset and Motivation") selected @endif>Mindset and Motivation</option>
              <option value="Self Compassion and Forgiveness" @if($category == "Self Compassion and Forgiveness") selected @endif>Self Compassion and Forgiveness</option>
            </select>
            @if ($errors->has('category'))
            <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $response_library['status']; @endphp
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
            @php $popular = old('popular') ? old('popular') : $response_library['popular']; @endphp
            <label class="form-label">Popular</label><br/>
            <input class="form-check-input" name="popular" type="checkbox" value="1" id="inlineRadio1" @if($popular == 1) checked @endif/>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
          </div>

          {{-- @if(!empty($response_library->multipleImages) && count($response_library->multipleImages)>0)
          <div class="col-md-12">
            <div class="row">
              @foreach($response_library->multipleImages as $images)
              <div class="col-md-2">
                <img src="{{asset($images['image_url'])}}" alt="<?=$response_library['title'];?>" style="height: 100px; width: 100%; background: #4F84C4;">
              </div>
              @endforeach
            </div>
          </div>
          @endif
          
          @php $class_multiple = (!empty($response_library->multipleImages) && count($response_library->multipleImages)>0)?"col-md-12" : "col-md-6"; @endphp
          <div class="{{$class_multiple}}">
            <label class="form-label" for="formValidationType">Multiple Images</label>
            <input type="file" id="formValidationTitle" class="form-control" name="image_url[]" multiple/>
            @if ($errors->has('image_url'))
            <span class="text-danger">{{ $errors->first('image_url') }}</span>
            @endif
          </div> --}}

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