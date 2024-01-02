<header class="header">
    <h1>Relational Intelligence Assessment</h1>
    @guest
                        @if (Route::has('login'))
                        
                        @endif

                        @else
                            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <img src="http://18.218.17.73/survey/public/assets/img/logout.svg" alt=""> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        
                        @endguest
</header>
