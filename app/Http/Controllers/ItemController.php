<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterItemsRequest;
use App\Models\Item;
use App\Models\ItemProperty;
use Illuminate\Http\Request;
use PHPUnit\Util\Filter;

class ItemController extends Controller
{
    public function index(int $paginate = 0){
        try {
            $items = Item::with(['properties', 'feedback']);
            $items = $paginate ? $items->paginate($paginate) : $items->get();
            return response()->json($items, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while fetching items',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function filter(Request $request)
    {
        $request = $request->validate([
            'type' => ['required', 'string'],
            'priceStart' => ['nullable', 'integer'],
            'priceEnd' => ['nullable', 'integer'],
            'propertyId' => ['nullable', 'integer']
        ]);
        switch ($request['type']){
            case 'price':
                return response()->json($this->filterByPrice($request['priceStart'], $request['priceEnd']));
            case 'property':
                return response()->json($this->filterByProperty($request['propertyId']));
        }
    }

    private function filterByPrice($priceStart, $priceEnd){
        return Item::whereBetween('price', [$priceStart, $priceEnd])->get();
    }

    private function filterByProperty($propertyId)
    {
        $itemsIds = ItemProperty::where('property_id', '=', $propertyId)->pluck('item_id');
        return Item::whereIn('id', $itemsIds)->get();
    }
}
