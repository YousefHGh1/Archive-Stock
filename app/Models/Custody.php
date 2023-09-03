<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custody extends Model
{
    use HasFactory;


    public $table = 'custodies';

    public $primaryKey = 'id';

    public $fillable = [
        'id', 'section_id', 'sub_section_id',  'user_id', 'custody_num', 
          'date', 'created_at', 'updated_at'
    ];
    // حتي يتم التعرف عليهم ك تاريخ وليس نص
    public $dates = ['created_at', 'updated_at', 'date'];

    public function products()
    {
        return $this->belongsToMany(Custody_Item::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function custodyproduct()
    {
        return $this->hasMany(CustodyProduct::class);
    }


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Custody_Item::class, 'item_id', 'id');
    }

    public function subSection()
    {
        return $this->belongsTo(subSection::class, 'sub_section_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


}