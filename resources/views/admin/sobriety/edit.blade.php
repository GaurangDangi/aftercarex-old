@extends('admin.layouts.app')
@section('panel')
<!-- Content -->
<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Edit Testing</h5>
      <div class="card-body">
        <form id="addTemplateForm" method="POST" action="{{ route('updateSobriety',$sobriety['id']) }}" class="row g-3" enctype="multipart/form-data">@csrf

          <div class="col-md-6">
            @php $title = old('title') ? old('title') : $sobriety['title']; @endphp
            <label class="form-label" for="formValidationService">Title</label><label class="text-danger">*</label>
            <select id="formValidationService" name="title" class="form-control">
              <option value="">Please Select</option>
              <option value="Your General Well Being" @if($title == "Your General Well Being") selected @endif>Your General Well Being</option>
              <option value="Depression, Anxiety and Stress levels" @if($title == "Depression, Anxiety and Stress levels") selected @endif>Depression, Anxiety and Stress levels</option>
              <option value="Mental Strain" @if($title == "Mental Strain") selected @endif>Mental Strain</option>
              <option value="Recovery Determination" @if($title == "Recovery Determination") selected @endif>Recovery Determination</option>
              <option value="Craving Levels" @if($title == "Craving Levels") selected @endif>Craving Levels</option>
            </select>
            @if ($errors->has('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>

          <div class="col-md-6">
            @php $status = old('status') ? old('status') : $sobriety['status']; @endphp
            <label class="form-label" for="formValidationStatus">Status</label><label class="text-danger">*</label>
            <select id="formValidationStatus" name="status" class="form-control">
              <option value="1" @if($status == 1) selected @endif>Active</option>
              <option value="0" @if($status == 0) selected @endif>Inactive</option>
            </select>
            @if ($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>

          <div class="col-md-12">
            @php $rules = old('rules') ? old('rules') : $sobriety['rules']; @endphp
            <label class="form-label" for="formValidationBio">Rules</label>
            <textarea class="form-control" id="formValidationBio" name="rules" rows="3">{{ $rules }}</textarea>
            @if ($errors->has('rules'))
            <span class="text-danger">{{ $errors->first('rules') }}</span>
            @endif
          </div>
          
          <div id="CardSection">
            @if(count($sobriety->questionAns)>0)
            @foreach($sobriety->questionAns as $key => $questionAns)
            <div class="card">
              <div class="card-body">
                @if($key==0)
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                  <div class="dt-buttons"> 
                    <a href="javascript:;" onclick="addMoreCardsection()" class="dt-button create-new btn btn-info" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                    <span class="d-none d-sm-inline-block"><i class="bx bx-plus me-sm-1"></i> Add More</span></a>
                  </div>
                </div>
                @else
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                  <div class="dt-buttons"> 
                    <a href="javascript:;" class="removeCardsection dt-button create-new btn btn-danger" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                    <span class="d-none d-sm-inline-block"><i class="bx bx-trash me-sm-1"></i> Delete</span></a>
                  </div>
                </div>
                @endif

                <div class="col-md-12 mb-4 order-0">
                  <label class="form-label" for="formValidationType">Question</label><label class="text-danger">*</label>
                  <input type="text" id="formValidationTitle" class="form-control" placeholder="Question" name="question[0]" value="{{ old('question.0') }}" />
                  @if ($errors->has('question.0'))
                  <span class="text-danger">{{ $errors->first('question.0') }}</span>
                  @endif
                </div>
                
                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere One</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere One" name="answere_one[0]" value="{{ old('answere_one.0') }}"/>
                    @if ($errors->has('answere_one.0'))
                    <span class="text-danger">{{ $errors->first('answere_one.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_one[0]" value="{{ old('marks_one.0') }}"/>
                    @if ($errors->has('marks_one.0'))
                    <span class="text-danger">{{ $errors->first('marks_one.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Two</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Two" name="answere_two[0]" value="{{ old('answere_two.0') }}"/>
                    @if ($errors->has('answere_two.0'))
                    <span class="text-danger">{{ $errors->first('answere_two.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_two[0]" value="{{ old('marks_two.0') }}"/>
                    @if ($errors->has('marks_two.0'))
                    <span class="text-danger">{{ $errors->first('marks_two.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Three</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Three" name="answere_three[0]" value="{{ old('answere_three.0') }}"/>
                    @if ($errors->has('answere_three.0'))
                    <span class="text-danger">{{ $errors->first('answere_three.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_three[0]" value="{{ old('marks_three.0') }}"/>
                    @if ($errors->has('marks_three.0'))
                    <span class="text-danger">{{ $errors->first('marks_three.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Four</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Four" name="answere_four[0]" value="{{ old('answere_four.0') }}"/>
                    @if ($errors->has('answere_four.0'))
                    <span class="text-danger">{{ $errors->first('answere_four.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_four[0]" value="{{ old('marks_four.0') }}"/>
                    @if ($errors->has('marks_four.0'))
                    <span class="text-danger">{{ $errors->first('marks_four.0') }}</span>
                    @endif
                  </div>
                </div>
                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Five</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Five" name="answere_five[0]" value="{{ old('answere_five.0') }}"/>
                    @if ($errors->has('answere_five.0'))
                    <span class="text-danger">{{ $errors->first('answere_five.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_five[0]" value="{{ old('marks_five.0') }}"/>
                    @if ($errors->has('marks_five.0'))
                    <span class="text-danger">{{ $errors->first('marks_five.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Six</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Six" name="answere_six[0]" value="{{ old('answere_six.0') }}"/>
                    @if ($errors->has('answere_six.0'))
                    <span class="text-danger">{{ $errors->first('answere_six.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_six[0]" value="{{ old('marks_six.0') }}"/>
                    @if ($errors->has('marks_six.0'))
                    <span class="text-danger">{{ $errors->first('marks_six.0') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <div class="card">
              <div class="card-body">
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                  <div class="dt-buttons"> 
                    <a href="javascript:;" onclick="addMoreCardsection()" class="dt-button create-new btn btn-info" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
                    <span class="d-none d-sm-inline-block"><i class="bx bx-plus me-sm-1"></i> Add More</span></a>
                  </div>
                </div>

                <div class="col-md-12 mb-4 order-0">
                  <label class="form-label" for="formValidationType">Question</label><label class="text-danger">*</label>
                  <input type="text" id="formValidationTitle" class="form-control" placeholder="Question" name="question[0]" value="{{ old('question.0') }}" />
                  @if ($errors->has('question.0'))
                  <span class="text-danger">{{ $errors->first('question.0') }}</span>
                  @endif
                </div>
                
                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere One</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere One" name="answere_one[0]" value="{{ old('answere_one.0') }}"/>
                    @if ($errors->has('answere_one.0'))
                    <span class="text-danger">{{ $errors->first('answere_one.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_one[0]" value="{{ old('marks_one.0') }}"/>
                    @if ($errors->has('marks_one.0'))
                    <span class="text-danger">{{ $errors->first('marks_one.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Two</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Two" name="answere_two[0]" value="{{ old('answere_two.0') }}"/>
                    @if ($errors->has('answere_two.0'))
                    <span class="text-danger">{{ $errors->first('answere_two.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_two[0]" value="{{ old('marks_two.0') }}"/>
                    @if ($errors->has('marks_two.0'))
                    <span class="text-danger">{{ $errors->first('marks_two.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Three</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Three" name="answere_three[0]" value="{{ old('answere_three.0') }}"/>
                    @if ($errors->has('answere_three.0'))
                    <span class="text-danger">{{ $errors->first('answere_three.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_three[0]" value="{{ old('marks_three.0') }}"/>
                    @if ($errors->has('marks_three.0'))
                    <span class="text-danger">{{ $errors->first('marks_three.0') }}</span>
                    @endif
                  </div>
                </div>

                <div class="row mb-4 order-0">
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Answere Four</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Four" name="answere_four[0]" value="{{ old('answere_four.0') }}"/>
                    @if ($errors->has('answere_four.0'))
                    <span class="text-danger">{{ $errors->first('answere_four.0') }}</span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="formValidationType">Marks</label>
                    <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_four[0]" value="{{ old('marks_four.0') }}"/>
                    @if ($errors->has('marks_four.0'))
                    <span class="text-danger">{{ $errors->first('marks_four.0') }}</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endif
          </div>
          <div id="newCardSection"></div>
          
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

@push('script')
<script type="text/javascript">
var count = 1;
function addMoreCardsection(){
  var html=`<div class="card removeSection">
    <div class="card-body">
      <div class="dt-action-buttons text-end pt-3 pt-md-0">
        <div class="dt-buttons"> 
          <a href="javascript:;" class="removeCardsection dt-button create-new btn btn-danger" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false">
          <span class="d-none d-sm-inline-block"><i class="bx bx-trash me-sm-1"></i> Delete</span></a>
        </div>
      </div>

      <div class="col-md-12 mb-4 order-0">
        <label class="form-label" for="formValidationType">Question</label><label class="text-danger">*</label>
        <input type="text" id="formValidationTitle" class="form-control" placeholder="Question" name="question[${count}]" />
      </div>
      
      <div class="row mb-4 order-0">
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Answere One</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere One" name="answere_one[${count}]" />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Marks</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_one[${count}]" />
        </div>
      </div>

      <div class="row mb-4 order-0">
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Answere Two</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Two" name="answere_two[${count}]" />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Marks</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_two[${count}]" />
        </div>
      </div>

      <div class="row mb-4 order-0">
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Answere Three</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Three" name="answere_three[${count}]" />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Marks</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_three[${count}]" />
        </div>
      </div>

      <div class="row mb-4 order-0">
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Answere Four</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Four" name="answere_four[${count}]" />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Marks</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_four[${count}]" />
        </div>
      </div>

      <div class="row mb-4 order-0">
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Answere Five</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Five" name="answere_five[${count}]" />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Marks</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_five[${count}]" />
        </div>
      </div>

      <div class="row mb-4 order-0">
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Answere Six</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Answere Six" name="answere_six[${count}]" />
        </div>
        <div class="col-md-6">
          <label class="form-label" for="formValidationType">Marks</label>
          <input type="text" id="formValidationTitle" class="form-control" placeholder="Marks" name="marks_six[${count}]" />
        </div>
      </div>
      
    </div>
  </div>`;
  count++;
  $('#newCardSection').append(html);
}

$(document).on('click', '.removeCardsection', function(e) {
  $(this).closest('.removeSection').remove();
});
</script>
@endpush