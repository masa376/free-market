<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン (GET /login)</h1>

    <form method="POST" action="/login">
        @csrf

        <div>
            <label>メール</label>
            <input name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">ログイン</button>
    </form>

    <a href="/">トップへ</a>
</body>
</html>
