<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Iscrowded;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Event $event)
    {
        $event = Event::first();
        return view('events.index', ['events' => $event]);
    }
    
    public function show($id)
    {
        $event = Event::find($id);
        return view('events.show', ['event' => $event]);
    }
    
    public function evaluation(Request $request, $id)
    {
        $event = Event::find($id);
        if($event->isFlg(Auth::user()))
        {
            $storedIscrowded = Iscrowded::where('user_id', Auth::id())->where('event_id', $event->id)->first();
            $storedIscrowded->delete();
        }
        $iscrowded = new Iscrowded();
        $iscrowded->user_id = auth()->user()->id;
        $iscrowded->event_id = $event->id;
        $iscrowded->evaluation = $request->input('evaluation');
        $iscrowded->save();
        
        session()->flash('message', '投票しました');
        
        return back();
    }

}
