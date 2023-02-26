<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="{{ asset('public/static/css/libs.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('public/static/css/style.min.css') }}" rel="stylesheet">
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&apikey=9133eb49-3a97-4b2d-90be-6b80a97a5036" type="text/javascript"></script>
    <title>Roomrate</title>
</head>
<body class="page">

    <div id="app">
    <div class="wrapper">
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
</div>
    <script src="/public/js/app.js?t=<?php echo(microtime(true)); ?>"></script>
</body>
</html>