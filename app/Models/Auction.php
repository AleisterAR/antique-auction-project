<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Number;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = ['start_time', 'end_time', 'initial_price', 'user_id', 'item_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function topFiveBids()
    {
        return $this->hasMany(Bid::class)->orderBy('bid_amount', 'desc')->take(5);
    }

    public function currentBid(){
        return $this->hasOne(Bid::class)->orderBy('bid_amount', 'desc');
    }

    public function endTimeFormat()
    {
        $date = Carbon::parse($this->end_time);
        return  $date->format('d/m/Y') . ' ' . $date->format('h:i:s A');
    }
}
