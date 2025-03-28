<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relations
    public function variantValues()
    {
        return $this->hasMany(VariantValue::class);
    }
}
