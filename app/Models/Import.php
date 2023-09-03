<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $fillable = ['import_num', 'import_name'];

    protected $guarded = [];

    protected static function booted()
    {

        static::deleting(function ($import) {
            if (
                $import->Archives()->count() > 0 ||
                $import->legals()->count() > 0 ||
                $import->Computers()->count() > 0 ||
                $import->Censorships()->count() > 0 ||
                $import->Jibayas()->count() > 0
            ) {
                // session()->flash('warning', 'لا يمكن حذف العنصر لأنه مرتبط بجداول أخرى.');
                return false;
            }
        });
    }

    public function Archives()
    {
        return $this->hasMany(Archive::class, 'import_id', 'id');
    }

    public function legals()
    {
        return $this->hasMany(Legal::class, 'import_id', 'id');
    }
    public function Computers()
    {
        return $this->hasMany(Computer::class, 'import_id', 'id');
    }
    public function Censorships()
    {
        return $this->hasMany(Censorship::class, 'import_id', 'id');
    }
    public function Jibayas()
    {
        return $this->hasMany(Jibaya::class, 'import_id', 'id');
    }
}
