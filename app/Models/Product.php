<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'brand_id' => 'integer',
        'category_id' => 'integer',
        'presentation_id' => 'integer',
        'unit_of_measure_id' => 'integer',
        'supplier_id' => 'integer',
        'price' => 'decimal:2',
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'brand_id',
        'category_id',
        'presentation_id',
        'unit_of_measure_id',
        'supplier_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function presentation()
    {
        return $this->belongsTo(Presentation::class, 'presentation_id');
    }

    public function unitOfMeasure()
    {
        return $this->belongsTo(UnitOfMeasure::class, 'unit_of_measure_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function inventoryLots()
    {
        return $this->hasMany(InventoryLot::class, 'product_id');
    }

    public function requisitionDetails()
    {
        return $this->hasMany(RequisitionDetail::class, 'product_id');
    }

    public function purchaseOrderDetails()
    {
        return $this->hasMany(PurchaseOrderDetail::class, 'product_id');
    }
}
