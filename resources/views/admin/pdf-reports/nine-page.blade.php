<div class="pagestart page9 p-7">

  <div class="subhead_top">Individual Scores & Implications</div>
  <h2 class="head_top">Developing Trust</h2>


  <div class="topgraybox">
    <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:50px;"> <img style="max-width:100%; height:auto;"
                src="{{asset('pdf/img/DevelIcon.jpg')}}"
                alt="DevelIcon"
              /> </td>

          <td style="padding-left:14px;">
            <div style="color:#2D63ED; font-size:40px;"><b>{{$developing_trust_per}}%</b></div>
            <div style="background:#EAEBED; border-radius: 25px; height:6px; width:100%;">
              <div style="background:#2D63ED; border-radius: 25px; width:{{$developing_trust_per}}%; height:6px;"></div>
            </div>

            <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="width: 50%; font-size:11px; color:#3D3F42">Low</td>
                  <td style="width: 30%; font-size:11px; color:#3D3F42">Average</td>
                  <td style="text-align:right; font-size:11px; color:#3D3F42">High</td>
                </tr>
            </table>
          </td>
        </tr>
    </table>
  </div>

  <h3 class="report_head">Relational implications</h3>
  <p class="report_p">Leaders with similar scores tend to:</p>
  @if($developing_trust_per <= 33)
  <ul>
  <li>Have difficulty setting aside time to focus on their individual growth and professional development</li>
  <li>Avoid situations where they might be vulnerable in front of colleagues</li>
  <li>Value doing things right and try to set and meet high standards of performance</li>
  <li>Believe employees must earn their trust before being given more job responsibilities</li>
  <li>Have trouble delegating and tend to micromanage their employees’ work</li>
  <li>Be suspicious of others’ intentions and look for signs of betrayal</li>


    </ul>

    <div style="background:#2D63ED; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p"> Compared to other leaders, your scores suggest that you are action-oriented, and others can rely on you to get things done. You have no problem making decisions for your team and you expect your employees to agree with the goals and priorities you set. You are not comfortable showing signs of weakness or asking others for help. This creates a culture where people may be hesitant to take calculated risks for  fear that they will not be able to ask for guidance or support. Once you lose trust in people, it is hard for you to work with them again. </p>
    <div style="background:#2D63ED; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Keep their guard up when building new relationships in their social circles</li>
    <li>Avoid situations where they may have to make commitments to others</li>
    <li>Be inconsistent in the ways they show up to support their loved ones</li>
    <li>Tell friends what they want to hear to preserve the quality of their relationships</li>
    <li>Do things for others more often when they can ensure reciprocity</li>

    </ul>
    @endif

    @if($developing_trust_per >= 34 && $developing_trust_per <= 67) 
    <ul>
    <li>Have a deep understanding of how their values, strengths, and blind spots impact the ways they work with colleagues</li>
    <li>Be comfortable sharing the lessons they have learned along their career journey openly and with vulnerability</li>
    <li>Honor their commitments to coworkers at all levels of the organization</li>
    <li>Have strong morals and operate with a high level of integrity</li>
    <li>Be consistently intentional about investing in their relationships with others</li>
    <li>Believe that building trust with their employees leads to higher levels of communication, collaboration, and teamwork</li>
  </ul>

  <div style="background:#2D63ED; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Leadership implications</h3>
  <p class="report_p">Compared to other leaders, your scores suggest that you are honest with yourself about your strengths and development areas and regularly take action to make improvements. Your employees believe that you have their best interests at heart, and this cultivates their loyalty and commitment to the team. You are consistent in your words and actions on a daily basis regardless of what’s going on around you. This inspires others to work hard and strive to exceed performance expectations. The quality and depth of your relationships at work is a testament to your intentional generosity toward others.</p>

  <div style="background:#2D63ED; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Work-Life Implications</h3>
  <p class="report_p">People with similar scores tend to:</p>
  <ul>
  <li>Have the courage to be vulnerable and share their struggles with friends or family</li>
  <li>Be consistent in how they show up for people in their social circles</li>
  <li>Have friends who often confide in them during difficult times</li>
  <li>TakdfjeBe comfortable having difficult conversations with friends when needed rs</li>
  <li>Take ownership and accountability when they let someone close to<br> them down</li>
  </ul>
    @endif

    @if($developing_trust_per >=68 && $developing_trust_per <=100)
    <ul>

    <li>Have a deep understanding of how their values, strengths, and blind spots impact the ways they work with colleagues</li>
    <li>Be comfortable sharing the lessons they have learned along their career journey openly and with vulnerability</li>
    <li>Honor their commitments to coworkers at all levels of the organization</li>
    <li>Have strong morals and operate with a high level of integrity</li>
    <li>Be consistently intentional about investing in their relationships with others</li>
    <li>Believe that building trust with their employees leads to higher levels of communication, collaboration, and teamwork</li>

  </ul>


  <div style="background:#6700AD; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Leadership implications</h3>
  <p class="report_p"> Compared to other leaders, your scores suggest that you are honest with yourself about your strengths and development areas and regularly take action to make improvements. Your employees believe that you have their best interests at heart, and this cultivates their loyalty and commitment to the team. You are consistent in your words and actions on a daily basis regardless of what’s going on around you. This inspires others to work hard and strive to exceed performance expectations. The quality and depth of your relationships at work is a testament to your intentional generosity toward others.  </p>

  <div style="background:#6700AD; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Work-Life Implications</h3>
  <p class="report_p">People with similar scores tend to:</p>
  <ul style="padding-right:30px;">
  <li>Have the courage to be vulnerable and share their struggles with friends or family</li>
  <li>Be consistent in how they show up for people in their social circles</li>
  <li>Have friends who often confide in them during difficult times</li>
  <li>Be comfortable having difficult conversations with friends when needed</li>
  <li>Take ownership and accountability when they let someone close to them down</li>

  </ul>
    @endif

  <div class="footerblock">
    <div style="position:relative; width:100%;">  
      <div style="width:174px; position:absolute; top:-140px; right:-22px;"> 
        <img style="max-width:100%; height:auto;"
          src="{{asset('pdf/img/Blue_graphics.jpg')}}"
          alt="Bandelli-Associates-Logo 1"
        /> 
      </div>
    </div>

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
        <td> <div class="pagenumber">9</div> </td>

      </tr>
    </table>

  </div>

</div>

<div style="page-break-after: always;"></div>