<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>How To Install Vue 3 in Laravel 9 with Vite</title>

    @vite('resources/sass/app.scss')
</head>

<body class="antialiased">
    <div id="app">
        <v-app>
            <app />
        </v-app>
    </div>

    @vite('resources/js/app.js')
</body>

</html>