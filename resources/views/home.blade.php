@extends('layouts.app')
@section('page_title', 'Survey Home')
@section('content')
<section class="section small-c">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 general-card instruction-page">

                <div class="card">
                    <img style="display:none;" src="{{asset('front/assets/img/card.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-img-overlay">
                        <!-- <h5 class="card-title">An interactive assessment tool Built Different</h5> -->
                        <p class="card-text">In the following pages, you will find 22 scenarios describing challenging interpersonal situations leaders face at work. For each scenario, you will be presented with a situation and must decide the best approach to solving the problem being presented.</p>
                        <p class="card-text">Each scenario has five possible response options that you will review and then rank order from 1 (most likely) to 5 (least likely). There will be a drag and drop function to rank your responses. You cannot go back to a previous scenario once you have completed that question, so please choose your responses carefully.</p>
                        <!-- <p class="card-text">
You are a leader of an IT helpdesk response team, where your team's primary function is to help employees of the company with various technical problems. Recently, your manager told you that they are leaving the company soon, and you are ready to be promoted into that managerial role. In preparation of this, there will be three interviews with other managers. What would you do?</p>
                        <p class="card-text">
                        <ul>
                            <li>Reach out to each of the interviewers to introduce yourself and express your excitement about the role. </li>
                            <li>Research the role and the interviewers, and strategically prepare for potential questions that might surface.</li>
                            <li>Ask your manager for their opinion about who they think will be the easiest interviewer.</li>
                            <li>Research other candidates so you know who the competition will be. </li>
                            <li>Do nothing. You are the most experienced person on the team, and you should get the job easily.</li>
                        </ul> -->
                     </p>
                        <p class="card-text"><a href="{{ route('demo-survey') }}" class="btn btn-primary">Try a Sample Question</a></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('page-script')
<script type="text/javascript">
    $( document ).ready( function() {
    });
</script>
@endsection