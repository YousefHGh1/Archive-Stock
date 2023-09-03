<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreatecensorshipNot extends Notification
{
    use Queueable;

    private $censorshipNot_id;
    private $censorshipNot_file;
    private $censorshipNot_description;
    private $censorshipNot_create;

    public function __construct($censorshipNot_id,$censorshipNot_file,$censorshipNot_description,$censorshipNot_create)
    {
        //
        $this->censorshipNot_id = $censorshipNot_id;
        $this->censorshipNot_file = $censorshipNot_file;
        $this->censorshipNot_description = $censorshipNot_description;
        $this->censorshipNot_create = $censorshipNot_create;

    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'censorshipNot_id' =>$this->censorshipNot_id,
            'censorshipNot_file' =>$this->censorshipNot_file,
            'censorshipNot_description' =>$this->censorshipNot_description,
            'censorshipNot_create' =>$this->censorshipNot_create
        ];
    }
}