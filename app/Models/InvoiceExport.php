<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceExport extends Model
{
    use HasFactory;

    public $fillable = ['voucher_no', 'voucher_date', 'invoice_no', 'subSection_id','user_id'];

    public function products()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function InvoiceExport_product()
    {
        return $this->hasMany(InvoiceExport_product::class);
    }

    public function subSection()
    {
        return $this->belongsTo(subSection::class, 'subSection_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    

}