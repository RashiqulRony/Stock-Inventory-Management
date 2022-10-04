<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>POS Dash </title>
    <link href="{{ mix('assets/css/all.css') }}" rel="stylesheet">

<body class="">
<div id="app">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    <div class="wrapper">
        <router-view :key="$route.path" name="header"></router-view>
        <router-view :key="$route.fullPath" ></router-view>
    </div>

    <router-view :key="$route.path" name="footer"></router-view>
</div>

<script defer src="{{ mix('assets/js/all.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
