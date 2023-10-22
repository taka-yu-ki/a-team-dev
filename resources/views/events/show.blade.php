<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>event詳細ページ</h1>
        <h2>{{$event -> name}}</h2>
        <form method="post" action="{{ route('event.evaluate', ['id' => $event->id]) }}">
            <!--アプリ保護のためのやつ-->
            @csrf
            <button type="submit" name="evaluation" value="0">空いてる</button>
            <button type="submit" name="evaluation" value="1">普通</button>
            <button type="submit" name="evaluation" value="2">混んでる</button>
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif
            
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
        </form>
    </body>
</html>


        
            
            

            
 
