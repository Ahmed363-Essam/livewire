<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Model\message;

class Messages extends Component
{
    // show table

    public  $showTable = true;

    public  $showAdd = false;

    public $title;
    public $body;

    public function render()
    {
        $messages  = message::all();
        return view('livewire.messages',compact('messages'));
    }


    public function addMessage()
    {
        $this->showTable = false;

        $this->showAdd = true;
    }

public function insertMessage()
{

    $this->validate([
        'title' => 'required',
        'body' => 'required',
    ]);


    message::create([
        'title'=>$this->title,
        'message'=>$this->body
    ]);
    session()->flash('add', 'تمت اضافة الرسالة بنجاح');
    $this->showTable = true;

}
}
