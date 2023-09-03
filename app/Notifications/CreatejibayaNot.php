<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreatejibayaNot extends Notification
{
    use Queueable;

    private $jibayaNot_id;
    private $jibayaNot_file;
    private $jibayaNot_description;
    private $jibayaNot_create;

    public function __construct($jibayaNot_id,$jibayaNot_file,$jibayaNot_description,$jibayaNot_create)
    {
        //
        $this->jibayaNot_id = $jibayaNot_id;
        $this->jibayaNot_file = $jibayaNot_file;
        $this->jibayaNot_description = $jibayaNot_description;
        $this->jibayaNot_create = $jibayaNot_create;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toArray($notifiable)
    {
        return [
            //
            'jibayaNot_id' =>$this->jibayaNot_id,
            'jibayaNot_file' =>$this->jibayaNot_file,
            'jibayaNot_description' =>$this->jibayaNot_description,
            'jibayaNot_create' =>$this->jibayaNot_create
        ];
    }
}