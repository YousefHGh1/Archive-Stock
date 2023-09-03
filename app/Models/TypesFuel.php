<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesFuel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Diesels()
    {
        return $this->hasMany(Diesel::class);
    }

    public function DieselExports()
    {
        return $this->hasMany(DieselExport::class);
    }
}