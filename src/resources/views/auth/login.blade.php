<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <header class="site-header">
            <a href="/" class="logo-text">
                COACHTECH
            </a>
        </div>
    </header>

    <main class="auth-wrap">
        <section class="auth-card">
            <h2 class="auth-title">ログイン</h2>

            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <label class="auth-label" for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="auth-error">{{ $message }}</p>
                @enderror

                <label class="auth-label" for="password">パスワード</label>
                <input id="password" type="password" name="password">
                @error('password')
                    <p class="auth-error">{{ $message }}</p>
                @enderror

                <button type="submit" class="auth-submit">ログインする</button>

                <a class="auth-link" href="{{ route('register') }}">会員登録はこちら</a>
            </form>
        </section>
    </main>
</body>

</html>