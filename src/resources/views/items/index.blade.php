<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧（ログイン前）</title>
</head>
<body>
    <!--ヘッダー-->
    <header>
        <div>
            <a href="{{ url('/') }}">COACHTECH</a>
        </div>

        <!--検索欄-->
        <form action="{{ route('items.index') }}" method="GET">
            <input type="text" name="q" value="{{ request('q') }}" />
        </form>

        <!--navボタン-->
        <nav>
            @guest
                <a href="{{ route('login') }}">ログイン</a>
            @endguest

            @auth
                <a href="{{ route('mypage.index') }}">マイページ</a>
            @endauth

            <a href="{{ route('sell.create') }}">出品</a>
        </nav>
    </header>

    <main>
        @php
            $defaultTab = auth()->check() ? 'mylist' : 'recommend';
            $tab = request('tab', $defaultTab);
        @endphp
        <section>
            <div>
                <!-- 今回は「おすすめ」を表示 -->
                <a href="{{ route('items.index', ['tab' => 'recommend', 'q' => request('q')]) }}">
                    おすすめ
                </a>
                <!-- 押してログイン誘導したいならmiddlewareに-->
                <a href="{{ route('items.index', ['tab' => 'mylist', 'q' => request('q')]) }}">
                    マイリスト
                </a>
            </div>
        </section>

        <section>
            <h2>{{ $tab === 'mylist' ? 'マイリスト' : 'おすすめ' }}</h2>

            <div>
                @forelse($items as $item)
                <article>
                    <a href="{{ route('items.show', $item->id) }}">
                        <div>
                        <!-- 画像保存パス -->
                        {{-- <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}">--}}
                        </div>

                        <p>{{ $item->name }}</p>
                </article>
                @empty
                    <p>商品はありません</p>
                @endforelse
            </div>
        </section>
    </main>
</body>
</html>