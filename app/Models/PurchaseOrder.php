<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $casts = [
        'supplier_id' => 'integer',
        'employee_id' => 'integer',
        'requisition_id' => 'integer',
        'total_amount' => 'decimal:2',
    ];

    protected $fillable = [
        'supplier_id',
        'employee_id',
        'requisition_id',
        'status',
        'total_amount',
        'order_date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function requisition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }

    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class, 'purchase_order_id');
    }
}
