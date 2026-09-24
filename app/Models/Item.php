<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'item_name',
        'category_id',
        'sub_category_id',
        'quantity',
        'unit_price',
    ];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(ItemSubCategory::class, 'sub_category_id');
    }
}
