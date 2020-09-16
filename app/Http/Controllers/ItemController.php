<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItem;
use App\Http\Requests\UpdateItems;
use App\Http\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private $itemService;
    /**
     * PermissionService constructor.
     * @param ItemService $itemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->itemService->getAllItems();

        return view('items', 
            [
                'items' => $items,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        $item = $this->itemService->create($request->get('name', null));

        return $item->name;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItems $request)
    {
        $selectedItems    = $request->get('selected', []);
        $notSelectedItems = $request->get('not_selected', []);

        $this->itemService->update($selectedItems, $notSelectedItems);
    }
}
