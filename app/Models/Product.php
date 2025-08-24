<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    // ──────── Mass Assignable Attributes ─────────
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
        'warranty_start',
        'warranty_end',
    ];

    // ──────── Casts ─────────
    protected $casts = [
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
        'warranty_start' => 'datetime',
        'warranty_end'   => 'datetime',
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

    public function getWarrantyStatusAttribute()
    {
        if (!$this->warranty_end) return 'unknown';
        return $this->warranty_end->isPast() ? 'expired' : 'active';
    }

    public function getWarrantyCountdownAttribute()
    {
        if (!$this->warranty_end) return null;

        $daysLeft = now()->diffInDays($this->warranty_end, false);

        return match(true) {
            $daysLeft > 0   => "<span class='badge bg-success'>{$daysLeft} days left</span>",
            $daysLeft === 0 => "<span class='badge bg-warning text-dark'>Expires today</span>",
            default         => "<span class='badge bg-danger'>Expired " . abs($daysLeft) . " days ago</span>"
        };
    }

}
