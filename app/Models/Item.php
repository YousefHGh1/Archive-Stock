<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;


    public $table = 'items';

    public $primaryKey = 'id';

    public $fillable = [
        'id', 'category_id', 'unit_id', 'item_num', 'item_name',
        'open_balance', 'low_limit', 'balance', 'created_at', 'updated_at'
    ];
    // حتي يتم التعرف عليهم ك تاريخ وليس نص
    public $dates = ['created_at', 'updated_at'];

    protected $guarded = [];

    protected static function booted()
    {

        static::deleting(function ($item) {
            if ($item->InvoiceProduct()->count() > 0 || $item->InvoiceExport_product()->count() > 0) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'item_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }


    public function InvoiceProduct()
    {
        return $this->hasMany(InvoiceProduct::class, 'item_id', 'id');
    }

    public function InvoiceExport_product()
    {
        return $this->hasMany(InvoiceExport_product::class, 'item_id', 'id');
    }

}