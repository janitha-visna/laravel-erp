<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemSubCategory;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // ── Index ────────────────────────────────────────────────────

    public function index()
    {
        $items = Item::with(['category', 'subCategory'])
            ->latest()
            ->paginate(15);

        return view('items.index', compact('items'));
    }

    // ── Create ───────────────────────────────────────────────────

    public function create()
    {
        $categories = ItemCategory::orderBy('name')->get();
        return view('items.create', compact('categories'));
    }

    // ── Store ────────────────────────────────────────────────────

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_code'       => 'required|string|max:50|unique:items,item_code',
            'item_name'       => 'required|string|min:2|max:150',
            'category_id'     => 'required|exists:item_categories,id',
            'sub_category_id' => 'required|exists:item_sub_categories,id',
            'quantity'        => 'required|integer|min:0',
            'unit_price'      => 'required|numeric|min:0.01',
        ], [
            'item_code.unique'        => 'Item code already exists.',
            'category_id.exists'      => 'Please select a valid category.',
            'sub_category_id.exists'  => 'Please select a valid sub-category.',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')
            ->with('created', 'Item created successfully.');
    }

    // ── Edit ─────────────────────────────────────────────────────

    public function edit(Item $item)
    {
        $categories = ItemCategory::orderBy('name')->get();
        return view('items.edit', compact('item', 'categories'));
    }

    // ── Update ───────────────────────────────────────────────────

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'item_code'       => 'required|string|max:50|unique:items,item_code,' . $item->id,
            'item_name'       => 'required|string|min:2|max:150',
            'category_id'     => 'required|exists:item_categories,id',
            'sub_category_id' => 'required|exists:item_sub_categories,id',
            'quantity'        => 'required|integer|min:0',
            'unit_price'      => 'required|numeric|min:0.01',
        ], [
            'item_code.unique'        => 'Item code already exists.',
            'category_id.exists'      => 'Please select a valid category.',
            'sub_category_id.exists'  => 'Please select a valid sub-category.',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')
            ->with('updated', 'Item updated successfully.');
    }

    // ── Destroy ──────────────────────────────────────────────────

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('deleted', 'Item deleted.');
    }

    // ── AJAX: Sub-categories ─────────────────────────────────────

    public function subcategories(Request $request)
    {
        $categoryId = (int) $request->query('category_id', 0);

        if (! $categoryId) {
            return response()->json([]);
        }

        $subs = ItemSubCategory::where('category_id', $categoryId)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json($subs);
    }
}
