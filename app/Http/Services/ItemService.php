<?php

namespace App\Http\Services;

use App\Http\Repositories\ItemRepository;
use App\Models\Item;

class ItemService
{
    private $itemRepository;
    /**
     * ItemService constructor.
     */
    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    /**
     * @param string $itemName
     * @return Item
     */
    public function create(string $itemName): Item
    {
        return $this->itemRepository->create($itemName);
    }

    /**
     * @param  array  $selectedItems
     * @param  array  $notSelectedItems
     */
    public function update(array $selectedItems, array $notSelectedItems)
    {
        $this->itemRepository->update($selectedItems, $notSelectedItems);
    }

    public function getAllItems()
    {
        return $this->itemRepository->getAllItems();
    }
}
