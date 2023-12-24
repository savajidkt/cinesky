<ul class="timeline ml-50">
  @foreach($recent_activity as $key=>$activity)
  <li class="timeline-item">
    <span class="timeline-point timeline-point-indicator"></span>
    <div class="timeline-event">
      <h6>{{$activity->user->full_name}} submitted a survey </h6>
      <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
          <line x1="16" y1="2" x2="16" y2="6"></line>
          <line x1="8" y1="2" x2="8" y2="6"></line>
          <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg> {{ \Carbon\Carbon::parse($activity->updated_at)->format('m/d/Y  g:i A')}}</p>

    </div>
  </li>
  @endforeach

</ul>