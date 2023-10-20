@extends('master')

@section('content')
    <nav class="navbar navbar-expand-lg nav_ground">
        <div class="container">
            <a class="cus-brand" href="#">Timeless Treasuria.</a>
            <button class="cus-toggler cus-toggle-border" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="cus-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="cus-link l_active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="cus-link" href="#">
                                ABOUT
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="cus-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                AUCTION
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="cus-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                    <form class="d-flex pad_for_s_bar" role="search">
                        <div class="input-group mb-3">
                            <input class="form-control bg-search-bar" type="search" aria-label="Search"
                                aria-describedby="ba2">
                            <button class="btn btn-search-bar" type="button" id="ba2">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <div class="container form-container-style">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="form-title">Item Registration</h1><br><br>
                <form action={{ route('user.item-register.store') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="i_name" placeholder="Item Name" name="name"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="creator" placeholder="Creator" name="creator"
                            required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class = "form-cus" id="year" placeholder="Year Created" name="year"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Image of Antique</label>
                        <input class="form-cus" type="file" name="photo" id="photo">
                    </div>
                    <div class="mb-3">
                        <label for="certificate" class="form-label">Certificate of Authenticity</label>
                        <input class="form-cus" type="file" name="certificate" id="certificate">
                    </div>
                    <div class="mb-3">
                        <textarea type="text" class = "form-cus textarea-size" id="description" placeholder="Description"
                            name="description" required></textarea>
                    </div>
                    <div class = "row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center"><button type="submit"
                                class="btn-submit btn-submit-color">Submit</button></div>
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
                                        <a class="footer-pp-a" href="#">Privacy Policy</a></span>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 ml-lg-0 text-end s-media-btn">
                                <a class="btn btn-outline-light m-1" class="text-white" role="button"><i
                                        class="bi bi-facebook"></i></a>
                                <a class="btn btn-outline-light m-1" class="text-white" role="button"><i
                                        class="bi bi-twitter-x"></i></a>
                                <a class="btn btn-outline-light m-1" class="text-white" role="button"><i
                                        class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </footer>
@endsection
