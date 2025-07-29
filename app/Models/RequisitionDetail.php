<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequisitionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'requisition_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
    ];
    
    public function requisition()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
