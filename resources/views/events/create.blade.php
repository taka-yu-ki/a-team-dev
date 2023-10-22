<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <body>
        <h1>レビュー作成画面</h1>

        <form action="/events/{{ $event->id }}" method="POST">
            @csrf
            
            <div>
                <p>user_id: 1（仮の値）</p>
                <p>event_id: {{ $event->id }}（真の値）</p>
            </div>
            
            <div>
                <h2>レビュー評価</h2>
                <div><input type=radio name="review[evaluation]" value=1>⭐️️</input></div>
                <div><input type=radio name="review[evaluation]" value=2>⭐️️⭐️</input></div>
                <div><input type=radio name="review[evaluation]" value=3>⭐️⭐️⭐️️</input></div>
                <div><input type=radio name="review[evaluation]" value=4>⭐️⭐️⭐️⭐️️</input></div>
                <div><input type=radio name="review[evaluation]" value=5>⭐️⭐️⭐️⭐️⭐️️</input></div>
            </div>
            
            <div>
                <h2>コメント</h2>
                <textarea name="review[comment]" placeholder="ハロウィン楽しめた！">{{ old('review.comment') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('review.comment') }}</p>
            </div>
            
            <div>
                <h2>画像</h2>
                <input name="review[image]" placeholder="画像をつけられます">
                <p class="body__error" style="color:red">{{ $errors->first('review.image') }}</p>
            </div>
            
            <input type="submit" value="レビューを投稿！"/>
        </form>
        
        <div><a href="/events/{{ $event->id }}">戻る</a></div>

    </body>
</html>