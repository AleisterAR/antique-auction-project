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
    <br><br>
    <div class="container item-detail-container-box">
        <div class="row">
            <div class="col-md-8 col-12">
                <h2 class="item-title-detail">
                    Schitterend stadsgezicht met personen
                </h2>
                <img class="item-detail-img" src="{{asset("temp-image/image1.jpg")}}" alt="">
                <br>
            </div>
            <div class="col-md-4 col-12">
                <div class="item-bid-box">
                    <hr>
                    <span class="bid-font3">CURRENTLY, NO ONGOING AUCTION</span>
                    <hr>
                    <button type="button" class="btn btn-start-auction">Start Auction</button>
                    <div class="d-none">
                        <span class="bid-font1">CURRENT BID</span>
                        <h1 class="bid-font2">€ 850</h1>
                        <br>
                        <input class="form-control bid-input"
                               type="search"
                               aria-label="Search"
                               aria-describedby="ba2"
                               placeholder="€ 950 or higher">
                        <button type="button" class="btn btn-bid">Place bid</button>
                        <hr>
                        <h5 class="text-center">Closes in 9h 29m 15s</h5>
                        <hr>
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th class="bid-tr latest-bidder">User1</th>
                                <th class="bid-tr latest-bidder">1 day ago</th>
                                <th class="bid-tr bid-price latest-bidder">€ 850</th>
                            </tr>
                            <tr>
                                <td class="bid-tr">User2</td>
                                <td class="bid-tr">1 day ago</td>
                                <td class="bid-tr bid-price">€ 625</td>
                            </tr>
                            <tr>
                                <td class="bid-tr">User3</td>
                                <td class="bid-tr">2 day ago</td>
                                <td class="bid-tr bid-price">€ 440</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="row">
                    <div class="col-md-6">
                        <span class="item-detail-title">Name of Antique</span><br>
                        <span class="item-description">Schitterend stadsgezicht met personen</span><br><br>
                        <span class="item-detail-title">Category</span><br>
                        <span class="item-description">Painting</span><br><br>
                        <span class="item-detail-title">Condition</span><br>
                        <span class="item-description">Excellent Condition</span><br><br>
                    </div>
                    <div class="col-md-6">
                        <span class="item-detail-title">Creator</span><br>
                        <span class="item-description">P.G. Vertin</span><br><br>
                        <span class="item-detail-title">Year</span><br>
                        <span class="item-description">1878</span><br><br>
                        <span class="item-detail-title">Verification Status</span><br>
                        <span class="item-description">Verified <i class="bi bi-check2-circle verified-item-icon"></i></span><br><br>
                    </div>
                </div>
                <span class="item-detail-title">Description</span>
                <p class="item-description">The Hague
                    The painter Petrus Gerardus Vertin was born in 1819 in The Hague. He lived and worked mainly in The Hague during his life. Vertin was a student at the Hague Academy of Visual Arts.

                    P.G. Vertin often painted cityscapes (streets), which were not always topographical. His work is notable for its special use of light effects. The light reflections on snow-covered roofs, window frames and sidewalks are beautifully depicted, especially in his winter views.

                    Various cityscapes of Vertin have been painted by the painters
                    C. Rochussen and S.L. Verveer.

                    Paintings by this painter are owned by various museums: including the Centraal Museum in Utrecht and the Hague Municipal Museum.</p>
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
