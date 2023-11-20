<?php

namespace App\Http\Controllers\user;

use Throwable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repository\User\ItemRepository;
use App\Repository\User\ProvenanceRepository;

class ItemController extends Controller
{
    protected $itemRepository;
    protected $provenanceRepository;

    public function __construct(ItemRepository $itemRepository, ProvenanceRepository $provenanceRepository)
    {
        $this->itemRepository = $itemRepository;
        $this->provenanceRepository = $provenanceRepository;
    }

    public function create()
    {
        return view('user.item.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $item = $this->itemRepository->store($request);
            $this->provenanceRepository->store($request, $item->id);
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            Log::error($e->getMessage());
        }

        return to_route('user.item.create');
    }

    public function show()
    {
        return view('user.item.show');
    }
}
