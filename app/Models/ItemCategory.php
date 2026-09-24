<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    /** item_categories table has no created_at / updated_at columns */
    public $timestamps = false;

    protected $fillable = ['name'];

    // ── Relationships ────────────────────────────────────────────

    /** One category has many sub-categories */
    public function subCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ItemSubCategory::class, 'category_id');
    }

    /** One category has many items */
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}
