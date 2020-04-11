<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form role="form" action="/push_test" method="post">
        @csrf
        <input type="text" name="push_text">
        <input type="submit" value="送信">
    </form>
</body>
</html>