<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedVoucherArchive extends Model
{
    use HasFactory;

    protected $table = 'deleted_voucher_archives'; // Explicit table name

    protected $fillable = [
        'voucher_type',
        'voucher_no',
        'voucher_date',
        'invoice_no',
        'original_id',
        'original_data',
        'deleted_by',
        'delete_reason',
        'deleted_at'
    ];

    protected $casts = [
        'voucher_date' => 'date',
        'original_data' => 'array',
        'deleted_at' => 'datetime',
    ];

    // Relationship with user who deleted the record
    public function deletedByUser()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    // Scope for filtering by voucher type
    public function scopeOfType($query, $type)
    {
        return $query->where('voucher_type', $type);
    }

    // Scope for filtering by date range
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('deleted_at', [$startDate, $endDate]);
    }
}
