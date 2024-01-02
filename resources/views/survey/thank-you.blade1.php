@extends('layouts.app')
@section('page_title', 'Thank You')
@section('content')
@php
$download =  url('/user/survey-export/'.Auth::user()->id); Auth::user()->id;
@endphp
<section class="section small-c">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 general-card">
                <div class="card">
                    <img style="display:none;" src="{{asset('front/assets/img/card.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Thank you for completing the assessment.</h5>
                        <p class="card-text">One of our team members will reach out to you shortly to schedule your debrief.</p>
                        <!-- <p class="card-text"><a class="btn btn-primary" href="{{ $download }}">Download Survey</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
