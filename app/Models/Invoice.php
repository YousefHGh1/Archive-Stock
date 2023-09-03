<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $fillable = ['voucher_no', 'voucher_date', 'invoice_no', 'supplier_item_id','currency_id'];

    public function products()
    {
        return $this->belongsToMany(Item::class)
            ->withPivot('quantity', 'price')
            ->withTimestamps();
    }

    public function invoiceproduct()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function supplier_item()
    {
        return $this->belongsTo(Supplier_item::class, 'supplier_item_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id', 'id');
    }
   
}
