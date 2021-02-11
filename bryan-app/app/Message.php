<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [

        'id_user_send' , 'id_user_received' , 'seen'

    ];


    public function sender(){

        return $this->belongsTo(Message::class,'id_user_send');

    }

    public function receiver(){

        return $this->belongsTo(Message::class,'id_user_received');

    }
}
