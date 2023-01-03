<header class="theme-header transparent-header">
    <div class="header-navigation navigation-white">
        <div class="nav-overlay"></div>
        <div class="container">
            <div class="primary-menu">
                <div class="site-branding">
                    <a href="{{ route('web.home') }}" class="brand-logo"><img width="140px" src="{{ asset('website/images/logo/logo-1.png') }}" alt="RonInve Logo"></a>
                </div>
                <div class="nav-menu nav-ml-auto">
                    <!-- Navbar logo -->
                    <div class="sidebar-logo">
                        <a href="{{ route('web.home') }}" class="brand-logo"><img width="140px" src="{{ asset('website/images/logo/logo-3.png') }}" alt="RonInve Logo"></a>
                    </div>
                    <!-- Navbar Close -->
                    <div class="navbar-close"><i class="far fa-times"></i></div>
                    <!-- Nav Menu -->
                    <nav class="main-menu">
                        <ul>
                            <li class="menu-item"><a href="{{ route('web.home') }}">Home</a></li>
                            <li class="menu-item"><a href="{{ route('web.about') }}">About Us</a></li>
                            <li class="menu-item"><a href="{{ route('web.service') }}">Service</a></li>
                            <li class="menu-item"><a href="{{ route('web.pricing') }}">Pricing</a></li>
                            <li class="menu-item"><a href="{{ route('web.blog') }}">Blog</a></li>
                            <li class="menu-item"><a href="{{ route('web.contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right-nav">
                    <ul class="d-inline-flex align-items-center">
                        <li class="nav-button"><a href="{{ route('web.register') }}" class="main-btn bordered-btn">Free Trial</a></li>
                        <li class="nav-toggle-btn">
                            <div class="navbar-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
