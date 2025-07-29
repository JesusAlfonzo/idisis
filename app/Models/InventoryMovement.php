<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_lot_id',
        'employee_id',
        'type',
        'quantity',
        'description',
    ];
    
    public function inventoryLot()
    {
        return $this->belongsTo(InventoryLot::class, 'inventory_lot_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
