<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    /** invoice_items table has no created_at / updated_at columns */
    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'item_id',
        'quantity',
        'unit_price',
        // Note: line_total is a DB-generated column (quantity * unit_price)
        // — never set it manually, the database computes it automatically
    ];

    protected $casts = [
        'quantity'   => 'integer',
        'unit_price' => 'decimal:2',
        'line_total' => 'decimal:2',
    ];

    // ── Relationships ────────────────────────────────────────────

    /** Belongs to an invoice */
    public function invoice(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    /** Belongs to an item */
    public function item(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
