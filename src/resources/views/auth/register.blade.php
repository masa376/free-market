<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                COACHTECH
            </a>
        </div>
    </header>

    <main>
        <div class="registration__content">
            <div class="registration__heading">
                <h2>会員登録</h2>
            </div>
            <form class="form">
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label-item">ユーザー名</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form_input-text">
                            <input type="text" name="name">
                        </div>
                        <div class="form_error">
                            <!--バリデーション機能-->
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form_input-text">
                            <input type="email" name="email">
                        </div>
                        <div class="form_error">
                            <!--バリデーション機能-->
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">パスワード</span>
                    </div>
                    <div class="form__group-content">
                        <div class="from_input-text">
                            <input type="password" name="password">
                        </div>
                        <div class="form_error">
                            <!--バリデーション機能-->
                        </div>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <div class="form__group-title">
                            <span class="form__label--item">確認用パスワード</span>
                        </div>
                        <div class="form_input-text">
                            <input type="password" name="password_confirmation">
                        </div>
                        <div class="form_error">
                            <!--バリデーション機能-->
                        </div>
                    </div>
                </div>
                <div class="form_button">
                    <button class="form_button-submit" type="submit">登録する</button>
                    <button class="form_button-submit" type="submit">ログインはこちら</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>