<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'employee_name',
        'section_id',
        'sub_section_id'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function subSection()
    {
        return $this->belongsTo(SubSection::class, 'sub_section_id', 'id');
    }

}
