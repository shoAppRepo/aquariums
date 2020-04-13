<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>水族館図鑑</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" type="text/css">
        <!--Vue追加-->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <!--google font追加-->
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c|Permanent+Marker&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cute+Font|Permanent+Marker&display=swap" rel="stylesheet">
        
    </head>

    </style>

    <body>
        
        @include('commons.navbar')
        @yield('content')

        
    <footer>
        &copy; 2020 水族館図鑑
    </footer>
        
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <!--カルーセル-->
        <script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
        <script src="{{ secure_asset('js/main.js') }}"></script>
    </body>
</html>