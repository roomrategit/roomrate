<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="public/static/css/libs.min.css" rel="stylesheet">
    <link href="public/static/css/style.min.css" rel="stylesheet">
    <title>Roomrate</title>
</head>
<body class="page">
<div class="wrapper">
    <div id="app">
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
</div>
    <script src="/public/js/app.js?t=<?php echo(microtime(true)); ?>"></script>
</body>
</html>