<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    /** districts table has no created_at / updated_at columns */
    public $timestamps = false;

    protected $fillable = ['name'];

    // ── Relationships ────────────────────────────────────────────

    public function customers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
