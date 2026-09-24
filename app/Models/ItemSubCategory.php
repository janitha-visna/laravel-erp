<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSubCategory extends Model
{
    use HasFactory;

    /** item_sub_categories table has no created_at / updated_at columns */
    public $timestamps = false;

    protected $fillable = ['category_id', 'name'];

    // ── Relationships ────────────────────────────────────────────

    /** Belongs to a parent category */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }

    /** Has many items under this sub-category */
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Item::class, 'sub_category_id');
    }
}
