<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_item extends Model
{
    use HasFactory;
    public $table = 'supplier_items';

    public $primaryKey = 'id';

    public $fillable = [
        'id', 'supplier_item_num', 'supplier_item_name', 'address','phone',  'created_at', 'updated_at'
    ];
    // حتي يتم التعرف عليهم ك تاريخ وليس نص
    public $dates = ['created_at', 'updated_at'];

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'supplier_item_id', 'id');
    }
}