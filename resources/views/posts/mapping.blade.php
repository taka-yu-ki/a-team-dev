<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    <body>
        <h1>ホーム画面（マッピング画面）</h1>
        
        <div>
            <h2>仮のイベント一覧表示</h2>
            @foreach ($events as $event)
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>イベント名: <a href="/events/{{ $event->id }}">{{ $event->name }}</a></p>
                </div>
            @endforeach
        </div>
        
    </body>
</html>
