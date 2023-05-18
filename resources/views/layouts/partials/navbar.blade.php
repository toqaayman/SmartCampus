<header class="p-3 shadow-sm" style="background-color: white; font-family: 'Roboto', sans-serif;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <!-- Add your logo image to the following src attribute -->
        <img src="{{asset('images/logo.png')}}" alt="Logo" height="50" class="me-2">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-dark">Home</a></li>
        <li><a href="{{ route('home.about') }}" class="nav-link px-2 text-dark">About</a></li>
      </ul>

      @auth
        {{auth()->user()->name}}
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-primary me-2">Logout</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-primary me-2">Login</a>
          <a href="{{ route('register.perform') }}" class="btn btn-primary">Sign-up</a>
        </div>
      @endguest
    </div>
  </div>
</header>