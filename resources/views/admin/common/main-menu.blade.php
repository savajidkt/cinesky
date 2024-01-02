<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="#"><span class="brand-logo" style="display:none;">
                        <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg></span>
                        <h2 class="brand-text" style="color: white;"> <img src="{{asset('app-assets/images/logo/cinesky.png')}}"> Cinesky</h2>
                </a></li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{  url('admin/dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="camera"></i><span class="menu-title text-truncate" data-i18n="Movies">Movies</span></a>
                <ul>
                   <li class=""><a class="d-flex align-items-center" href="{{url('admin/languages')}}"> <i data-feather="circle"></i> &nbsp;Languages</a></li>
                   <li class=""><a class="d-flex align-items-center" href="{{url('admin/genres')}}"> <i data-feather="circle"></i> &nbsp;Genre</a></li>
                   <li class=""><a class="d-flex align-items-center" href="{{url('admin/movies')}}"> <i data-feather="circle"></i> &nbsp;Movie</a></li>
                </ul>
               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="list"></i><span class="menu-title text-truncate" data-i18n="Tv Series">Tv Series</span></a>
                   <ul>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/series')}}"> <i data-feather="circle"></i> &nbsp;Series</a></li>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/seasons')}}"> <i data-feather="circle"></i> &nbsp;Season</a></li>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/episodes')}}"> <i data-feather="circle"></i> &nbsp;Episode List</a></li>
                   </ul>
               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="tv"></i><span class="menu-title text-truncate" data-i18n="Tv Shows">Tv Shows</span></a>
                   <ul>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/channels')}}"> <i data-feather="circle"></i> &nbsp;Tv Channels</a></li>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/tvshows')}}"> <i data-feather="circle"></i> &nbsp;Shows</a></li>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/tvepisodes')}}"> <i data-feather="circle"></i> &nbsp;Episode </a></li>
                   </ul>
               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href=""><i data-feather="tv"></i><span class="menu-title text-truncate" data-i18n="TLive Tv">Live Tv</span></a>
                   <ul>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/categorys')}}"> <i data-feather="circle"></i> &nbsp;Category</a></li>
                      <li class=""><a class="d-flex align-items-center" href="{{url('admin/livechannels')}}"> <i data-feather="circle"></i> &nbsp;Channels</a></li>
                   </ul>
               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/homecategorys')}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home Category">Home Category</span></a>

               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/banners')}}"><i data-feather="image"></i><span class="menu-title text-truncate" data-i18n="Banners">Banners</span></a>

               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/adds')}}"><i data-feather="list"></i><span class="menu-title text-truncate" data-i18n="Adds">Adds</span></a>

               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/users')}}"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="User">Users</span></a>

               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/directors')}}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">Movie Owner</span></a>
               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/plans')}}"><i data-feather="disc"></i><span class="menu-title text-truncate" data-i18n="Subscription Plans">Subscription Plans</span></a>

               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/setting/1/edit')}}"><i data-feather="settings"></i><span class="menu-title text-truncate" data-i18n="Settings">Settings</span></a>

               </li>
               <li class=" nav-item"><a class="d-flex align-items-center" href="{{ url('admin/admins')}}"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Admins">Admins</span></a>
               </li>

        </ul>
    </div>
</div>
