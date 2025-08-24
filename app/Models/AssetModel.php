<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_name',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
