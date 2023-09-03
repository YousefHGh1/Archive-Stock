<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class archiveNot extends Model
{
    use HasFactory;
    protected $table = 'archive_nots';
    protected $fillable = ['id', 'sender','type_id','title', 'reciver', 'files'];



    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'reciver');
    }

    public function allRead()
{
    // get the IDs of all notifications linked to this archive notification
    $notificationIds = DB::table('notifications')->where('data->archiveNot_id', $this->id)->pluck('id');

    // check if there are any unread notifications for any of the recipients
    $allRead = DB::table('notifications')->whereIn('id', $notificationIds)->whereNull('read_at')->count() == 0;

    return $allRead;
}

public function unreadRecipients()
{
    // get the IDs of all notifications linked to this archive notification
    $notificationIds = DB::table('notifications')->where('data->archiveNot_id', $this->id)->pluck('id');

    // get the IDs of all recipients who have unread notifications
    $unreadRecipientIds = DB::table('notifications')->whereIn('id', $notificationIds)->whereNull('read_at')->pluck('notifiable_id');

    // get the names of the recipients who have unread notifications
    $unreadRecipients = User::whereIn('id', $unreadRecipientIds)->pluck('name')->toArray();

    return $unreadRecipients;
}

}
