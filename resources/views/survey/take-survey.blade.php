@extends('layouts.app')
@section('page_title', 'Take Survey')
@section('content')
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 question-card">
                <div class="card">

                    <div class="justify-content-between">
                        <div class="timer-text">
                         Time left : <span id="timer"></span>
                        </div>
                    </div>
                    <input type="hidden" name="survey_id" id="survey_id" value="{{ isset($survey->id) ? $survey->id : null }}">
                    <input type="hidden" name="question_sort" id="question_sort" value="no">
                    <div class="error-msg" style="color:red;"></div>
                    <div class="question-listing" id="question-listing"></div>
                    <div class="row mt-4">
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-8">
                    <div class="pc-tagline">Progress: <strong><span id="progress-bar-percentage">{{ isset($percentage) ? $percentage : 0 }}</span>% Complete</strong></div>
                    <div class="progress">
                                  @php
                                      $percentage = isset($percentage) ? $percentage : 0;
                                      $width = "width: ". $percentage."%";
                                  @endphp
                                  <div class="progress-bar bg-success" role="progressbar" style="width: {{$percentage}}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <input type="hidden" name="page" id="page" value="{{$questions}}">
                      </div>
                        <div class="col-lg-3 text-right b-btn-sec">
                            <!-- <button type="button" class="btn btn-light" id="prevBtn" onclick="nextPrev(-1)"><i class="bi bi-arrow-left me-1"></i> Back</button> -->
                            <button type="button" class="btn btn-transparent r-btn" id="nextBtn" onclick="nextPrev(1)">Next Question <img src="http://18.218.17.73/survey/public/front/assets/img/r-g-arrow.png" alt="arrow"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Message</h5>
      </div>
      <div class="modal-body">
      You did not change your answers, are you sure you want to submit?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close">Close</button>
        <button type="button" class="btn btn-primary" id="next_question">Next Question</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
    var moduleConfig = {
        redirectUrl: "{!! route('time-out') !!}"
    };

    $(document).ready(function() {
        configData = {url:configData.url,type:1,questionCnt:'{{$questions}}'}
        first_time_load(configData);

    });
    console.log('{{$survey_time}}');
    let survey_time = '{{ isset($survey_time) ? $survey_time : 40 }}';
    let minutes = Math.floor( survey_time/60 );
    let calculatedMinutes = Math.ceil( survey_time/60 );
    let calculatedMinutesSeconds = calculatedMinutes * 60;
    let remainingSeconds = Math.abs(parseInt(survey_time) - parseInt(calculatedMinutesSeconds));
    document.getElementById('timer').innerHTML =  (40 - calculatedMinutes) + ":" + remainingSeconds;

startTimer();
function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  if(m<0){
    return
  }

  document.getElementById('timer').innerHTML =
    m + ":" + s;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var survey_id = $('#survey_id').val();
        // $.ajax({
        //    type:'POST',
        //    url:"{{route('update-survey-time')}}",
        //    dataType:'json',
        //    data:{survey_id:survey_id},
        //    success:function(data){
        //         var status = data.status
        //         if( status == 'timeout' )
        //         {
        //             window.location = moduleConfig.redirectUrl
        //         }
        //    }

        // });
  setTimeout(startTimer, 1000);

}
function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
// window.addEventListener('beforeunload', (event) => {
//   event.preventDefault();
//   event.returnValue = '';
// });
</script>
@endsection