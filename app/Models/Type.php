<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'number'];

    protected $guarded = [];

    protected static function booted()
    {

        static::deleting(function ($type) {
            if (
                $type->ArchiveNots()->count() > 0 ||
                $type->legalNots()->count() > 0 ||
                $type->ComputerNots()->count() > 0 ||
                $type->CensorshipNots()->count() > 0 ||
                $type->JibayaNots()->count() > 0
            ) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }

    public function ArchiveNots()
    {
        return $this->hasMany(archiveNot::class, 'type_id', 'id');
    }
}
