<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Model\message;

use App\Model\User_Message;

use App\User;

class Users extends Component
{
    public $message_id;
    public $user_id12;

    //
    public $request;

    public function render()
    {
        $messages = message::all();
        $users = User::all();
        return view('livewire.users',compact('users','messages'));
    }

    public function addMessage()
    {
   


    }
}
