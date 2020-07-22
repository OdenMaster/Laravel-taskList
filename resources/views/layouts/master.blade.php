<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="css/styles.css"> --}}
    <link rel="stylesheet" href={{ asset('css/styles.css') }}>
</head>
<body>
    <div>
        <h1>ここは @yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
