<div class="pagestart page7 p-7">

  <div class="subhead_top">Individual Scores & Implications</div>
  <h2 class="head_top">Understanding Others</h2>


  <div class="topgraybox">
    <table style="width: 100%; margin: 0 auto; padding: 0; vertical-align: top" cellpadding="0" cellspacing="0">
        <tr>
          <td style="width:50px;"> <img style="max-width:100%; height:auto;"
                src="{{asset('pdf/img/ChatIcon.jpg')}}"
                alt="Bandelli-Associates-Logo 1"
              /> </td>

          <td style="padding-left:14px;">
            <div style="color:#7FB936; font-size:40px;"><b>{{$understanding_others_per}}%</b></div>
            <div style="background:#EAEBED; border-radius: 25px; height:6px; width:100%;">
              <div style="background:#7FB936; border-radius: 25px; width:{{$understanding_others_per}}%; height:6px;"></div>
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
  @if($understanding_others_per <=33) 
  <ul>
  <li>Be independent and prefer to work alone rather than collaborate with colleagues</li>
  <li>Lack the self-awareness to understand how their emotions impact coworkers</li>
  <li>Be more concerned about making sure tasks are completed than getting to know employees</li>
  <li>Be direct and assertive in getting their ideas heard by colleagues</li>
  <li>Prefer providing direction to employees rather than soliciting their input</li>
  <li>Lack the ability to put themselves in other peoples’ shoes</li>

    </ul>

    <div style="background:#7FB936; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p"> Compared to other leaders, your scores suggest that you prefer to build teams where performance takes precedence over the connections that people have with one another. You don’t mind taking unpopular positions, enforcing standards, or pushing people for results. It’s more important for you to ensure employees understand their roles, duties, and responsibilities than it is to learn about their backgrounds and personal experiences. Because you are not afraid to hold people accountable, others may feel that you lack empathy when it comes to situational circumstances that could interfere with their work. </p>
    <div style="background:#7FB936; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Take and maintain unpopular positions without understanding the emotions of others</li>
    <li>Have the tendency to be difficult for friends to communicate with when conflicts arise</li>
    <li>Assume that people in their social circles share similar values and beliefs</li>
    <li>Prefer being direct and confrontational when friends let them down</li>
    <li>Have little empathy for friends who make mistakes and don’t learn from them</li>

    </ul>
    @endif

    @if($understanding_others_per >= 34 && $understanding_others_per <= 67) 
  <ul>
  <li>Have strong self-awareness and understand how their emotions impact coworkers</li>
  <li>Be easy to get along with and socially appropriate in different team settings</li>
  <li>Understand the emotions of colleagues and empathize with their experiences</li>
  <li>Be active listeners when communicating with people</li>
  <li>Show compassion toward the experiences, beliefs, and attitudes of colleagues</li>
  <li>Be curious and inquisitive when asking questions to get to know others</li>
</ul>

    <div style="background:#7FB936; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>
    <h3 class="report_head">Leadership implications</h3>
    <p class="report_p">Compared to other leaders, your scores suggest that you strike a nice balance between driving performance expectations and getting to know your people. This allows you to maximize the productivity of your team. You pay attention to your team’s work environment and let employees know that you strive to create a climate of engagement and collaboration. You demonstrate this skill when you take time to learn about the talents and capabilities of team members and then find projects or initiatives for them to work on where they will succeed. You’re less concerned with learning about your peoples’ personal lives and prefer to keep boundaries between work and non-work-related activities.</p>
    <div style="background:#7FB936; border-radius: 25px; width:100%; height:3px; margin:30px 0;"></div>
    <h3 class="report_head">Work-Life Implications</h3>
    <p class="report_p">People with similar scores tend to:</p>
    <ul>
    <li>Sometimes have difficulty knowing how their emotions may impact loved ones</li>
    <li>Have no problem playing devil's advocate when friends are discussing problems</li>
    <li>Understand people can think differently and still enjoy the time they spend together</li>
    <li>Look for ways to resolve conflicts with friends before things get out of hand</li>
    <li>Be known for giving honest candid feedback when friends let them down</li>

    </ul>
    @endif

    @if($understanding_others_per >= 68 && $understanding_others_per <=100)
    <ul>
    <li>Have strong self-awareness and understand how their emotions impact coworkers</li>
    <li>Be easy to get along with and socially appropriate in different team settings</li>
    <li>Understand the emotions of colleagues and empathize with their experiences</li>
    <li>Be active listeners when communicating with people</li>
    <li>Show compassion toward the experiences, beliefs, and attitudes of colleagues</li>
    <li>Be curious and inquisitive when asking questions to get to know others</li>
  </ul>

  <div style="background:#7FB936; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Leadership implications</h3>
  <p class="report_p">Compared to other leaders, your scores suggest that you understand your own emotions, the emotions of others, and how to manage emotions effectively. You actively listen to your team members when they are speaking, which creates the psychological safety needed for your people to believe that their thoughts, opinions, and perspectives matter. You have a genuine desire to learn about the backgrounds, history, and lived experiences of your employees. This shows up in how you communicate with others and the frequency in which you do so. You are thoughtful and considerate towards people and your colleagues appreciate the positive impact of your actions on your organization’s culture.</p>

  <div style="background:#7FB936; border-radius: 25px; width:100%; height:2px; margin:30px 0;"></div>


  <h3 class="report_head">Work-Life Implications</h3>
  <p class="report_p">People with similar scores tend to:</p>
  <ul style="padding-right:10px;">
  <li>Know how to use their emotions to strengthen connections with loved ones</li>
  <li>Understand the importance of taking time to get to know new acquaintances</li>
  <li>Prioritize listening to friends when they have problems</li>
  <li>Have a good sense of how to put themselves in others’ shoes</li>
  <li>Create a comfortable and welcoming environment for friends to feel understood</li>
  </ul>
    @endif
 
  <div class="footerblock">
    <div style="position:relative; width:100%;">  
      <div class="r-img1" style="position:absolute; top:-168px; right:-100px;"> 
        <img
          src="{{asset('pdf/img/green_graphics.svg')}}"
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
          <td> <div class="pagenumber">7</div> </td>

        </tr>
    </table>

  </div>
</div>

<div style="page-break-after: always;"></div>