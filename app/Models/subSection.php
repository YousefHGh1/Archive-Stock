<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subSection extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function DieselExports()
    {
        return $this->hasMany(DieselExport::class, 'subSection_id', 'id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'subSection_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function Employees()
    {
        return $this->hasMany(Employee::class, 'sub_section_id', 'id');
    }
}