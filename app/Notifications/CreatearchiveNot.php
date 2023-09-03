<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreatearchiveNot extends Notification
{
    use Queueable;

    private $archiveNot_id;
    private $archiveNot_file;
    private $archiveNot_description;
    private $archiveNot_create;

    public function __construct($archiveNot_id,$archiveNot_file,$archiveNot_description,$archiveNot_create)
    {
        //
        $this->archiveNot_id = $archiveNot_id;
        $this->archiveNot_file = $archiveNot_file;
        $this->archiveNot_description = $archiveNot_description;
        $this->archiveNot_create = $archiveNot_create;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'archiveNot_id' =>$this->archiveNot_id,
            'archiveNot_file' =>$this->archiveNot_file,
            'archiveNot_description' =>$this->archiveNot_description,
            'archiveNot_create' =>$this->archiveNot_create
        ];
    }
}
