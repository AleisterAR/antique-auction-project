@extends('master')

@section('content')
    <br><br>
    <div class="container item-detail-container-box">
        <div class="row">
            <div class="col-md-8 col-12">
                <h2 class="item-title-detail">
                    Schitterend stadsgezicht met personen
                </h2>
                <img class="item-detail-img img-fluid"
                     src="{{ asset('storage/antique/' . $item->image->file_name) }}"
                     alt="image of antique">
                <br>
            </div>
            <div class="col-md-4 col-12">
                <div class="item-bid-box">
                    @if ((int) $item->auction?->status === 0)
                        <hr>
                        <span class="bid-font3">CURRENTLY, NO ONGOING AUCTION</span>
                        <hr>
                    @endif
                    @if ($item->user_id === auth()->user()->id && (int) $item->auction?->status === 0)
                        <button class="btn btn-start-auction"
                                data-bs-toggle="modal"
                                data-bs-target="#StartAuction"
                                type="button"
                                @disabled($item->status === 0)>Start Auction</button>
                    @endif
                    <div class="@if (!$item->auction || $item->auction?->status === 0) d-none @endif">
                        <span class="bid-font1">CURRENT BID</span>
                        <h1 class="bid-font2"
                            id="current-bid-amount">
                            {{ $currentBid?->bid_amount ? number_format($currentBid->bid_amount ?? 0, $decimals = 0, $decimalSeparator = '.', $thousandsSeparator = ',') . ' €' : 'No current bids' }}
                        </h1>
                        <div class="@if ($item->user_id === auth()->user()->id || $item->auction?->status === 2) d-none @endif"
                             id="bid-container">
                            <br>
                            <input class="form-control bid-input"
                                   id="bid-amount"
                                   type="text"
                                   aria-label="bid"
                                   aria-describedby="ba2"
                                   placeholder="{{ number_format($item->auction?->topFiveBids->first()['bid_amount'] ?? ($item->auction->initial_price ?? 0), $decimals = 0, $decimalSeparator = '.', $thousandsSeparator = ',') . ' €' }} or higher">
                            <button class="btn btn-danger d-flex align-items-center py-3 px-4 mt-3 "
                                    id="place-bid"
                                    type="button"
                                    style="border-radius: 0px">
                                Place bid
                                <div class="spinner-border text-light ms-1 d-none"
                                     role="status"
                                     style="width: 20px; height:20px">
                                    <span class="sr-only">Loading. ..</span>
                                </div>
                            </button>
                        </div>
                        <hr>
                        <h5 class="text-center">
                            @if ($item->auction?->status === 2)
                                <span>Auction Closed</span>
                            @else
                                Closes in <span class="text-sm"
                                      id="close-in">{{ $item->auction?->endTimeFormat() ?? null }}</span>
                        </h5>
                        @endif
                        <hr>
                        <table class="table table-borderless">
                            <tbody id="bid-users">
                                @forelse ($item->auction->topFiveBids ?? [] as $bid)
                                    <tr>
                                        <th class="bid-tr latest-bidder">{{ $bid->user->full_name }}</th>
                                        <th class="bid-tr latest-bidder">{{ $bid->bidDateDiffForHumans() }}</th>
                                        <th class="bid-tr bid-price latest-bidder">
                                            {{ number_format($bid->bid_amount, $decimals = 0, $decimalSeparator = '.', $thousandsSeparator = ',') . ' €' }}
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">
                                            No current bids.
                                        </td>
                                    </tr>
                                @endforelse
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
                        <span class="item-description">{{ $item->name }}</span><br><br>
                        <span class="item-detail-title">Category</span><br>
                        <span class="item-description">Painting</span><br><br>
                        <span class="item-detail-title">Condition</span><br>
                        <span class="item-description">{{ $item->condition }}</span><br><br>
                    </div>
                    <div class="col-md-6">
                        <span class="item-detail-title">Creator</span><br>
                        <span class="item-description">{{ $item->provenance->creator }}</span><br><br>
                        <span class="item-detail-title">Year</span><br>
                        <span class="item-description">{{ $item->provenance->year }}</span><br><br>
                        <span class="item-detail-title">Verification Status</span><br>
                        <span class="item-description">
                            @if ($item->status === 1)
                                Verified <i class="bi bi-check2-circle verified-item-icon"></i>
                            @else
                                Unverified <i class="bi bi-x-circle unverified-item-icon"></i>
                            @endif
                        </span><br><br>
                    </div>
                </div>
                <span class="item-detail-title">Description</span>
                <p class="item-description">The Hague
                    {{ $item->description }}</p>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var $startTime = {!! json_encode($item->auction?->start_time ?? null) !!}
        var $endTime = {!! json_encode($item->auction?->end_time ?? null) !!}
        var $auctionId = {!! json_encode($item->auction?->id ?? null) !!};
        var $topfiveBid = {!! json_encode($item->auction?->topFiveBids ?? null) !!};
        var $currentBid = {!! json_encode($item->auction?->topFiveBids->first()['bid_amount'] ?? ($item->auction->initial_price ?? null)) !!}
    </script>
    @vite('resources/js/front/item-detail.js')
@endsection
