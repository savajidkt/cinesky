@extends('admin.layout.app')
@section('page_title','Admin Dashboard')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/core-dark.css')}}" class="template-customizer-core-css">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tabler-icons.css')}}" class="template-customizer-core-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" integrity="sha512-tpsEzNMLQS7w9imFSjbEOHdZav3/aObSESAL1y5jyJDoICFF2YwEdAHOPdOr1t+h8hTzar0flphxR76pd0V1zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
<!-- Dashboard Ecommerce Starts -->
<div><h2 style="color: black;">Welcom to {{auth()->user()->name}}</h2> </div>



<!-- Dashboard Ecommerce ends -->
<div class="card">
    <div class="card-body" style="background-color: white;">
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-danger">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-users ti-md"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $totalUsers }}</h4>
                  </div>
                  <p class="mb-1">Total Users</p>

                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-warning">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-user-plus ti-md"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $todayRegisterUsers}}</h4>
                  </div>
                  <p class="mb-1">Today Register User</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-success">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-user ti-md"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{$totalDirectors }}</h4>
                  </div>
                  <p class="mb-1">Total Movie Owner</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
              <div class="card card-border-shadow-info">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-2 pb-1">
                    <div class="avatar me-2">
                      <span class="avatar-initial rounded bg-label-info"><i class="ti ti-photo-filled ti-md"></i></span>
                    </div>
                    <h4 class="ms-1 mb-0">{{ $totalBanners }}</h4>
                  </div>
                  <p class="mb-1">Total Banners</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-success"><i class="ti ti-category-filled"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{ $totalHomecategorys }}</h4>
                    </div>
                    <p class="mb-1">Total Home Category</p>

                  </div>
                </div>
              </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-list ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{ $totalsLanguages }}</h4>
                    </div>
                    <p class="mb-1">Total Languages</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-list ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{ $totalsGeners }}</h4>
                    </div>
                    <p class="mb-1">Total Genre</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-success"><i class="ti ti-camera ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{$totalMovies}}</h4>
                    </div>
                    <p class="mb-1">Total Movies</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-device-tv ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{ $totalsChannels }}</h4>
                    </div>
                    <p class="mb-1">Total Tv Channels</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-success">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-default"><i class="ti ti-slideshow ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{$totalTvshows}}</h4>
                    </div>
                    <p class="mb-1">Total Tv Shows</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-danger">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-info"><i class="ti ti-slideshow ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{$totalTvepisodes}}</h4>
                    </div>
                    <p class="mb-1">Total Tv Shows Episode</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-success">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-warning"><i class="ti ti-slideshow ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{$totalSeries}}</h4>
                    </div>
                    <p class="mb-1">Total Series</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-primary">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-success"><i class="ti ti-slideshow ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{$totalSeasons}}</h4>
                    </div>
                    <p class="mb-1">Total Seasons</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-warning">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-info"><i class="ti ti-live-photo ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{$totalLivechannels}}</h4>
                    </div>
                    <p class="mb-1">Total Live Channels</p>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3 mb-4">
                <div class="card card-border-shadow-info">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                      <div class="avatar me-2">
                        <span class="avatar-initial rounded bg-label-danger"><i class="ti ti-stars ti-md"></i></span>
                      </div>
                      <h4 class="ms-1 mb-0">{{ $totalAdds }}</h4>
                    </div>
                    <p class="mb-1">Total Adds</p>

                  </div>
                </div>
              </div>

     </div>
  </div>
</div>


@endsection

