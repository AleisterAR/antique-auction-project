@extends('master')

@section('content')
    <div class="container mt-4 item-detail-container-box">
        <div class="row">
            @forelse ($items as $item)
                <a class="col-lg-3 d-block col-md-6 mb-4 col-12 cus-card-link-decoration"
                   href="{{ route('user.item.show', $item->id) }}">
                    <div class="card cus-card">
                        <img class="card-img-top cus-card"
                             src="{{ asset('storage/antique/' . $item->image->file_name) }}"
                             alt="Item 1">
                        <div class="card-body cus-card-body">
                            <h5 class="card-title cus-card-title">{{ $item->name }}</h5>
                            @if ($item->auction?->start_time > now())
                                <p>No auction available</p>
                            @else
                                <p class="card-text cus-card-current-bid">Current Bid <br>
                                    <span
                                          class="card-text cus-card-bid-amount">{{ $item->auction?->currentBid?->bid_amount ? '€ ' . $item->auction->currentBid->bid_amount : '-' }}</span>
                                </p>
                                <p class="card-text cus-card-timer">
                                    @if ($item->auction->end_time <= now())
                                        Auction Ended
                                    @else
                                        {{ $item->auction?->end_time ? now()->diffInDays($item->auction->end_time) . ' days left' : '-' }}
                                    @endif
                                </p>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
            {{-- <div class="col-lg-3 col-md-6 mb-4 col-12">
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
            </div> --}}
        </div>
    </div>
    <div class="container mt-4">
        {{ $items->links('vendor.pagination.simple-bootstrap-5') }}
        {{-- <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item"><a class="page-link cus-page-link"
                       href="#"><i class="bi bi-caret-left-fill"></i> Previous</a></li>
                <li class="page-item"><a class="page-link cus-page-link"
                       href="#">1</a></li>
                <li class="page-item"><a class="page-link cus-page-link"
                       href="#">2</a></li>
                <li class="page-item"><a class="page-link cus-page-link"
                       href="#">3</a></li>
                <li class="page-item"><a class="page-link cus-page-link"
                       href="#">Next <i class="bi bi-caret-right-fill"></i></a></li>
            </ul>
        </nav> --}}
    </div>
@endsection
