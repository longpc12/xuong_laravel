<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catelogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'is_active',
    ];


    protected $casts = [

        'is_active'=>'boolean',
    ];

      // 1 catalogue có  nhiều product đi từ bảng catalogue về product
      public function products()
      {
          return $this->hasMany(Product::class);
      }
}
