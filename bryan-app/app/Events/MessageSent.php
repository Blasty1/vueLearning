<?php

namespace App\Events;

use App\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;

    }
    public function broadcastAs()
    {
        return 'message.stored';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        
        $idSmaller = ($this->message->id_user_send > $this->message->id_user_received) ? $this->message->id_user_received : $this->message->id_user_send;
        
        //found the smaller , i get the opposite
        $idBigger = ($idSmaller == $this->message->id_user_send) ? $this->message->id_user_received : $this->message->id_user_send;
       
        return new PresenceChannel('chat.' . $idSmaller . '.' . $idBigger);
    }
}
