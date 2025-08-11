<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'product_name',
    'category_id',
    'brand_id',
    'model_id',
    'serial_no',
    'project_serial_no',
    'position',
    'user_description',
    'remarks',
];


public function category() {
    return $this->belongsTo(Category::class);
}

public function brand() {
    return $this->belongsTo(Brand::class);
}

public function model() {
    return $this->belongsTo(AssetModel::class, 'model_id');
}
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the category associated with the product.
     */
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->category_name : 'N/A';
    }

    /**
     * Get the brand associated with the product.
     */
    public function getBrandNameAttribute()
    {
        return $this->brand ? $this->brand->brand_name : 'N/A';
    }

    /**
     * Get the model associated with the product.
     */
    public function getModelNameAttribute()
    {
        return $this->model ? $this->model->model_name : 'N/A';
    }
}
