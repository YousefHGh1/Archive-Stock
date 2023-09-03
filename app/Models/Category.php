<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table = 'categories';

    public $primaryKey = 'id';

    public $fillable = ['id', 'category_num', 'category_name'];

    // حتي يتم التعرف عليهم ك تاريخ وليس نص
    public $dates = ['created_at', 'updated_at'];


    public function Items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }

    protected $guarded = [];

    protected static function booted()
    {

        static::deleting(function ($category) {
            if ($category->Items()->count() > 0) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }
}
