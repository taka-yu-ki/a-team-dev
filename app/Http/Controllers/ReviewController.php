<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Review;
use App\Models\Like;
use App\Models\Iscrowded;
use App\Models\Event;



class ReviewController extends Controller
{
    //ホーム画面（マッピング画面）を表示。
    public function mapping(Event $event)
    {
        return view('events/index')->with(['events' => $event->getByLimit()]);
    }
    
    //イベント詳細画面を表示。
    public function event(Event $event, Review $review,Iscrowded $iscrowded)
    {
        $event = Event::find($event->id);
        $reviews = $review->getByLimit();
        $crowdedCounts = $iscrowded->where('event_id', $event->id)
        ->selectRaw('evaluation, COUNT(*) as count')
        ->groupBy('evaluation')
        ->pluck('count', 'evaluation')
        ->toArray();
        return view('events/show')->with(['event' => $event, "reviews" => $review->getByLimit(),"crowdedCounts" => $crowdedCounts]);
    }
    
    //混雑状況の投票を取得
    public function evaluation(Request $request, $id)
    {
        $event = Event::find($id);
        $iscrowded = new iscrowded();
        $iscrowded->user_id = auth()->user()->id;
        $iscrowded->event_id = $event->id;
        $iscrowded->evaluation = $request->input('evaluation');
        $iscrowded->save();
        
        switch ($iscrowded->evaluation) {
        case 0:
            $message = '「空いてる」に投票しました';
            break;
        case 1:
            $message = '「普通」に投票しました';
            break;
        case 2:
            $message = '「混んでる」に投票しました';
            break;
        }

        session()->flash('message', $message);
        
        return redirect()->route('event',['event'=>$event->id]);
    }
    
    //レビュー作成画面を表示。
    public function review(Event $event)
    {
        return view('events/review')->with(['event' => $event]);
    }
    
    //レビューを保存。
    public function store(Request $request, Event $event, Review $review)
    {
        $input_review = $request['review'];
        $user_id = Auth::id();
        $event_id = $event->id;
        
        $input_review['user_id'] = $user_id;
        $input_review['event_id'] = $event_id;
        

        $review->fill($input_review)->save();
        return redirect('/events/' . $event->id);
    }
    
    
    
    
}