<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Mass assignable attributes
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

    // Cast timestamps to datetime
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ──────── Relationships ─────────

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(AssetModel::class, 'model_id');
    }

    // ──────── Accessors for UI ─────────

    public function getCategoryNameAttribute()
    {
        return $this->category?->category_name ?? 'N/A';
    }

    public function getBrandNameAttribute()
    {
        return $this->brand?->brand_name ?? 'N/A';
    }

    public function getModelNameAttribute()
    {
        return $this->model?->model_name ?? 'N/A';
    }

    public function getProjectSerialAttribute()
    {
        return $this->project_serial_no ?? 'N/A';
    }
}
