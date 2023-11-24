<?php

namespace App\Events;

use App\Models\Auction;
use App\Models\Bid;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BidItem implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(public Bid $bid)
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel
    {
        return new PrivateChannel('bids.' . $this->bid->auction_id);
    }

    public function broadcastWith(): array
    {
        return [
            'current_bid' => $this->bid,
            'topFiveBids' => $this->bid->query()
                ->select(['bid_time', 'bid_amount', 'user_id'])
                ->with([
                    'user' => function ($query) {
                        $query->select('id', 'full_name', 'user_name');
                    }
                ])
                ->orderByDesc('bid_amount')
                ->take(5)
                ->get()
        ];
    }
}
