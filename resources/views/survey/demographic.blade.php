@extends('layouts.app')
@section('page_title', 'Demographic Questions')
@section('content')

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 demographic-card">
        <div class="card">
          <h4 class="card-header">Demographic Questions</h4>
          <div class="card-body">
            <form  class="demo-frm" novalidate method="post" enctype="multipart/form-data" action="{{route('demographic-save')}}">
            @csrf
              <div class="row">
                <div class="col-md-12">
                  <h5>What gender do you identify as?</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" {{ old('gender')=='male'? 'checked' : '' }} id="exampleRadios1" value="male" required>
                    <label class="form-check-label" for="exampleRadios1">
                      Male (including transgender men)
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" {{ old('gender')=='female'? 'checked' : '' }} value="female" required>
                    <label class="form-check-label" for="exampleRadios2">
                      Female (including transgender women)
                    </label>
                  </div>
                  <div class="form-check form-check-inline t-com">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" {{ old('gender')=='other'? 'checked' : '' }} value="other" required>
                    <label class="form-check-label" for="exampleRadios3">
                      Other
                    </label>
                  </div>
                  
                </div>
                <div class="col-md-12 mt-3" id="other-opt" style="display:{{old('gender') == 'other' ? 'block' : 'none'}}" >
                  <div class="row">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Prefer to self-describe as</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="other_text" id="other_text" value="{{old('other_text')}}">
                    </div>
                  </div>
                </div>
                @error('gender')
                  <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <h5>What is your age?</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ageRadio1" name="age" {{ old('age')=='20-29'? 'checked' : '' }}  value="20-29" required>
                    <label class="form-check-label" for="ageRadio1">
                      20 – 29 years old
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ageRadio2" name="age"  value="30-39" {{ old('age')=='30-39'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ageRadio2">
                      30 – 39 years old
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ageRadio3" name="age" value="40-49" {{ old('age')=='40-49'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ageRadio3">
                      40 – 49 years old
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ageRadio4" name="age"  value="50-59" {{ old('age')=='50-59'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ageRadio4">
                      50 – 59 years old
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ageRadio5" name="age"  value="60-69" {{ old('age')=='60-69'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ageRadio5">
                      60 – 69 years old
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ageRadio6" name="age"  value="above-69" {{ old('age')=='above-69'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ageRadio6">
                      Above 69 years old
                    </label>
                  </div>
                </div>
                  @error('age')
                  <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <h5>Please specify your ethnicity</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity1" name="ethnicity" id="" {{ old('ethnicity')=='Caucasian'? 'checked' : '' }} value="Caucasian" required>
                    <label class="form-check-label" for="ethnicity1">
                      Caucasian
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity2" name="ethnicity" id="" value="African-American" {{ old('ethnicity')=='African-American'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity2">
                      African-American
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity3" name="ethnicity" id="" value="Latin or Hispanic" {{ old('ethnicity')=='Latin or Hispanic'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity3">
                      Latin or Hispanic
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity4" name="ethnicity" id="" value="Asian" {{ old('ethnicity')=='Asian'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity4">
                      Asian
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity5" name="ethnicity" id="" value="Native American" {{ old('ethnicity')=='Native American'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity5">
                      Native American
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity6" name="ethnicity" id="" value="Native Hawaiian or Pacific Islander" {{ old('ethnicity')=='Native Hawaiian or Pacific Islander'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity6">
                      Native Hawaiian or Pacific Islander
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity7" name="ethnicity" id="" value="Two or More" {{ old('ethnicity')=='Two or More'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity7">
                      Two or More
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="ethnicity8" name="ethnicity" id="" value="Other/Unknown" {{ old('ethnicity')=='Other/Unknown'? 'checked' : '' }} required>
                    <label class="form-check-label" for="ethnicity8">
                      Other/Unknown
                    </label>
                  </div>
                </div>
                @error('ethnicity')
                  <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <h5>Which option below best describes your job level?</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="job_level1" name="job_level" id="" value="Individual contributor" {{ old('ethnicity')=='Caucasian'? 'checked' : '' }} required>
                    <label class="form-check-label" for="job_level1">
                      Individual contributor
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="job_level2" name="job_level" id="" value="Manager" {{ old('job_level')=='Manager'? 'checked' : '' }} required>
                    <label class="form-check-label" for="job_level2">
                      Manager
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="job_level3" name="job_level" id="" value="Director" {{ old('job_level')=='Director'? 'checked' : '' }} required>
                    <label class="form-check-label" for="job_level3">
                      Director
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="job_level4" name="job_level" id="" value="Vice president" {{ old('job_level')=='Vice president'? 'checked' : '' }} required>
                    <label class="form-check-label" for="job_level4">
                      Vice president
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="job_level5" name="job_level" id="" value="Senior vice president" {{ old('job_level')=='Senior vice president'? 'checked' : '' }} required>
                    <label class="form-check-label" for="job_level5">
                      Senior vice president
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="job_level6" name="job_level" id="" value="C-suite role" {{ old('job_level')=='C-suite role'? 'checked' : '' }} required>
                    <label class="form-check-label" for="job_level6">
                      C-suite role
                    </label>
                  </div>
                </div>
                @error('job_level')
                  <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
              </div>



              <hr>

              <div class="row">
                <div class="col-md-12">
                  <h5>How many years have you been in a role leading others?</h5>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="years1" name="years" id="" value="less" {{ old('years')=='less'? 'checked' : '' }} required>
                    <label class="form-check-label" for="years1">
                      Less than a year
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="years2" name="years" id="" value="1-5" {{ old('years')=='1-5'? 'checked' : '' }} required>
                    <label class="form-check-label" for="years2">
                      1-5 years
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="years3" name="years" id="" value="6-10" {{ old('years')=='6-10'? 'checked' : '' }} required>
                    <label class="form-check-label" for="years3">
                      6-10 years
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="years4" name="years" id="" value="10-15" {{ old('years')=='10-15'? 'checked' : '' }} required>
                    <label class="form-check-label" for="years4">
                      10-15 years
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="years5" name="years" id="" value="15" {{ old('years')=='15'? 'checked' : '' }} required>
                    <label class="form-check-label" for="years5">
                      Over 15 years
                    </label>
                  </div>
                </div>
                @error('years')
                  <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                  @enderror
              </div>
              <div class="row mt-4">
                <div class="col-lg-12">
                  <button  class="btn btn-primary" id="demographic-btn">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>



@endsection

@section('page-script')
<script>
  $(function() {
    $('input[name=gender]').change(function() {
      var value = $('input[name=gender]:checked').val();

      if (value == 'other') {
        $('#other-opt').show(1000);
      } else {
        $('#other-opt').hide(1000);
      }

    });
  });

  $('#demographic-btn1').click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var survey_id = $('#survey_id').val();
        $.ajax({
           type:'POST',
           url:"{{route('demographic-save')}}",
           dataType:'json',
           data:{survey_id:survey_id},
           success:function(data){
                var status = data.status
                if( status == 'timeout' )
                {
                    window.location = moduleConfig.redirectUrl
                }
           }

        });
    });

  // $(document).ready(function() {
  //   $(".demo-frm").validate({
  //     rules: {
  //       gender: {
  //         required: true,
  //         minlength: 1
  //       },
  //       age: {
  //         required: true,
  //         minlength: 1
  //       },
  //       ethnicity: {
  //         required: true,
  //         minlength: 1
  //       },
  //       job_level: {
  //         required: true,
  //         minlength: 1
  //       },
  //       years: {
  //         required: true,
  //         minlength: 1
  //       }
  //     }
  //   });
  // });
</script>
@endsection