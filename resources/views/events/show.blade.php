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
        </form>
    </body>
</html>