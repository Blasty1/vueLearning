<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index( $idUser , Request $request )
    {

        global $userLogged, $userChannel;
        $userLogged = $request->user();
        $userChannel = User::findOrFail($idUser);
       
        return $userLogged->messages()
                                    ->where(function($query){
                                        global $userLogged ,$userChannel;
                                        
                                        $query->where('id_user_received',$userLogged->id)
                                                                            ->where('id_user_send', $userChannel->id);

                                        })
                                    ->orWhere(function($query){
                                         global $userLogged ,$userChannel;
                                            $query->where('id_user_received' , $userChannel->id)
                                                                                        ->where('id_user_send',$userLogged->id);

                                    })
                                    ->orderBy('created_at')
                                    ->get();
                
            


    }


    
    public function store(Request $request)
    {
        try{
            
            $message = Message::create([

                'id_user_send' => $request['id_user_send'],
                'id_user_received' => $request['id_user_received'],
                'seen' => $request['seen'],
                'message' => strip_tags($request['message'])



            ]);
            }catch(Exception $e){

                return response('Errore Messaggio non trasmesso '. $e->getMessage());

            }

        //broadcast(new MessageSent($message));
    }
}
