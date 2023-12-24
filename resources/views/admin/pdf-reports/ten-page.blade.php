<div class="pagestart page10 p-7">

  <div class="subhead_top">Individual Scores & Implications</div>
  <h2 class="head_top">Cultivating Influence</h2>


  <div class="topgraybox">
    <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:50px;"> <img style="max-width:100%; height:auto;"
                src="{{asset('pdf/img/CulIcon.jpg')}}"
                alt="DevelIcon"
              /> </td>

          <td style="padding-left:14px;">
            <div style="color:#FF8E3A; font-size:40px;"><b>{{$cultivating_influence_per}}%</b></div>
            <div style="background:#EAEBED; border-radius: 25px; height:6px; width:100%;">
              <div style="background:#FF8E3A; border-radius: 25px; width:{{$cultivating_influence_per}}%; height:6px;"></div>
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
  @if($cultivating_influence_per <= 33)
  <ul>
  <li>Believe employees are responsible for their own professional development</li>
  <li>Enjoy giving negative feedback for poor performance</li>
  <li>Value execution and driving results over developing the talents of their team members</li>
  <li>Prefer to have developmental conversations with their people only during annual reviews</li>
  <li>Focus most of their efforts on driving profitable growth for their organizations</li>
  <li>Pursue their goals and objectives before meeting the needs of their people</li>

  </ul>

    <div style="background:#FF8E3A; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p"> Compared to other leaders, your scores suggest that you are competitive and eager to get ahead. You like to take on visible roles in projects and enjoy being in charge. If you are frustrated by a team member’s poor performance, you are not afraid address it with them. Because you don’t have trouble giving negative feedback, it can be intimidating for some of your people, especially if they are new to the team. You understand that helping your people grow is important, but this usually takes a back seat to ensuring performance goals are accomplished. </p>
    <div style="background:#FF8E3A; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Have the tendency to focus on their own priorities before the needs of friends and family</li>
    <li>Avoid situations where loved ones might ask them for guidance or help</li>
    <li>Believe friends and family members do not change once they are stuck in their ways</li>
    <li>Enjoy being around people who are comfortable with the status quo</li>
    <li>Prefer spending time with friends when there is a benefit for them to do so</li>

    </ul>
    @endif

    @if($cultivating_influence_per >=34 && $cultivating_influence_per <= 67) 
    <ul>
    <li>Balance meeting the needs of the business with supporting the growth of their people</li>
    <li>Provide real-time feedback to employees to improve productivity</li>
    <li>Encourage their people to seek out mentors within and outside of the organization</li>
    <li>Be supportive of employees who want to develop and deepen their knowledge, skills, and capabilities</li>
    <li>Look for opportunities to give their people exposure to different areas of the business</li>
    <li>Want employees to feel that their work contributes to the organization’s strategic goals</li>

  </ul>

  <div style="background:#2D63ED; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Leadership implications</h3>
  <p class="report_p"> Compared to other leaders, your scores suggest that you take time to understand your employees’ strengths and development opportunities so you can put them in roles where they will succeed. You are appropriately concerned about the well-being of your employees and alert to changes in morale. You respect others and seek their input on important matters, especially regarding issues that will affect them personally. Your people value the insights and feedback you provide as it helps them  develop and grow. You strive to create a climate where employees on your team have meaning and purpose in the work they do. </p>

  <div style="background:#2D63ED; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Work-Life Implications</h3>
  <p class="report_p">People with similar scores tend to:</p>
  <ul>
  <li>Be perceived as a positive role model by friends and family</li>
  <li>Provide feedback to their loved ones when it is requested</li>
  <li>Understand the importance of providing insights to others so they can grow</li>
  <li>Play an active role in mentoring people they care about</li>
  <li>Balance the time they spend helping others with their own self-care</li>
  </ul>
    @endif

    @if($cultivating_influence_per >= 68 && $cultivating_influence_per <=100)
    <ul>
    <li>Have a strong desire to see their employees become the best versions of themselves</li>
    <li>Intentionally take time to mentor and coach others</li>
    <li>Be proactive in providing consistent feedback to team members</li>
    <li>Adjust their communication style to meet the learning needs of different stakeholders</li>
    <li>Have a genuine desire to see their people develop and grow</li>
    <li>Believe it is their responsibility to be good stewards of the talent in their organizations</li>
  </ul>


  <div style="background:#FF8E3A; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Leadership implications</h3>
  <p class="report_p">Compared to other leaders, your scores suggest that you put people and culture first before driving execution and performance. You create a climate on your team where people actively solicit regular feedback from each other. You have a passion for developing talent and look for opportunities to give your employees roles of increased scale, scope, and responsibility. You do this by recognizing that your team members learn differently from one another, and you adapt and adjust your style to best fit their individual needs. You are open to feedback from colleagues, and this sets the tone for learning in your organization.</p>

  <div style="background:#FF8E3A; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Work-Life Implications</h3>
  <p class="report_p">People with similar scores tend to:</p>
  <ul>
  <li>Want to help friends and family members learn new skills and grow</li>
  <li>Put the needs of those they care about ahead of their own needs</li>
  <li>Give honest candid feedback to friends when they need it</li>
  <li>Look for ways to help loved ones see their full potential</li>
  <li>Value relationships with friends who aspire for continuous development</li>
  </ul>
    @endif
 
  
  <div class="footerblock">
    <div style="position:relative; width:100%;">  
      <div style="width:174px; position:absolute; top:-110px; right:-15px;"> 
        <img style="max-width:100%; height:auto;"
          src="{{asset('pdf/img/orange_graphics.jpg')}}"
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
        <td> <div class="pagenumber">10</div> </td>

      </tr>
    </table>

  </div>

</div>

<div style="page-break-after: always;"></div>