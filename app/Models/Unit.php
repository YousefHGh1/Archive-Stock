<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    public $table = 'units';

    public $primaryKey = 'id';

    public $fillable = [
        'id', 'unit_num', 'unit_name', 'created_at', 'updated_at'
    ];
    // حتي يتم التعرف عليهم ك تاريخ وليس نص
    public $dates = ['created_at', 'updated_at'];


    public function Items()
    {
        return $this->hasMany(Item::class, 'unit_id', 'id');
    }

    protected $guarded = [];

    protected static function booted()
    {

        static::deleting(function ($unit) {
            if ($unit->Items()->count() > 0 ) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }
}
