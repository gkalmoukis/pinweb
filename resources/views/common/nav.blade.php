<!-- Navigation -->
<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container">
        
        <a class="navbar-brand" href="#">
          
        </a>
        <a class="navbar-brand" href="{{ url('/posts') }}">
            <img src="http://placehold.it/50x50?text=logo" class="rounded-circle nav-mobile" alt=""> 
            <span class="nav-pc">PinWeb</span> 
        </a>

        <form action="/search" method="GET" class="form-inline my-2 my-lg-0">
            @csrf
            <input value="{{ old('search') }}" class="form-control mr-sm-2" type="search" placeholder="Search @users or posts" aria-label="Search" name="search">
        </form>

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto ">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li> -->
                @guest
                
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() == '/login' ? 'active' : ''  }} mr-2" href="{{ route('login') }}">Login or sign-up</a>
                </li>
                @else
                
                <li class="nav-item {{ Request::path() == '/profile' ? 'active' : ''  }} mr-2">
                    
                    <a href="/profile/{{ Auth()->id() }}">
                        @if(Auth()->user()->avatar === null)
                            <img src="/images/static/default.png" alt="profile_pic_{{Auth()->user()->name}}" class="avatar nav-mobile">
                        @else
                            <img src="/images/profiles/{{Auth()->user()->avatar}}" alt="profile_pic_{{Auth()->user()->name}}" class="avatar nav-mobile"> 
                        @endif
                        <span class="nav-pc">My profile</span> 
                    </a>
                
                </li>
                @endguest
                <li class="nav-item">
                    <a href="/posts/create" class="btn btn-danger ">
                        <i class="fas fa-plus nav-mobile"></i>
                        <span class="nav-pc">New post</span> 
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

