<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //For view the chat list page.
    public function list()
    {
        return view('chat.list');
    }
    
    //For view the single chat page.

    public function single_chat(Request $req)
    {
        return view('chat.onechat');
    }
}
