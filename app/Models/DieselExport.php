<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieselExport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function subSection()
    {
        return $this->belongsTo(SubSection::class, 'sub_section_id', 'id');
    }


    public function typesfuel()
    {
        return $this->belongsTo(TypesFuel::class);
    }
}