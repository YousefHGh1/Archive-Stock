<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jibaya extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'title', 'import_id', 'files', 'date'];

    public function import()
    {
        return $this->belongsTo(Import::class, 'import_id', 'id');
    }
}