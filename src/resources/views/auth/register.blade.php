<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/') }}">

</head>
<body>
    <header class="header">
        <div class="header_inner">
            <div class="header___logoText">COACHTECH</div>
        </div>
    </header>

    <main class="main">
        <section class="content">
            <h2 class="content_title">会員登録</h2>

            <form class="form" method="POST" action="/register">
                @csrf
                <div class="form_group">
                    <label class="form_label" for="name">ユーザー名</label>
                    <input class="form_input"
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    >
                    @error('name')
                        <p class="form_error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form_group">
                    <label class="form_label" for="email">メールアドレス</label>
                    <input class="form_input" id="email" type="email" name="email" value="{{ old('email') }}"
                    >
                    @error('name')
                    <p class="form_error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form_group">
                    <label class="form_label" for="password">パスワード</label>
                    <input class="form_input" id="password" type="password" name="password" value="{{ old('password') }}"
                    >
                    @error('name')
                    <p class="form_error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form_group">
                    <label class="form_label" for="password_confirmation">確認用パスワード</label>
                    <input class="form_input" id="password_confirmation" type="password" name="password_confirmation"
                    >
                    @error('name')
                    <p class="form_error">{{ $message }}</p>
                    @enderror
                </div>

                <button class="form_submit" type="submit">登録する</button>
            </form>
            <a class="loginLink" href="/login">ログインはこちら</a>
        </section>
    </main>
</body>
</html>