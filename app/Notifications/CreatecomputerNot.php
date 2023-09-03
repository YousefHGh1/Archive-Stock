<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreatecomputerNot extends Notification
{
    use Queueable;

    private $computerNot_id;
    private $computerNot_file;
    private $computerNot_description;
    private $computerNot_create;

    public function __construct($computerNot_id,$computerNot_file,$computerNot_description,$computerNot_create)
    {
        //
        $this->computerNot_id = $computerNot_id;
        $this->computerNot_file = $computerNot_file;
        $this->computerNot_description = $computerNot_description;
        $this->computerNot_create = $computerNot_create;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'computerNot_id' =>$this->computerNot_id,
            'computerNot_file' =>$this->computerNot_file,
            'computerNot_description' =>$this->computerNot_description,
            'computerNot_create' =>$this->computerNot_create
        ];
    }
}