<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        // Eager load relationships to avoid N+1 query performance issues
        $items = Item::with(['category', 'subCategory'])
            ->latest()
            ->paginate(15); // or ->get()

        return view('items.index', compact('items'));
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('deleted', 'Item deleted.');
    }
}
