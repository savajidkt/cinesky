@extends('admin.layout.app')
@section('page_title','Admin Dashboard')
@section('content')
<!-- Dashboard Ecommerce Starts -->
<div>Welcome to {{auth()->user()->name}}</div>
<!-- Dashboard Ecommerce ends -->
<form action="" method="get">
  <div class="row mt-2">

    <div class="col-lg-2 col-md-2 col-12">
      <label>Company</label>
      <select name="company" class="form-control" id="company">
        <option value="">Select Company</option>
        @if ($companies->count())
        @foreach ($companies as $company)
        @php
        if(isset($model->company_id) && $model->company_id == $company->id){
        $selectedCom ='selected';
        }else{
        $selectedCom = $company->id == old('company') ? 'selected' : '';
        }
        @endphp
        <option value="{{ $company->id }}" {{ $selectedCom }}> {{ $company->name }}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="col-lg-2 col-md-2 col-12">
      <label>Project</label>
      <select name="project" class="form-control" id="project">
        <option value="">Select Project</option>
        @if ($projects->count())
        @foreach ($projects as $project)
        @php
        if(isset($model->project_id) && $model->project_id == $project->id){
        $selectedPro ='selected';
        }else{
        $selectedPro = $project->id == old('project') ? 'selected' : '';
        }
        @endphp
        <option value="{{ $project->id }}" {{ $selectedPro }}> {{ $project->name }}</option>
        @endforeach
        @endif
      </select>
    </div>
    <div class="col-lg-2 col-md-3 col-12">
      <label>From Date</label>
      <input type="text" id="from_date" class="form-control flatpickr-disabled-range" placeholder="MM-DD-YYYY" />
    </div>
    <div class="col-lg-2 col-md-3 col-12">
      <label>To Date</label>
      <input type="text" id="to_date" class="form-control flatpickr-disabled-range" placeholder="MM-DD-YYYY" />
    </div>
    <div class="col-lg-2 col-md-3 col-12">
      <label>&nbsp;</label>
      <button type="button" class="mt-2 btn btn-primary mr-1 waves-effect waves-float waves-light filter">Filter</button>
    </div>

  </div>
</form>
<div class="row mt-2">
  <div class="col-lg-6 col-md-6 col-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="card-title">Survey Results</h4>
      </div>
      <div class="card-body p-0">
        <div id="result-chart">
          @include('admin.dashboard.chart')
        </div>
      </div>
    </div>
  </div>

  <!-- Timeline Card -->
  <div class="col-lg-6 col-12">
    <div class="card card-user-timeline timeline-cus-height">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <i data-feather="list" class="user-timeline-title-icon"></i>
          <h4 class="card-title">Recent Activity</h4>
        </div>
      </div>
      <div class="card-body" id="recent-activity">
        @include('admin.dashboard.recent-activity')
      </div>
    </div>
  </div>

</div>

@endsection

@section('extra-script')
<script>
  var disabledRangePickr = $('.flatpickr-disabled-range');
  disabledRangePickr.flatpickr({
      dateFormat: 'm-d-Y',
      disable: [
        {
          from: new Date().fp_incr(2),
          to: new Date().fp_incr(7)
        }
      ]
    });
 
  var goalOverviewChart = null;
  //------------ Goal Overview Chart ------------
  //---------------------------------------------
  function chartView(percentage){
    var $barColor = '#f3f3f3';
    var $trackBgColor = '#EBEBEB';
    var $textMutedColor = '#b9b9c3';
    var $budgetStrokeColor2 = '#dcdae3';
    var $goalStrokeColor2 = '#51e5a8';
    var $strokeColor = '#ebe9f1';
    var $textHeadingColor = '#5e5873';
    var $earningsStrokeColor2 = '#28c76f66';
    var $earningsStrokeColor3 = '#28c76f33';
    var $goalOverviewChart = document.querySelector('#survey-results');
    goalOverviewChartOptions = {
      chart: {
        height: 245,
        type: 'radialBar',
        sparkline: {
          enabled: true
        },
        dropShadow: {
          enabled: true,
          blur: 3,
          left: 1,
          top: 1,
          opacity: 0.1
        }
      },
      colors: [$goalStrokeColor2],
      plotOptions: {
        radialBar: {
          offsetY: -10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '77%'
          },
          track: {
            background: $strokeColor,
            strokeWidth: '50%'
          },
          dataLabels: {
            name: {
              show: false
            },
            value: {
              color: $textHeadingColor,
              fontSize: '2.86rem',
              fontWeight: '600'
            }
          }
        }
      },
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          type: 'horizontal',
          shadeIntensity: 0.5,
          gradientToColors: [window.colors.solid.success],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          stops: [0, 100]
        }
      },
      series: [percentage],
      stroke: {
        lineCap: 'round'
      },
      grid: {
        padding: {
          bottom: 30
        }
      }
    };

    goalOverviewChart = new ApexCharts($goalOverviewChart, goalOverviewChartOptions);
    goalOverviewChart.render();
  }
  chartView("{{$survey_results['percentage']}}");


  $(document).ready(function() {
    $(".filter").click(function() {
      var company = $('#company').val();
      var project = $('#project').val();
      var fromDate = $('#from_date').val();
      var toDate = $('#to_date').val();
      var data = {
          company: company,
          project: project,
          fromDate: fromDate,
          toDate: toDate
        };
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type: 'POST',
        url: "{{route('get-dashboard')}}",
        dataType: 'json',
        data: data,
        success: function(data) {
          if (data.status) {

            goalOverviewChart.destroy();
            chartView(data.survey_results.percentage);
            $('#completed').text(data.survey_results.completed);
            $('#pending').text(data.survey_results.pending);
            $('#recent-activity').html(data.dataActivity);
            
          }
        }
      });
    });


  });
</script>
@endsection('extra-script')