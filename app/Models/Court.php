<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    use HasFactory;
    protected $fillable = ['idno_summoner', 'summoner','idno_defendant', 'defendant', 'address', 'jibaya_id','amount'];

}