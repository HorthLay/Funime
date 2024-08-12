<div class="container">
    <nav class="navbar navbar-default navbar-custom">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header logo">
                <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <div id="nav-icon1">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <a href="/"><img class="logo" src="{{asset ("movies/images/logo121.png")}}" alt="" width="119" height="auto"></a>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav flex-child-menu menu-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                   
                </ul>
                <ul class="nav navbar-nav flex-child-menu menu-right">
                            
                    

                 
                

                    @if(Route::has('login'))


                    @auth
            
         <form style="padding: 10px;" method="POST" action="{{ route('logout') }}">
                      @csrf

                      
                      <input style=" margin-top: 10%;border: none;border-radius: 50px;border-color: green;background-color: #ff0000;color: white;padding: 5px 10px;cursor: pointer;" type="submit" value="logout"><br>
                    </form>
          
                  @else<ul class="nav navbar-nav flex-child-menu menu-right">
                    @if (Auth::check() && Auth::user()->user_image)
                        <img class="user-image" src="users/{{ Auth::user()->user_image }}" alt="User Image">
                    @else
                        <img class="user-image" src="img/user.png" alt="Default User Image">
                    @endif
                
                    @if (Auth::check() && Auth::user()->name)
                        <h7 class="user-name">Name: {{ Auth::user()->name }}</h7>
                    @else
                        <h2>Unknown</h2>
                    @endif
                
                    <div class="user-email">
                        <span><i class="fa fa-envelope"></i>{{ Auth::user()->email }}</span>
                    </div>
                
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         Logout
                     </a>
                 
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                        @else
                            <li class="loginLink"><a href="#">LOG IN</a></li>
                            <li class="btn signupLink"><a href="#">SIGN UP</a></li>
                        @endauth
                    @endif
                </ul>
                
                    <li class="loginLink"><a href="#">LOG In</a></li>
                    <li class="btn signupLink"><a href="#">sign up</a></li>
                    @endauth
          
                    @endif
                    
                </ul>
            </div>
        <!-- /.navbar-collapse -->
    </nav>
    
    <!-- top search form -->


    <div class="top-search">
        <form action="{{ url('/search') }}" method="GET" class="row g-3">
            <input type="text" name="search" placeholder="Search for a movie, TV Show or celebrity that you are looking for">
        </form>
    </div>
        {{-- <div class="top-search">
            <form action="{{ url('/search') }}" method="GET" class="row g-3">
                <div class="col-12">
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input style="padding-right: 50%;" type="text" name="search" class="form-control" placeholder="Type a keyword">
                    </div>
                </div>
                <div class="col-md-4">
                    <button style="padding: 5px;color: white;background-color: green;" type="submit" class="btn btn-primary w-100" style="font-weight: 100;">Search</button>
                </div>
            </form>
        </div> --}}

    
</form>
</div>