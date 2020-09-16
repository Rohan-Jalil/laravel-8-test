<?php

namespace App\Http\Repositories;

use App\Models\Item;

class ItemRepository
{
    /**
     * @param string $itemName
     * @return Item
     */
    public function create(string $itemName): Item
    {
        return Item::create(
            [
                'name' => $itemName,
            ]
        );
    }

    /**
     * @param  array  $selectedItems
     * @param  array  $notSelectedItems
     */
    public function update(array $selectedItems, array $notSelectedItems)
    {
        Item::whereIn('name', $selectedItems)->update(
            [
                'is_selected' => 1,
            ]
        );
        
        Item::whereIn('name', $notSelectedItems)->update(
            [
                'is_selected' => 0,
            ]
        );
    }

    public function getAllItems()
    {
        return Item::all();
    }
}