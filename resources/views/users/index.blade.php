<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Patrique Ouimet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>

    <title>@yield('title', 'User CRUD Demo')</title>

    <!-- App CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Additional CSS -->
    @yield('css')
</head>
<body>

    <nav class="navbar is fixed-top has-background-light" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://github.com/patoui/user-crud-api" target="_blank">
                User CRUD Demo
            </a>
        </div>
    </nav>

    <div id="app" class="container">

        <div class="section">

            <div class="columns">
                <div class="column" style="text-align: right;">
                    <button type="button" class="button is-success"><i class="fa fa-user-plus"></i>&nbsp;New User</button>
                </div>
            </div>

            <user-table v-bind:users="{{ json_encode($users) }}"></user-table>

        </div>

    </div>

    <!-- App JS -->
    <script src="{{ mix('/js/app.js') }}"></script>

</body>

</html>
