@extends('layouts.app')
@section('page_title', 'Time Out')
@section('content')
<section class="section small-c">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 general-card">
                <div class="card time-out">
                    <img style="display:none;" src="{{asset('front/assets/img/card.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Session Timeout!</h5>
                        <p class="card-text">You're being timed out. Please contact to administrator.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
