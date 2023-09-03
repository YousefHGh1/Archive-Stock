<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveExport extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'title', 'export_id', 'files', 'date'];

    public function export()
    {
        return $this->belongsTo(Export::class, 'export_id', 'id');
    }
}