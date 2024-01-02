<?php

use App\Http\Controllers\Admin\Adds\AddsController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Banner\BannersController;
use App\Http\Controllers\Admin\Category\CategorysController;
use App\Http\Controllers\Admin\Channel\ChannelsController;
use App\Http\Controllers\Admin\Company\CompanyController;
use App\Http\Controllers\Admin\Dashbaord\DashboardController;


use App\Http\Controllers\Admin\Admin\AdminsController;


use App\Http\Controllers\Admin\Director\DirectorsController;
use App\Http\Controllers\Admin\Episode\EpisodesController;
use App\Http\Controllers\Admin\Genre\GenresController;
use App\Http\Controllers\Admin\Homecategory\HomecategorysController;
use App\Http\Controllers\Admin\Language\LanguagesController;
use App\Http\Controllers\Admin\Livechannel\LivechannelsController;
use App\Http\Controllers\Admin\Movie\MoviesController;
use App\Http\Controllers\Admin\Plan\PlansController;
use App\Http\Controllers\Admin\Serie\SeriesController;
use App\Http\Controllers\Admin\Season\SeasonsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\Tvepisode\TvepisodesController;
use App\Http\Controllers\Admin\Tvshow\TvshowsController;
// ... rest of the code ...

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




#Admin Routes



Route::resource('admin/login', AdminAuthController::class);
Route::get('admin/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin')->middleware('guest:admin');
Route::post('admin/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('adminLogout');



Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::resource('/dashboard', DashboardController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/admins', AdminsController::class);
    Route::post('/admin/change-status', [AdminsController::class, 'changeStatus'])->name('change-admin-status');
    Route::resource('/directors', DirectorsController::class);
    Route::get('/generate-pdf/{id}', [DirectorsController::class, 'generatePDF'])->name('generate-pdf');
    Route::get('/chart-image/{id}', [DirectorsController::class, 'generateChartImage'])->name('chart-image');
    Route::post('/director/change-status', [DirectorsController::class, 'changeStatus'])->name('change-director-status');
    Route::get('/export/{user}',[DirectorsController::class, 'reportExcelExport'])->name('export');

    Route::resource('/users', UsersController::class);
    Route::post('/users/change-status', [UsersController::class, 'changeStatus'])->name('change-users-status');


    Route::resource('/adds', AddsController::class);
    Route::post('/adds/changedata', [AddsController::class, 'changeStatus'])->name('change-data-status');

    Route::resource('/plans', PlansController::class);
    Route::post('/adds/change-status', [PlansController::class, 'changeStatus'])->name('change-plan-status');

    Route::resource('/banners', BannersController::class);
    Route::post('/banners/change-status', [BannersController::class, 'changeStatus'])->name('change-banner-status');

    Route::resource('/homecategorys', HomecategorysController::class);
    Route::post('/homecategorys/change-status', [HomecategorysController::class, 'changeStatus'])->name('change-homecategory-status');

    Route::resource('/setting', SettingsController::class);
    Route::put('/settings/{setting}/edit', [SettingsController::class, 'edit'])->name('admin.setting.edit');
    Route::put('/setting/{setting}', [SettingsController::class, 'update'])->name('admin.setting.update');

    Route::resource('/languages', LanguagesController::class);
    Route::post('/languages/change-status', [LanguagesController::class, 'changeStatus'])->name('change-language-status');

    Route::resource('/genres', GenresController::class);
    Route::post('/genres/change-status', [GenresController::class, 'changeStatus'])->name('change-genre-status');

    Route::resource('/categorys', CategorysController::class);
    Route::post('/categorys/change-status', [CategorysController::class, 'changeStatus'])->name('change-category-status');

    Route::resource('/channels', ChannelsController::class);
    Route::post('/channels/change-status', [ChannelsController::class, 'changeStatus'])->name('change-channel-status');

    Route::resource('/series', SeriesController::class);
    Route::post('/series/change-status', [SeriesController::class, 'changeStatus'])->name('change-serie-status');

    Route::resource('/seasons', SeasonsController::class);
    Route::post('/seasons/change-status', [SeasonsController::class, 'changeStatus'])->name('change-season-status');

    Route::resource('/tvshows', TvshowsController::class);
    Route::post('/tvshows/change-status', [TvshowsController::class, 'changeStatus'])->name('change-tvshow-status');


    Route::resource('/livechannels', LivechannelsController::class);
    Route::post('/livechannels/change-status', [LivechannelsController::class, 'changeStatus'])->name('change-livechannel-status');

    Route::resource('/movies', MoviesController::class);
    Route::post('/movies/change-status', [MoviesController::class, 'changeStatus'])->name('change-movie-status');

    Route::resource('/episodes', EpisodesController::class);
    Route::post('/episodes/change-status', [EpisodesController::class, 'changeStatus'])->name('change-episode-status');

    Route::resource('/tvepisodes', TvepisodesController::class);
    Route::post('/tvepisodes/change-status', [TvepisodesController::class, 'changeStatus'])->name('change-tvepisode-status');




});

Auth::routes();
// Route::post('/login', [
//     'uses'          => 'App\Http\Controllers\Auth\LoginController@login',
//     'middleware'    => 'checkstatus',
// ]);
# Front Routes
Route::group(['authGrouping' => 'users.auth'], function () {

});