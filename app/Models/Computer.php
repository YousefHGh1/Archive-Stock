<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Computer extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'title', 'import_id', 'files', 'date'];

    // public function getPathAttribute($value)
    // {
    //     return Storage::url($value);
    // }

    public function import()
    {
        return $this->belongsTo(Import::class, 'import_id', 'id');
    }
}