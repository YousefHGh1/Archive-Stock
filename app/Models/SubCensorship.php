<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCensorship extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number'];


    public function Censorships()
    {
        return $this->hasMany(Censorship::class, 'sub_censorship_id', 'id');
    }

    public function CensorshipExports()
    {
        return $this->hasMany(CensorshipExport::class, 'sub_censorship_id', 'id');
    }
}
