<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Iscrowded;


// 仮のページに遷移する処理と混雑状況を受け取る関数が書いてある

// class EventController extends Controller
// {
//     public function index(Event $event)
//     {
//         $event = Event::first();
//         return view('events.index', ['events' => $event]);
//     }
    
//     public function show($id)
//     {
//         $event = Event::find($id);
//         return view('events.show', ['event' => $event]);
//     }
    
//     public function evaluation(Request $request, $id)
//     {
//         $event = Event::find($id);
//         $iscrowded = new Iscrowded();
//         $iscrowded->user_id = auth()->user()->id;
//         $iscrowded->event_id = $event->id;
//         $iscrowded->evaluation = $request->input('evaluation');
//         $iscrowded->save();
        
//         session()->flash('message', '投票しました');
        
//         return redirect()->route('event.show', ['event' => $event->id]);
//     }

// }