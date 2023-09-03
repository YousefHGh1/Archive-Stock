<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class computerNot extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'sender', 'reciver', 'file', 'description'];
}