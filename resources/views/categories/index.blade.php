<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
    </head>
    <body>
        <h1>ハロウィンイベントマッピング</h1>
        <p>ログインユーザ名 : {{ Auth::user()->name }}</p>
    </body>
</html>
