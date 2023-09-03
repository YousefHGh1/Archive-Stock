<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class CreatelegalNot extends Notification
{
    use Queueable;

    private $legalNot_id;
    private $legalNot_file;
    private $legalNot_description;
    private $legalNot_create;

    public function __construct($legalNot_id,$legalNot_file,$legalNot_description,$legalNot_create)
    {
        //
        $this->legalNot_id = $legalNot_id;
        $this->legalNot_file = $legalNot_file;
        $this->legalNot_description = $legalNot_description;
        $this->legalNot_create = $legalNot_create;
    }

    public function via($notifiable)
    {
        return ['database'];
    }



    public function toArray($notifiable)
    {
        return [
            //
            'legalNot_id' =>$this->legalNot_id,
            'legalNot_file' =>$this->legalNot_file,
            'legalNot_description' =>$this->legalNot_description,
            'legalNot_create' =>$this->legalNot_create
        ];
    }
}