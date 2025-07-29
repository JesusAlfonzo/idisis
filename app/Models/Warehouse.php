<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    /**
     * Get the products associated with the warehouse.
     */
    public function inventoryLots()
    {
        return $this->hasMany(InventoryLot::class, 'warehouse_id');
    }
}
