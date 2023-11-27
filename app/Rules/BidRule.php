<?php

namespace App\Rules;

use App\Models\Auction;
use App\Models\Bid;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class BidRule implements ValidationRule, DataAwareRule
{
    protected $data = [];

    public function __construct()
    {
    }

    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $auction = Auction::select(['id', 'initial_price'])->where('id', $this->data['auction_id'])->first();
        $bid = Bid::select('bid_amount')->where('auction_id', $auction->id)->max('bid_amount');
        if (!((int)$value - ($bid->bid_amount ?? $auction->initial_price) >= 50)) {
            $fail('Your bid must exceed the initial price and current bid by at least $50');
        }
    }
}
