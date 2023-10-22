<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Review;
use App\Models\Like;
use App\Models\iscrowded;
use App\Models\Event;



class ReviewController extends Controller
{
    //ホーム画面（マッピング画面）を表示。
    public function mapping(Event $event)
    {
        return view('posts/mapping')->with(['events' => $event->getByLimit()]);
    }
    
    //イベント詳細画面を表示。
    public function event(Event $event, Review $review)
    {
        return view('posts/events')->with(['event' => $event, "reviews" => $review->getByLimit()]);
    }
    
    //レビュー作成画面を表示。
    public function review(Event $event)
    {
        return view('posts/review')->with(['event' => $event]);
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