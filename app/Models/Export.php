<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Export extends Model
{
    use HasFactory;
    protected $fillable = ['export_num', 'export_name'];

    protected $guarded = [];

    protected static function booted()
    {

        static::deleting(function ($export) {
            if (
                $export->ArchiveExports()->count() > 0 ||
                $export->legalexports()->count() > 0 ||
                $export->ComputerExports()->count() > 0 ||
                $export->CensorshipExports()->count() > 0 ||
                $export->Jibayaexports()->count() > 0
            ) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }

    public function ArchiveExports()
    {
        return $this->hasMany(ArchiveExport::class, 'export_id', 'id');
    }

    public function legalexports()
    {
        return $this->hasMany(Legalexport::class, 'export_id', 'id');
    }
    public function ComputerExports()
    {
        return $this->hasMany(ComputerExport::class, 'export_id', 'id');
    }
    public function CensorshipExports()
    {
        return $this->hasMany(CensorshipExport::class, 'export_id', 'id');
    }
    public function Jibayaexports()
    {
        return $this->hasMany(Jibayaexport::class, 'export_id', 'id');
    }
}