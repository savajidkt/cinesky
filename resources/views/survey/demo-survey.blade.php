@extends('layouts.app')
@section('page_title', 'Take Survey')
@section('content')
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 question-card">
        <div class="card">

          <div class="justify-content-between">
            <!-- <div class="timer-text">
                         Time left : <span id="timer"></span>
                        </div> -->
          </div>

          <div class="error-msg" style="color:red;"></div>
          <div class="question-listing" id="question-listing">
            <div class="multisteps_form_panel step sub-card">
              <p style="color: red;">You will have 40 minutes to complete the assessment. The timer will start after you complete the practice scenario below and click on the “Begin Assessment” button. (Example scenario does NOT count toward your score)</p>
              <h5 class="card-header">You are a leader of an IT helpdesk response team, where your team's primary function is to help employees of the company with various technical problems. Recently, your manager told you that they are leaving the company soon, and you are ready to be promoted into that managerial role. In preparation of this, there will be three interviews with other managers. What would you do?</h5>
              <div class="text-primary mt-3"><strong>Change the order from what you would "Most Likely" do to what you would "Least Likely" do in this scenario.</strong></div>
              <div class="card-body">

                <div class="row">

                  <div class="col-lg-2">
                    <div class="customRadio-l-tag cr-t-m1">Most Likely</div>
                    <div class="customRadio-l-tag cr-t-m2">Likely</div>
                    <div class="customRadio-l-tag cr-t-m3">Neutral</div>
                    <div class="customRadio-l-tag cr-t-m4">Unlikely </div>
                    <div class="customRadio-l-tag cr-t-m5">Least likely</div>
                  </div>

                  <div class="col-lg-10">
                    <div id="sorting-list">

                      <div class="customRadio-sec">

                        <div class="customRadio">
                        <input type="hidden" class="options" name="options[]" value="">
                          <label for="radio1">Reach out to each of the interviewers to introduce yourself and express your excitement about the role.</label>
                        </div>
                      </div>
                      <div class="customRadio-sec">
                        <div class="customRadio">
                        <input type="hidden" class="options" name="options[]" value="">
                          <label for="radio1">Research the role and the interviewers, and strategically prepare for potential questions that might surface.</label>
                        </div>
                      </div>
                      <div class="customRadio-sec">
                        <div class="customRadio">
                        <input type="hidden" class="options" name="options[]" value="">
                          <label for="radio1">Ask your manager for their opinion about who they think will be the easiest interviewer.</label>
                        </div>
                      </div>
                      <div class="customRadio-sec">
                        <div class="customRadio">
                        <input type="hidden" class="options" name="options[]" value="">
                          <label for="radio1">Research other candidates so you know who the competition will be.</label>
                        </div>
                      </div>
                      <div class="customRadio-sec">
                        <div class="customRadio">
                        <input type="hidden" class="options" name="options[]" value="">
                          <label for="radio1">Do nothing. You are the most experienced person on the team, and you should get the job easily.</label>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>


              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-1">
            </div>
            <div class="col-lg-8">
              
            </div>
            <div class="col-lg-3 text-right b-btn-sec">
              <!-- <button type="button" class="btn btn-light" id="prevBtn" onclick="nextPrev(-1)"><i class="bi bi-arrow-left me-1"></i> Back</button> -->
              <button type="button" class="btn btn-transparent r-btn" id="nextBtn" onclick="startSurvey()">Start Assessment <img src="http://18.218.17.73/survey/public/front/assets/img/r-g-arrow.png" alt="arrow"></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@section('page-script')
<script type="text/javascript">
    var moduleConfig = {
        redirectUrl: "{!! route('take-survey') !!}"
    };
    $(document).ready(function() {
      
            $('.multisteps_form_panel').show();
            setInterval(function () {
              new Sortable(document.getElementById('sorting-list'),{
                onUpdate: function (/**Event*/evt) {
                    // same properties as onEnd
                }
            });
              
            }, 2000);
              

    });       
    
  
function startSurvey() {
  window.location = moduleConfig.redirectUrl;
 
}

</script>
@endsection