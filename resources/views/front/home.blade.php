@extends('master')

@section('content')
    <div class="masthead2">
        <div class="container">
            <div class="masthead-style">
                <h1 class="boasting-1">
                    Globally Available Items
                </h1>
                <p class="masthead-style2">Antiques from all around the world!</p>
                <a class="btn-cus btn-view-now" href="{{ route('user.item.info') }}">
                    VIEW NOW!
                </a>
            </div>
        </div>
    </div>
    <div class="container mt-4 item-detail-container-box">
        <div class="text-center">
            <p class="featured-font">Featured Auctions</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 col-12">
                <div class="card cus-card">
                    <img src="https://placekitten.com/300/200" class="card-img-top cus-card" alt="Item 1">
                    <div class="card-body cus-card-body">
                        <h5 class="card-title cus-card-title">Francesco Zuccarelli (1702 -1788) - River landscape with shepherds </h5>
                        <p class="card-text cus-card-current-bid">Current Bid <br>
                            <span class="card-text cus-card-bid-amount">€ 1,500</span>
                        </p>
                        <p class="card-text cus-card-timer">
                            1 day left
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 col-12">
                <div class="card cus-card">
                    <img src="https://placekitten.com/300/200" class="card-img-top cus-card" alt="Item 1">
                    <div class="card-body cus-card-body">
                        <h5 class="card-title cus-card-title">Francesco Zuccarelli (1702 -1788) - River landscape with shepherds </h5>
                        <p class="card-text cus-card-current-bid">Current Bid <br>
                            <span class="card-text cus-card-bid-amount">€ 1,500</span>
                        </p>
                        <p class="card-text cus-card-timer">
                            1 day left
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 col-12">
                <div class="card cus-card">
                    <img src="https://placekitten.com/300/200" class="card-img-top cus-card" alt="Item 1">
                    <div class="card-body cus-card-body">
                        <h5 class="card-title cus-card-title">Francesco Zuccarelli (1702 -1788) - River landscape with shepherds </h5>
                        <p class="card-text cus-card-current-bid">Current Bid <br>
                            <span class="card-text cus-card-bid-amount">€ 1,500</span>
                        </p>
                        <p class="card-text cus-card-timer">
                            1 day left
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 col-12">
                <div class="card cus-card">
                    <img src="https://placekitten.com/300/200" class="card-img-top cus-card" alt="Item 1">
                    <div class="card-body cus-card-body">
                        <h5 class="card-title cus-card-title">Francesco Zuccarelli (1702 -1788) - River landscape with shepherds </h5>
                        <p class="card-text cus-card-current-bid">Current Bid <br>
                            <span class="card-text cus-card-bid-amount">€ 1,500</span>
                        </p>
                        <p class="card-text cus-card-timer">
                            1 day left
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="masthead">
        <div class="container">
            <div class="masthead-style">
                <h1 class="boasting-1">
                    Thousands of independent collectors <br>
                    showcasing quality items.
                </h1>
            <a class="btn-cus btn-view-now" href="{{ route('user.item.info') }}">
                VIEW NOW!
            </a>
            </div>
        </div>
    </div>
@endsection
