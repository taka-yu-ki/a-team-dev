<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <style type="text/css">
            body {
                margin: 1rem;
            }
            .review-btn {
                background: orange;
                margin-bottom: 1rem;
                padding: .2rem 1rem;
            }
                .review-btn a {
                    color: white;
                }
        </style>
    </head>
    
    <body>
        <h1>event詳細ページ</h1>
        <h2>{{$event -> name}}</h2>
        <form method="post" action="{{ route('event.evaluate', ['id' => $event->id]) }}" enctype="multipart/form-data">
            <!--アプリ保護のためのやつ-->
            @csrf
            <button type="submit" name="evaluation" value="0">空いてる</button>
            <button type="submit" name="evaluation" value="1">普通</button>
            <button type="submit" name="evaluation" value="2">混んでる</button>
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif
            
            
            <div style='margin-bottom: 2rem;'>
                <h2>みんなのイベントレビュー</h2>
                <div>
                    <p style="margin:none;">あなたもレビューしてみよう！</p>
                    <button class="review-btn"><a href="/events/{{ $event->id }}/review">レビューする！</a></button>
                </div>
                @foreach ($reviews as $review)
                    <div style='border:solid 1px;  margin-bottom: 0.5rem;  padding-left: 1rem; width: 20rem'>
                        <div>
                            <p>
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->evaluation)
                                        ⭐️
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </p>
                            <p style='overflow-wrap:break-word;'>{{ $review->comment }}</p>
                            <img  src="{{ $review->image }}" alt="画像が読み込めません" style="width: 6rem;">
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div><a href="/events/index">マップに戻る</a></div>
        </form>
    </body>
</html>


        
            
            

            
 
