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
        $bid = Bid::select('bid_amount')
            ->where('auction_id', $auction->id)
            ->orderBy('bid_amount', 'desc')
            ->limit(2)
            ->get()
            ->toArray();

        if (empty($bid)) {
            if ($value  < $auction->initial_price) {
                $fail('Your bid must be greater than initial price');
            }
        }

        if (count($bid) === 1) {
            $exceed = ($bid[0]['bid_amount'] - $auction->initial_price) + $bid[0]['bid_amount'];
            if ($value < $exceed) {
                $fail('Your bid must exceed the initial price and current bid by at least $' . $exceed);
            }
        }

        if (count($bid) === 2) {
            $exceed = ($bid[0]['bid_amount'] - $bid[1]['bid_amount']) + $bid[0]['bid_amount'];
            if ($value < $exceed) {
                $fail('Your bid must exceed the initial price and current bid by at least $' . $exceed);
            }
        }
    }
}
