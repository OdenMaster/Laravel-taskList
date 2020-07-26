<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/uikit.min.js') }}"></script>
    <script src="{{ asset('js/uikit-icons.min.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/css/uikit.min.css" /> --}}
    {{-- asset でpublicをルートで参照 --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('css/uikit-rtl.css') }}">

</head>
<body>
    <div class="uk-container">
        <nav class="uk-navbar-container uk-margin" uk-navbar>
            <div class="uk-navbar-left">

                <a class="uk-navbar-item uk-logo" href="#">Logo</a>

                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href="{{ url('/', []) }}">Frontpage</a></li>
                    <li class="uk-active"><a href="{{ url('/editList', []) }}">EDIT</a></li>
                    <li class="uk-active"><a href="{{ url('/task', []) }}">THE★TASK</a></li>
                </ul>

                {{-- <div class="uk-navbar-item">
                    <div>Some <a href="#">Link</a></div>
                </div> --}}

                <div class="uk-navbar-item">
                    <form action="javascript:void(0)">
                        <input class="uk-input uk-form-width-medium" name="" placeholder="キーワードを入力">
                        <button class="uk-button uk-button-default">検索</button>
                    </form>
                </div>

                <div id="div_simple_register" class="uk-navbar-item visible-hidden">
                    <form action="task" method="post">
                        @csrf
                        <input class="uk-input uk-form-width-medium" name="task" placeholder="タスクを入力" required>
                        <button class="uk-padding-small uk-padding-remove-vertical uk-button uk-button-primary" type="submit">作成</button>
                        {{-- <button class="uk-button uk-button-default">追加</button> --}}
                    </form>
                </div>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li class="uk-active">
                        <a href="{{ url('/', []) }}">ログイン</a>
                    </li>
                </ul>
            </div>
        </nav>


        <h1> @yield('title')</h1>
        @yield('content')
    </div>
    <script src="js/main.js"></script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.5.5/dist/js/uikit-icons.min.js"></script> --}}
</body>
</html>
