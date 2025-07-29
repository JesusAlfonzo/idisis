<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Area;
use App\Models\Requisitions;
use App\Models\PurchaseOrder;
use App\Models\InventoryMovement;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'position',
        'user_id',
        'area_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    /**
     * Get the user that owns the employee.
     */


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function requisitions()
    {
        return $this->hasMany(Requisition::class, 'requesting_employee_id');
    }

    public function processedRequisitions()
    {
        return $this->hasMany(Requisition::class, 'processed_by_employee_id');
    }

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class, 'employee_id');
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class, 'employee_id');
    }
}
