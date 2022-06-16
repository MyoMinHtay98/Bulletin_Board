<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Bootstrap -->
  {{-- <link href="{{ asset('css/lib/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/lib/bootstrap.min.css') }}" rel="stylesheet"> --}}

  <!-- Script -->
  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <div id="app">
    <nav class="navbar sticky-top navbar-expand navbar-dark bg-primary shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"> Bulletin Board </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            @if(Auth::user() && Auth::user()->type == '0')
            <li class="nav-item">
              <a class="nav-link" href="/user/list">Users</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/post/list">Posts</a>
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a class="nav-link text-right" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @else
            @if(Auth::user()->type == '0')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Create User') }}</a>
            </li>
            @endif
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.profile.show') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </a>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
  @yield('scripts')
</html>