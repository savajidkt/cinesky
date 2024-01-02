<?php

namespace App\Http\Controllers\Admin\Dashbaord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Director;
use App\Models\Banner;
use App\Models\Homecategory;
use App\Models\Add;
use App\Models\Channel;
use App\Models\Language;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Livechannel;
use App\Models\Tvshow;
use App\Models\Tvepisode;
use App\Models\Serie;
use App\Models\Season;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUsers = Users::count();
        $todayRegisterUsers = Users::whereDate('created_at', today())->count();
        $totalDirectors = Director::count();
        $totalBanners = Banner::count();
        $totalHomecategorys = Homecategory::count();
        $totalAdds = Add::count();
        $totalsGeners=Genre::count();
        $totalsLanguages=Language::count();
        $totalsChannels=Channel::count();
        $totalMovies=Movie::count();
        $totalTvshows=Tvshow::count();
        $totalTvepisodes=Tvepisode::count();
        $totalSeries=Serie::count();
        $totalSeasons=Season::count();
        $totalLivechannels=Livechannel::count();
          return view('admin.dashboard.index',  compact('totalSeasons','totalSeries','totalTvepisodes','totalTvshows','totalLivechannels','totalMovies','totalsChannels','totalsLanguages','totalsGeners','totalAdds','totalUsers', 'todayRegisterUsers', 'totalDirectors','totalBanners','totalHomecategorys'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
