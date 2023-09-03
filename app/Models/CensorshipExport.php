<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CensorshipExport extends Model
{
    use HasFactory;
    // 'sub_censorship_id',
    protected $fillable = ['number', 'title', 'export_id', 'files', 'date'];



    public function export()
    {
        return $this->belongsTo(Export::class, 'export_id', 'id');
    }

    public function subCensorship()
    {
        return $this->belongsTo(subCensorship::class, 'subCensorship_id', 'id');
    }
}
