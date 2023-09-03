<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['num_supplier', 'name_supplier'];


    public function Diesels()
    {
        return $this->hasMany(Diesel::class, 'supplier_id', 'id');
    }
}