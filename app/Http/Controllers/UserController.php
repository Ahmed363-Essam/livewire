<?php

namespace App\Http\Controllers;

use App\User;
use App\Model\message;

use App\User_message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        
        $messages = message::all();

        return view('front_pages.users',compact('users','messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ids = explode(',',$request->users_id);
        foreach($ids as $id)
        {
            User_message::create([
                'user_id'=>$id,
                'message'=>$request->messages_id
            ]);
        }
        return redirect()->route('userIndex');
    }

    public function getUserMessage($id)
    {
       $userMessages = User::with('messages')->find($id);



       return view('front_pages.user_message',compact('userMessages'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
