<!-- <script src="{{asset('highcharts.js')}}"></script>
<script src="{{asset('modules/accessibility.js')}}"></script> -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
<div class="pagestart page5">

<div class="page-inner p-7">
  <h2 class="page_head">Overview of Your Results</h2>

  <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
      <tr>
        <td style="text-align:center" class="c-l-r">
		<div class="er-label-r" style="display:none;">
		<span class="er-label-r-text">Establishing Rapport</span>
		<span class="er-label-r-img"><img width="270" height="140" src="http://18.218.17.73/survey/public/pdf/img/yellow-line.svg"></span>
		</div>
        <canvas id="myChart" width="400" height="400" style="background-color:#EAEBED; border-radius:50%;"></canvas>
         
        <!-- <figure class="highcharts-figure">
          <div id="container"></div>
        </figure> -->
        </td>
      </tr>
  </table>

  <p> &nbsp; </p>
  <div style="text-align:center;">
    <span style="width:20px; height:20px; background:#FFCC01; display:inline-block;">&nbsp;</span> <span style="width:20px; height:20px;"> Establishing Rapport </span> 
    <span style="width:20px; height:20px; background:#7FB936; display:inline-block; margin-left:10px;">&nbsp;</span> <span style="width:20px; height:20px; margin-right:10px;"> Understanding Others </span> 
    <span style="width:20px; height:20px; background:#A75FD3; display:inline-block;">&nbsp;</span> <span style="width:20px; height:20px;"> Embracing Individual Differences </span>
  </div>
  <div style="text-align:center; margin-top:10px;">
      <span style="width:20px; height:20px; background:#2D63ED; display:inline-block;">&nbsp;</span> <span style="width:20px; height:20px;"> Developing Trust </span> 
      <span style="width:20px; height:20px; background:#FF8E3A; display:inline-block; margin-left:10px;">&nbsp;</span> <span style="width:20px; height:20px;"> Cultivating Influence </span>
  </div>
  <p> &nbsp; </p>
  
  
  </div>
  

  <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
      <tr>
        <td style="width: 50%;"> 
          <div style="background:#F2F2F2; padding:100px 50px 100px 70px;">
          <p style="font-family: 'Roboto Condensed', sans-serif; font-size:20px; line-height:30px; margin-bottom:4px;">“The five essential skills of Relational Intelligence can be developed and improved over time. Our research has found that when leaders start to consistently practice these skills, they see dramatic improvements in the quality of their relationships with others.”</p>
    <b style="font-family: 'Roboto Condensed', sans-serif; font-size:20px; margin-top:15px;">—Dr. Adam C. Bandelli</b>
          </div>
        </td>
        <td style="padding-left:20px; padding-right:50px; vertical-align: top" valign="top">

          <div class="relating_box">
            <div class="top_box">
            <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <h3 class="headbox">
                  Relational <br>Intelligence
                  </h3>
                </td>
                <td style="text-align:right;">
                  <span style="font-size:13px;">Overall Score:</span><br>
                  <b class="ratbig" style="font-size:36px;">{{$ri_points}}%</b>
                </td>
              </tr>
            </table>
            </div>

            <div class="rat_lines">
              
              <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <div class="text">Establishing Rapport</div>
                  </td>
                  <td>
                    <div class="number">{{$establishing_report_per}}%</div>
                  </td>
                </tr>
              </table>
              
              <div style="background:#EAEBED; border-radius: 25px; height:3px; width:100%;">
                <div style="background:#FFCC01; border-radius: 25px; width:{{$establishing_report_per}}%; height:3px;"></div>
              </div>
              
            </div>

            <div class="rat_lines">
              
              <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <div class="text">Understanding Others</div>
                  </td>
                  <td>
                    <div class="number">{{$understanding_others_per}}%</div>
                  </td>
                </tr>
              </table>
              
              <div style="background:#EAEBED; border-radius: 25px; height:3px; width:100%;">
                <div style="background:#7FB936; border-radius: 25px; width:{{$understanding_others_per}}%; height:3px;"></div>
              </div>
              
            </div>


            <div class="rat_lines">
              
              <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <div class="text">Embracing Individual Differences</div>
                  </td>
                  <td>
                    <div class="number">{{$embracing_individual_differences_per}}%</div>
                  </td>
                </tr>
              </table>
              
              <div style="background:#EAEBED; border-radius: 25px; height:3px; width:100%;">
                <div style="background:#A75FD3; border-radius: 25px; width:{{$embracing_individual_differences_per}}%; height:3px;"></div>
              </div>
              
            </div>

            <div class="rat_lines">
              
              <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <div class="text">Developing Trust</div>
                  </td>
                  <td>
                    <div class="number">{{$developing_trust_per}}%</div>
                  </td>
                </tr>
              </table>
              
              <div style="background:#EAEBED; border-radius: 25px; height:3px; width:100%;">
                <div style="background:#2D63ED; border-radius: 25px; width:{{$developing_trust_per}}%; height:3px;"></div>
              </div>
              
            </div>

            <div class="rat_lines">
              
              <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <div class="text">Cultivating Influence</div>
                  </td>
                  <td>
                    <div class="number">{{$cultivating_influence_per}}%</div>
                  </td>
                </tr>
              </table>
              
              <div style="background:#EAEBED; border-radius: 25px; height:3px; width:100%;">
                <div style="background:#FF8E3A; border-radius: 25px; width:{{$cultivating_influence_per}}%; height:3px;"></div>
              </div>
              
            </div>

          </div>

        </td>
      </tr>
  </table>
  
  
  <div class="p-7">
   <div class="footerblock">

    <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
      <tr>
        <td style="width:140px;"> 
          <div class="flogo">
            <img
              class="Bandelli-Associates-Logo"
              src="{{asset('pdf/img/bandelli-associates-logo-1-1@2x.png')}}"
              alt="Bandelli-Associates-Logo 1"
            />
          </div> 
        </td>
        <td style="border-left:2px solid #ccc; padding-left: 20px;"> 
              <div class="textname">
          Bandelli Relational Intelligence Assessment
          </div> 
        </td>
        <td> &nbsp; </td>
        <td> <div class="pagenumber">5</div> </td>

      </tr>
  </table>

  </div>
  </div>
  
  
  
  
  
  
</div>

<div style="page-break-after: always;"></div>

