<div class="pagestart page8 p-7">

  <div class="subhead_top">Individual Scores & Implications</div>
  <h2 class="head_top">Embracing Individual Differences</h2>


  <div class="topgraybox">
    <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:50px;"> <img style="max-width:100%; height:auto;"
                src="{{asset('pdf/img/DiffIcon.jpg')}}"
                alt="Bandelli-Associates-Logo 1"
              /> </td>

          <td style="padding-left:14px;">
            <div style="color:#6700AD; font-size:40px;"><b>{{$embracing_individual_differences_per}}%</b></div>
            <div style="background:#EAEBED; border-radius: 25px; height:6px; width:100%;">
              <div style="background:#6700AD; border-radius: 25px; width:{{$embracing_individual_differences_per}}%; height:6px;"></div>
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

  @if($embracing_individual_differences_per <= 33) 
  <ul>
  <li>Be more guarded and hold back from being their true selves at work</li>
  <li>Build teams with people who share similar values and beliefs</li>
  <li>Make assumptions about how their employees want to be treated</li>
  <li>Focus more on performance and productivity than on culture and employee engagement</li>
  <li>Look to drive consensus from team members when solving problems facing the business</li>
  <li>Believe employees perform best when given independence and autonomy</li>

    </ul>

    <div style="background:#6700AD; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p"> Compared to other leaders, your scores suggest that you look to build teams where employees are in alignment and agreement with your approach to doing work. You understand that diversity is important, but it should always be in service of the needs of the business. You prefer working with people who share similar values, opinions, and beliefs. This prevents conflicts from occurring and ensures work is completed in the most efficient manner possible. Your employees value the autonomy you give them, but it can sometimes prevent the team from working together collaboratively. </p>
    <div style="background:#6700AD; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Prefer spending time with people who share their values and beliefs</li>
    <li>Avoid doing things that force them outside their comfort zones</li>
    <li>Have difficulty being themselves around friends and loved ones</li>
    <li>Be comfortable pointing out why the ideas of others might be wrong</li>
    <li>Enjoy sharing their opinions with others even if they are not asked to do so</li>

    </ul>
    @endif

    @if($embracing_individual_differences_per >= 34 && $embracing_individual_differences_per <= 67) 
  <ul>
  <li>Sometimes adjust their communication style to meet the needs of different stakeholders</li>
  <li>Understand the importance of making coworkers feel valued regardless of their backgrounds</li>
  <li>Ensure that there is some diversity on their team</li>
  <li>Build cultures where employees treat each other with dignity and respect</li>
  <li>Look for ways to find common ground between different groups of employees</li>
  <li>Emphasize diplomacy and driving alignment when solving problems with their team</li>

</ul>

    <div style="background:#6700AD; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p"> Compared to other leaders, your scores suggest that you understand the importance of diversity of thought for a team to be successful. You also believe people need to feel comfortable sharing their perspectives in an environment where everyone’s input will be heard. Your steady and predictable demeanor make it rewarding for others to work with you. People can count on you to pay attention to their concerns and look for ways to make the workplace an engaging environment for everyone. </p>
    <div style="background:#6700AD; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Believe it is important to find shared interests with their group of friends</li>
    <li>Appreciate learning new things from people with different backgrounds</li>
    <li>Flex their style to meet the needs of family and different friends in their social circles</li>
    <li>Stick to hobbies and interests within their comfort zones</li>
    <li>Encourage their circle of friends and loved ones to learn new things</li>
    </ul>
    @endif

    @if($embracing_individual_differences_per >= 68 && $embracing_individual_differences_per <=100)
    <ul>
    <li>Have a genuine and authentic communication style when interacting with coworkers</li>
    <li>React favorably to employees who think, act, and behave differently than they do</li>
    <li>Build talented diverse teams with people from various backgrounds and experiences</li>
    <li>Create inclusive cultures where all employees can bring their true selves to work</li>
    <li>Want people to have a positive employee experience while ensuring everyone feels respected and valued</li>
    <li>Believe that a team made up of different types of people leads to diversity of thought</li>
  </ul>


  <div style="background:#6700AD; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Leadership implications</h3>
  <p class="report_p">Compared to other leaders, your scores suggest that you consistently model authenticity for your people and teams. This creates the conditions through which your employees feel comfortable being themselves at work. You regularly maintain a positive attitude, remain patient when challenges surface, and handle adversity with optimism and hope. You are thoughtful and considerate towards people, and your colleagues appreciate the positive impact your actions have on your organization’s culture. You actively encourage people to bring creative and innovative ideas to problems facing the business. This inspires others to think outside the box and work together to find collaborative solutions. </p>

  <div style="background:#6700AD; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Work-Life Implications</h3>
  <p class="report_p">People with similar scores tend to:</p>
  <ul>
  <li>Find themselves surrounded by a diverse group of friends often</li>
  <li>Enjoy learning about the cultures and customs of different types of people</li>
  <li>Be comfortable being themselves around their family and circle of friends</li>
  <li>Take initiative to try new hobbies and activities with others</li>
  <li>Challenge their friends and loved ones to be consistent life-long learners</li>
  </ul>
    @endif
  





  <div class="footerblock">
    <div style="position:relative; width:100%;">  
      <div style="width:130px; position:absolute; top:-144px; right:-15px;"> 
        <img style="max-width:100%; height:auto;"
          src="{{asset('pdf/img/purple_graphics.jpg')}}"
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
        <td> <div class="pagenumber">8</div> </td>

      </tr>
    </table>

  </div>
</div>

<div style="page-break-after: always;"></div>