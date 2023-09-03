<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Censorship extends Model
{
    use HasFactory;
    // 'sub_censorship_id',
    protected $fillable = ['number', 'title', 'import_id', 'files', 'date'];

    public function subCensorship()
    {
        return $this->belongsTo(subCensorship::class, 'subCensorship_id', 'id');
    }

    public function import()
    {
        return $this->belongsTo(Import::class, 'import_id', 'id');
    }
}
