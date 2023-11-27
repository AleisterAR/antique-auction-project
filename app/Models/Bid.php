<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'auction_id', 'bid_amount', 'bid_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function  bidDateDiffForHumans()
    {
        return Carbon::parse($this->bid_time)->diffForHumans();
    }

    public function auction(){
        return  $this->belongsTo(Auction::class);
    }
}
