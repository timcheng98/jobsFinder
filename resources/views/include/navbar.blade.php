
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-light border-bottom shadow-sm " >
  <h5 class="my-0 font-weight-bold" style="margin:0 7rem 0 20rem;font-size:1.7rem"><strong><a href="/">{{config('app.name', 'JobsFinder')}}</a></strong></h5>
  <nav class="col-md-7 col-sm-8">
    <a class="col-md-4 col-sm-4 text-dark" style="font-size:1.3rem" href="/category">Categories</a>
    <a class="col-md-4 col-sm-4 text-dark"  style="font-size:1.3rem"href="#">about</a>
    <a class="col-md-4 col-sm-4 text-dark" style="font-size:1.3rem" href="#">Useful links</a>
    @auth
    <a class="col-md-4 col-sm-4 text-dark" style=";font-size:1.3rem" href="/job/create">Create</a>
    @endauth
  

        
    </nav>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
        @guest
            <a class="nav-link btn btn-outline-info" href="{{ route('login') }}" style="font-size:1rem">Employer</a>
        @if (Route::has('register'))
          <a class="nav-link btn btn-outline-info" href="{{ route('register') }}" style="font-size:1rem;margin-left:1rem">{{ __('Register') }}</a> 
        @endif
        @else
        
            <a id="navbarDropdown" class="nav-link dropdown-toggle " style="font-size:1rem" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" style="font-size:1rem" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
    
        @endguest
</div>

