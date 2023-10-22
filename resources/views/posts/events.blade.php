<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>イベント詳細画面</h1>
        
            <div>
                <h2>イベント名などなどの領域</h2>
                <p>{{ $event->name }}</p>
            </div>
        
            <div>
                <h2>仮レビューボタン</h2>
                <p>投稿作成画面に遷移します</p>
                <button><a href="/events/{{ $event->id }}/review">レビューする！</a></button>
            </div>
            
            <div>
                <h2>レビューを表示する領域</h2>
                @foreach ($reviews as $review)
                    <div style='border:solid 1px;  margin-bottom: 0.5rem;  padding-left: 1rem; width: 20rem'>
                        <div>
                            <p>{{ $review->evaluation }}</p>
                            <p>{{ $review->comment }}</p>
                            <p>{{ $review->image }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            
 
        <div><a href="/events/index">戻る</a></div>
    </body>
</html>
