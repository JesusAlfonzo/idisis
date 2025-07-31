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
        'uses_remaining' => 'integer',
    ];

    protected $fillable = [
        'product_id',
        'warehouse_id',
        'quantity',
        'expiration_date',
        'uses_remaining',
    ];

    /**
     * Consumir un uso del lote (decrementa uses_remaining en 1 si es posible).
     * Retorna true si se consumió, false si no hay usos disponibles.
     */
    public function consumeUse(): bool
    {
        if ($this->uses_remaining > 0) {
            $this->uses_remaining--;
            $this->save();
            return true;
        }
        return false;
    }

    /**
     * Devuelve la cantidad de kits completos teóricos en este lote.
     * Solo aplica si el producto es kit.
     */
    public function kitsCompletos()
    {
        $product = $this->product;
        if ($product && $product->is_kit && $product->uses_per_kit > 0) {
            return intdiv($this->uses_remaining ?? 0, $product->uses_per_kit);
        }
        return null;
    }

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
