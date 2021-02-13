<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index( $idUser , Request $request )
    {

        
        $userLogged = $request->user();
        dd($userLogged,'ok');
        $userChannel = User::findOrFail($idUser);

        return $userLogged->messages()
                                    ->where(function($query){

                                        $query->where('id_user_received', $userLogged)
                                                                            ->where('id_user_send', $userChannel);

                                        })
                                    ->orWhere(function($query){

                                            $query->where('id_user_received' , $userChannel)
                                                                                        ->where('id_user_send',$userLogged);

                                    })
                                    ->get();
                
            


    }


    
    public function store(Request $request)
    {

        $message = Message::create([

            'id_user_send' => $request->id_user_send,
            'id_user_received' => $request->id_user_received,
            'seen' => 'no',
            'message' => $request->message



        ]);

        broadcast(new MessageSent($message));
    }
}
