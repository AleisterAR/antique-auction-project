<nav class="navbar navbar-expand-xxl nav_ground">
    <div class="container">
        <a class="cus-brand"
           href="#">Timeless Treasuria.</a>
        <button class="cus-toggler cus-toggle-border"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar"
                type="button"
                aria-controls="offcanvasNavbar"
                aria-label="Toggle navigation">
            <span class="cus-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark"
             id="offcanvasNavbar"
             aria-labelledby="offcanvasNavbarLabel"
             tabindex="-1">
            <div class="offcanvas-header">
                <button class="btn-close"
                        data-bs-dismiss="offcanvas"
                        type="button"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-grow-1 pe-3">
                    <li class="nav-item nav-space">
                        <a @class(['cus-link', 'active' => request()->routeIs('home')])
                           href="{{ route('home') }}"
                           aria-current="page">HOME</a>
                    </li>
                    <li class="nav-item nav-space">
                        <a  @class(['cus-link', 'active' => request()->routeIs('aboutus')])
                           href="{{ route('aboutus') }}">
                            ABOUT
                        </a>
                    </li>
                    <li class="nav-item nav-space">
                        <a @class(['cus-link', 'active' => request()->routeIs('user.item.info')])
                           href="{{ route('user.item.info') }}">AUCTIONS</a>
                    </li>
                    <li class="nav-item nav-space dropdown">
                        <button @class(['cus-link cus-link-button dropdown-toggle', 'active' => false ])
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">CATEGORIES</button>

                        <ul class="dropdown-menu dropdown-cus">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </li>
                    <li class="nav-item nav-space-last">
                        <a  @class(['cus-link', 'active' => request()->routeIs('contacts')])
                           href="{{ route('contacts') }}">CONTACT</a>
                    </li>
                    <li class="nav-item nav-space-searchbar">
                        <form class="d-flex pad_for_s_bar"
                              role="search"
                              action="{{ route('user.item.info') }}">
                            <div class="input-group mb-3">
                                <input class="form-control bg-search-bar"
                                       name="search"
                                       type="search"
                                       value="{{ request('search') }}"
                                       aria-label="Search"
                                       aria-describedby="ba2">
                                <button class="btn btn-search-bar"
                                        id="ba2"
                                        type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </li>
                    <div class="li-sign-in">
                        @guest
                            <button class="btn-cus btn-sign-in"
                                    data-bs-toggle="modal"
                                    data-bs-target="#SignIn"
                                    type="button">
                                Sign In
                            </button>
                        @endguest
                    </div>
                    @auth
                        <div class="li-after-sign-in">
                            <div class="dropdown">
                                <button class="btn btn-user-icon dropdown-cus dropdown-toggle"
                                        data-bs-toggle="dropdown"
                                        type="button"
                                        aria-expanded="false">
                                    <i class="bi bi-person-fill"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-cus">
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('user.item.inventory') }}">Inventory</a></li>
                                    <li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('user.item.create') }}">Register New Item</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action={{ route('user.logout') }}
                                              method="POST">
                                            @csrf
                                            <button class="dropdown-item"
                                                    type="submit">Log out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</nav>
