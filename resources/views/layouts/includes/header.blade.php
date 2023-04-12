
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
        

                <a href="{{route('index.home')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-sm.svg')}}" alt="" height="26"> <span
                            class="logo-txt">Blog App</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse"
                id="horimenu-btn" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" href="{{route('index.task')}}" id="topnav-dashboard"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-home-circle icon"></i>
                                    <span data-key="t-dashboard">Anasayfa</span>
                                </a>
                            </li>
                            
                         @if (auth()->user()->role == 'admin')
                         <li class="nav-item">
                            <a class="nav-link dropdown-toggle arrow-none" href="{{route('index.home')}}" id="topnav-dashboard"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-cog"></i>
                                <span data-key="t-dashboard">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle arrow-none" href="{{route('index.category')}}" id="topnav-category"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bxs-collection"></i>
                                <span data-key="t-dashboard">Kategori</span>
                            </a>
                        </li>

                         @endif
{{--  --}}
                           

                        </ul>
                    </div>
                </nav>
            </div>

        </div>

        <div class="d-flex">
          
          

       

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-3.jpg')}}"
                        alt="Header Avatar">
                    <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                        <span class="user-name">{{Auth::user()->name}}<i class="mdi mdi-chevron-down"></i></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <h6 class="dropdown-header">Hoşgeldin  @if (auth()->user()->role == 'admin')Admin @else Normal Kullanıcı   @endif !</h6>
                  
                  



                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                            class="align-middle">Çıkış</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    
                </div>
            </div>
        </div>
    </div>

    

</header>
