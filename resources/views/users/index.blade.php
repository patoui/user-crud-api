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
                    <button type="button" class="button is-success">Success</button>
                </div>
            </div>

            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th style="text-align: right;">Last Updated</th>
                        <th style="text-align: right;">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td style="text-align: right;">{{ $user->short_updated_at }}</td>
                        <td style="text-align: right;">
                            {{-- <span class="icon has-text-info">
                                <i class="fa fa-info-circle"></i>
                            </span> --}}
                            <span class="icon has-text-grey">
                                <i class="fa fa-pencil-square"></i>
                            </span>
                            {{-- <span class="icon has-text-warning">
                                <i class="fa fa-exclamation-triangle"></i>
                            </span> --}}
                            <span class="icon has-text-danger">
                                <i class="fa fa-trash"></i>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <!-- App JS -->
    <script src="{{ mix('/js/app.js') }}"></script>

</body>

</html>
