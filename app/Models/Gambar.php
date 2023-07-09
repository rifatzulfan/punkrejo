<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'path'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
