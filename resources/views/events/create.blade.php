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
            .block {
                margin-bottom: 3rem;
            }
            .review-btn {
                background: orange;
                margin-bottom: 1rem;
                padding: .2rem 1rem;
                color: white;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <h1>あなたのレビューを投稿しよう！</h1>

        <p>イベント: {{ $event->name }}</p>
        <form action="/events/{{ $event->id }}" method="POST">
            @csrf
            
            <div class="block">
                <h2>レビュー評価</h2>
                <div><input type=radio name="review[evaluation]" value=1>⭐️️</input></div>
                <div><input type=radio name="review[evaluation]" value=2>⭐️️⭐️</input></div>
                <div><input type=radio name="review[evaluation]" value=3>⭐️⭐️⭐️️</input></div>
                <div><input type=radio name="review[evaluation]" value=4>⭐️⭐️⭐️⭐️️</input></div>
                <div><input type=radio name="review[evaluation]" value=5>⭐️⭐️⭐️⭐️⭐️️</input></div>
            </div>
            
            <div class="block">
                <h2>コメント</h2>
                <textarea name="review[comment]" placeholder="ハロウィン楽しめた！">{{ old('review.comment') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.comment') }}</p>
            </div>
            
            <div class="block">
                <h2>画像</h2>
                <input name="review[image]" placeholder="画像をつけられます">
                <p class="body__error" style="color:red">{{ $errors->first('review.image') }}</p>
            </div>
            
            <input class="review-btn" type="submit" value="レビューを投稿！"/>
        </form>
        
        <div><a href="/events/{{ $event->id }}">イベントに戻る</a></div>

    </body>
</html>