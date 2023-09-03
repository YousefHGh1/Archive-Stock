<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public $table = 'stores';

    public $primaryKey = 'id';

    public $fillable = [
        'id', 'store_num', 'store_name', 'address', 'created_at', 'updated_at'
    ];
    // حتي يتم التعرف عليهم ك تاريخ وليس نص
    public $dates = ['created_at', 'updated_at'];
}
