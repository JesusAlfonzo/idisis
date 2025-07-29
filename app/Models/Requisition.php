<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requisition extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'employee_id',
        'item',
        'quantity',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function requestingEmployee()
    {
        return $this->belongsTo(Employee::class, 'requesting_employee_id');
    }

    public function processedByEmployee()
    {
        return $this->belongsTo(Employee::class, 'processed_by_employee_id');
    }

    public function requisitionDetails()
    {
        return $this->hasMany(RequisitionDetail::class, 'requisition_id');
    }

    public function purchaseOrder()
    {
        return $this->hasOne(PurchaseOrder::class, 'requisition_id');
    }
}
