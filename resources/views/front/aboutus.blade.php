@extends('master')
@section('content')
    <div class="container about-us-container">
        <div class="row">
            <div class="col text-center">
                <span class="bid-font2">
                    About
                </span><br><br>
                <span class="about-us-description">
                    At Timeless Treasuria Auctions, we are more than just an online marketplace; we are custodians of history,
                    storytellers of bygone eras, and passionate advocates for the enduring beauty of antiques.
                    With a deep appreciation for the craftsmanship and narratives embedded in each artifact,
                    we have curated a platform where enthusiasts, collectors, and connoisseurs converge to celebrate the
                    rich tapestry of human heritage.
                </span>
            </div>
        </div>
        <br><br>
    </div>
    <div class="lil-bro-be-flexing">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 col-12">
                    <span class="num-font-for-lilbro">
                        {{ $itemCount }}
                    </span><br>
                    <span class="font-for-lilbro">
                        Items Registered
                    </span>
                    <hr class="rizz-line">
                </div>
                <div class="col-md-4 col-12">
                    <span class="num-font-for-lilbro">
                        {{ $auctionCount }}
                    </span><br>
                    <span class="font-for-lilbro">
                        Successful Auctions
                    </span>
                    <hr class="rizz-line">
                </div>
                <div class="col-md-4 col-12">
                    <span class="num-font-for-lilbro">
                        {{ $userCount }}
                    </span><br>
                    <span class="font-for-lilbro">
                        Registered Accounts
                    </span>
                    <hr class="rizz-line">
                </div>
            </div>
        </div>
    </div>
    <div class="container about-us-container">
        <div class="row text-center">
            <div class="col-md-4 col-12">
                <span><i class="bi bi-flag-fill about-us-icons"></i></span><br>
                <span class="about-us-icon-title">
                    Our Goal
                </span>
                <br>
                <span class="smaller-about-us-description">
                    At the heart of our mission is a commitment to preserving and sharing the cultural legacy
                    encapsulated in every piece we feature. From timeless furniture to rare artifacts, our antique
                    auctions bring together a global community of individuals who understand that each item holds a
                    unique chapter of history waiting to be discovered.
                </span>
            </div>
            <div class="col-md-4 col-12">
                <span><i class="bi bi-search about-us-icons"></i></span><br>
                <span class="about-us-icon-title">
                    Unrivaled Expertise
                </span>
                <br>
                <span class="smaller-about-us-description">
                    Backed by a team of seasoned experts and historians, Timeless Treasuria Auctions ensures the
                    authenticity,
                    provenance, and value of every item in our collection. Our dedication to transparency and knowledge
                    sets us apart, offering our clients a trusted and reliable platform to explore, bid, and acquire
                    extraordinary pieces with confidence.
                </span>
            </div>
            <div class="col-md-4 col-12">
                <span><i class="bi bi-hourglass-split about-us-icons"></i></span><br>
                <span class="about-us-icon-title">
                    A Journey Through Time
                </span>
                <br>
                <span class="smaller-about-us-description">
                    Immerse yourself in a captivating journey through time as you explore our diverse collection
                    spanning different periods, cultures, and styles. Whether you are a seasoned collector seeking a
                    rare find or a newcomer enchanted by the allure of antiques, Timeless Treasuria Auctions invites you
                    to embark on a discovery of unparalleled treasures.
                </span>
            </div>
        </div>
    </div>
@endsection
