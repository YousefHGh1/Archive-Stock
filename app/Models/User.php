<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'section_id',
        'sub_section_id',
        'employee_name',
    ];


    public function custody()
    {
        return $this->hasMany(Custody::class, 'user_id', 'id');
    }

    public function invoiceExport()
    {
        return $this->hasMany(InvoiceExport::class, 'user_id', 'id');
    }

    public function archiveNot()
    {
        return $this->hasMany(archiveNot::class, 'reciver');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function subSection()
    {
        return $this->belongsTo(SubSection::class, 'sub_section_id', 'id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}