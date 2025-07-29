<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitOfMeasure extends Model
{
    protected $table = 'unit_of_measure';
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    /**
     * Get the products associated with the unit of measure.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'unit_of_measure_id');
    }
}
