<?php

namespace App\Http\Controllers\User;

use App\Events\BidItem;
use App\Http\Controllers\Controller;
use App\Repository\User\BidRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class BidControlller extends Controller
{
    protected $bidRepository;

    public function __construct(BidRepository $bidRepository)
    {
        $this->bidRepository = $bidRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = array_merge($request->only(['auction_id', 'bid_amount']), ['bid_time' => now(), 'user_id' => $request->user()->id]);
            $bid = $this->bidRepository->store($data);
            BidItem::dispatch($bid);
            if ($request->wantsJson()) {
                return response()->json($bid);
            }
        } catch (Throwable $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
