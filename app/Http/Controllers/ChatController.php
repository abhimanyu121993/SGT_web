<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function list()
    {
        return view('chat.list');
    }
    public function single_chat(Request $req)
    {
        return view('chat.onechat');
    }
}
