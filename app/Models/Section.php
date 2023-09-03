<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['num_section', 'name_section','sub_section_id'];

    public function DieselExports()
    {
        return $this->hasMany(DieselExport::class, 'section_id', 'id');
    }

    public function SubSections()
    {
        return $this->hasMany(SubSection::class, 'sub_section_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function Employees()
    {
        return $this->hasMany(Employee::class, 'section_id', 'id');
    }
}