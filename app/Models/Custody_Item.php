<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custody_Item extends Model
{
    use HasFactory;

    public $fillable = ['name'];


    public function custodyproduct()
    {
        return $this->hasMany(CustodyProduct::class, 'item_id', 'id');
    }
}
