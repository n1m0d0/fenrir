<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id',
        'name',
        'description',
        'image',
        'state',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subategory::class);
    }
}
