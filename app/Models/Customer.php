<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'first_name',
        'last_name',
        'contact_number',
        'district_id',
    ];

    /** Valid salutation options matching the DB enum */
    public const TITLES = ['Mr', 'Mrs', 'Miss', 'Dr'];

    // ── Relationships ────────────────────────────────────────────

    /** Belongs to a district */
    public function district(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /** Has many invoices */
    public function invoices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    // ── Accessors ────────────────────────────────────────────────

    /** Full name helper: "Miss Maneesha Thathsarani" */
    public function getFullNameAttribute(): string
    {
        return "{$this->title} {$this->first_name} {$this->last_name}";
    }
}
