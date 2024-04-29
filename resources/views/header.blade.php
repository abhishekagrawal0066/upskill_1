<header>
    <!-- Header Start -->
   <div class="header-area header-transparrent">
       <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{route('home')}}"><img src={{asset("assets/img/logo/logo.png")}} alt=""></a>
                        </div>  
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{route('home')}}">Home</a></li>
                                        <li><a href="{{ url('/job_listing')}}">Find a Jobs </a></li>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single-blog.html">Blog Details</a></li>
                                                <li><a href="elements.html">Elements</a></li>
                                                <li><a href="job_details.html">job Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>          
                            @if (Auth::guest())
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{route('login') }}" class="btn head-btn1">Login</a>
                                <a href="{{ route('register') }}" class="btn head-btn2">Register</a>
                            </div>
                            @else
                            {{ Auth::user()->name }}
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{ route('logout') }}" class="btn head-btn3">Logout</a>
                            </div>
                            @endif
                            <!-- Header-btn -->
                            {{-- @if (Route::has('login'))
                            <div class="header-btn d-none f-right d-lg-block">
                                <a href="{{route('login') }}" class="btn head-btn1">Register</a>
                                <a href="{{ route('register') }}" class="btn head-btn2">Login </a>
                            </div>
                            @endif --}}
                            
                            {{-- @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif
                                @endauth --}}
                            {{-- </div> --}}
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
       </div>
   </div>
    <!-- Header End -->
</header>