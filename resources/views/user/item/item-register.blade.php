@extends('master')

@section('content')
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
                            <a class="cus-link l_active"
                               href="#"
                               aria-current="page">HOME</a>
                        </li>
                        <li class="nav-item nav-space">
                            <a class="cus-link"
                               href="#">
                                ABOUT
                            </a>
                        </li>
                        <li class="nav-item dropdown nav-space">
                            <a class="cus-link dropdown-toggle"
                               data-bs-toggle="dropdown"
                               href="#"
                               role="button"
                               aria-expanded="false">
                                AUCTION
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item"
                                       href="#">Action</a></li>
                                <li><a class="dropdown-item"
                                       href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                       href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-space">
                            <a class="cus-link" href="#">CATEGORIES</a>
                        </li>
                        <li class="nav-item nav-space-last">
                            <a class="cus-link" href="#">CONTACT</a>
                        </li>
                        <li class="nav-item nav-space-searchbar">
                            <form class="d-flex pad_for_s_bar"
                                  role="search">
                                <div class="input-group mb-3">
                                    <input class="form-control bg-search-bar"
                                           type="search"
                                           aria-label="Search"
                                           aria-describedby="ba2">
                                    <button class="btn btn-search-bar"
                                            id="ba2"
                                            type="button">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                        @guest
                            <div class="li-sign-in">
                                <button class="btn-cus btn-sign-in"
                                        data-bs-toggle="modal"
                                        data-bs-target="#SignIn"
                                        type="button">
                                    Sign In
                                </button>
                            </div>
                        @endguest
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
                                        <li><a class="dropdown-item"
                                               href="#">Inventory</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action={{ route('user.logout') }} method="POST">
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
    <div class="container form-container-style">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="form-title">Item Registration</h1><br><br>
                <form action={{ route('user.item-register.store') }}
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="i_name"
                               name="name"
                               type="text"
                               placeholder="Item Name"
                               required>
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="creator"
                               name="creator"
                               type="text"
                               placeholder="Creator">
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="year"
                               name="year"
                               type="date"
                               placeholder="Year Created">
                    </div>
                    <div class="mb-3">
                        <select class="form-select-cus"
                                aria-label="Default select example">
                            <option selected>Painting</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class = "form-cus"
                               id="condition"
                               name="condition"
                               type="text"
                               placeholder="Condition">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"
                               for="photo">Image of Antique</label>
                        <input class="form-cus"
                               id="photo"
                               name="antique"
                               type="file">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"
                               for="certificate">Certificate of Authenticity</label>
                        <input class="form-cus"
                               id="certificate"
                               name="certificate"
                               type="file">
                    </div>
                    <div class="mb-3">
                        <textarea class = "form-cus textarea-size"
                                  id="description"
                                  name="description"
                                  type="text"
                                  placeholder="Description"
                                  required></textarea>
                    </div>
                    <div class = "row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><button class="btn-cus btn-submit btn-submit-color"
                                    type="submit">Submit</button></div>
                        <div class="col-md-4"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container first-footer">
            <div class="row">
                <div class="footer-col">
                    <ul>
                        <h4>about</h4>
                        <li>Welcome to our antique and vintage auction house! We have been working for years to provide you
                            with unique furniture, jewelry, fine arts and other antique items. We value these old and
                            fragile pieces of history and do our best to longer their life. We regularly provide our clients
                            with seamless experience, so you could become a happy owner of beautiful objects.
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>get support</h4>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">account</a></li>
                        <li><a href="#">payment methods</a></li>
                        <li><a href="#">refunds</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>contact</h4>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">live chat</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                        <h4>follow us</h4>
                    </ul>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <div class="p-4 pb-0">
                    <section class="p-3 pt-0 container">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-7 col-lg-8 text-start">
                                <span class="footer-brand">Timeless Treasuria.</span>
                                <div class="footer-pp-col">
                                    <span class="footer-pp">All Right Reserved.
                                        <a class="footer-pp-a"
                                           href="#">Privacy Policy</a></span>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 ml-lg-0 text-end s-media-btn">
                                <a class="btn btn-outline-light m-1"
                                   class="text-white"
                                   role="button"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-outline-light m-1"
                                   class="text-white"
                                   role="button"><i class="bi bi-twitter-x"></i></a>
                                <a class="btn btn-outline-light m-1"
                                   class="text-white"
                                   role="button"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </footer>
@endsection
