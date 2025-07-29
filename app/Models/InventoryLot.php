<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryLot extends Model
{
    use HasFactory;

    protected $casts = [
        'product_id' => 'integer',
        'warehouse_id' => 'integer',
        'quantity' => 'integer',
    ];

    protected $fillable = [
        'product_id',
        'warehouse_id',
        'quantity',
        'expiration_date',
    ];

    /**
     * Get the product associated with the inventory lot.
     */


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class, 'inventory_lot_id');
    }
}
