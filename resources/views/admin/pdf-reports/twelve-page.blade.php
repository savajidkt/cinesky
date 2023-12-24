<div class="pagestart page12 custom-p-7">

  <h2 class="page_head" style="margin-bottom:20px;">Relational Derailer Dimension Scores</h2>




      @if($lacking_self_awareness_per <=49)
        @include('admin.pdf-reports.content.lacking-self-awareness-low')
      @endif

      @if($lacking_self_awareness_per >=50 && $lacking_self_awareness_per <= 79)
        @include('admin.pdf-reports.content.lacking-self-awareness-moderate')
      @endif

      @if($lacking_self_awareness_per >=80  && $lacking_self_awareness_per <=100)
          @include('admin.pdf-reports.content.lacking-self-awareness-high')
      @endif


      @if($lacking_social_awareness_per <=49)
       @include('admin.pdf-reports.content.lacking-social-awareness-low')
      @endif

      @if($lacking_social_awareness_per >=50 && $lacking_social_awareness_per <=79)
        @include('admin.pdf-reports.content.lacking-social-awareness-moderate')
      @endif

      @if($lacking_social_awareness_per >=80 && $lacking_social_awareness_per <=100)
        @include('admin.pdf-reports.content.lacking-social-awareness-high')
      @endif

      @if($self_serving_per <=49)
       @include('admin.pdf-reports.content.self-serving-low')
      @endif

      @if($self_serving_per >=50 && $self_serving_per <=79)
        @include('admin.pdf-reports.content.self-serving-moderate')
      @endif

      @if($self_serving_per >=80 && $self_serving_per <=100)
        @include('admin.pdf-reports.content.self-serving-high')
      @endif

      @if($breaking_trust_per <=49)
       @include('admin.pdf-reports.content.breaking-trust-low')
      @endif

      @if($breaking_trust_per >=50 && $breaking_trust_per <= 79)
        @include('admin.pdf-reports.content.breaking-trust-moderate')
      @endif

      @if($breaking_trust_per >=80 && $breaking_trust_per <=100)
        @include('admin.pdf-reports.content.breaking-trust-high')
      @endif

      @if($poor_management_of_emotions_per <=49)
       @include('admin.pdf-reports.content.poor-management-low')
      @endif

      @if($poor_management_of_emotions_per >=50 && $poor_management_of_emotions_per <=79)
        @include('admin.pdf-reports.content.poor-management-moderate')
      @endif

      @if($poor_management_of_emotions_per >=80 && $poor_management_of_emotions_per <=100)
        @include('admin.pdf-reports.content.poor-management-high')
      @endif


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
        <td> <div class="pagenumber">12</div> </td>

      </tr>
  </table>

  </div>
</div>

<div style="page-break-after: always;"></div>