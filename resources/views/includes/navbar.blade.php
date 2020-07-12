<nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="{{url('/')}}">Nomadz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0 ml-auto " method="get"
        action="{{url('/result/')}}" >
            @csrf
            <input class="form-control mr-sm-2 search-input "
            type="input"
            placeholder="Search" name="search" size="50" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      <ul class="navbar-nav ml-auto">
@guest
<li class="nav-item ">
    <a class="nav-link link-navbar" href="{{url('/login')}}">LOGIN</a>
  </li>
  <li class="nav-item">
    <a class="nav-link link-navbar" href="{{url('/register')}}">SIGN UP</a>
</li>
@endguest

@auth
<li class="nav-item ">
    <a class="nav-link link-navbar" href="{{route('profil')}}">PROFIL</a>
  </li>
  <li class="nav-item ">
      <a class="nav-link link-navbar" href="{{route('profilchart')}}">CHART</a>
    </li>
  <li class="nav-item ">
      <a class="nav-link link-navbar" href="{{route('sell.index')}}">SELL</a>
    </li>
  <li class="nav-item">
    <a class="nav-link link-navbar" href="{{Route('logout')}}">LOGOUT</a>
  </li>
@endauth
      </ul>
    </div>
  </nav>
