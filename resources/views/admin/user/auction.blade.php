@extends('admin.master')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <a href="{{ route('admin.index') }}" class="admin-back-icon">
                <i class="bi bi-box-arrow-left"></i>
            </a>
            <div class="container-fluid px-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Auctions List</h1>
                        <br>
                    </div>
                    <div class="table-responsive card-body">
                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Current Bid</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($auctions as $auction)
                                <tr>
                                    <td>{{$auction->item->name}}</td>
                                    <td>{{ $auction->start_time }}</td>
                                    <td>{{ $auction->end_time }}</td>
                                    <td>{{ $auction->currentBid->bid_amount ?? '-' }}</td>
                                    <td>{{ $auction->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
