<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /** invoices table only has created_at, no updated_at */
    const UPDATED_AT = null;

    protected $fillable = [
        'invoice_number',
        'customer_id',
        'invoice_date',
        'total_amount',
    ];

    protected $casts = [
        'invoice_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    // ── Relationships ────────────────────────────────────────────

    /** Belongs to a customer */
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    /** Has many line items */
    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
