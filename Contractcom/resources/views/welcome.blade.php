<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contractors</title>

        <!-- Fonts {{asset('resources/views/a.css')}}-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <p>
            <a href="{{asset('user/list')}}">User Manage</a>/<a href="{{asset('person/list')}}">Person Manage</a>/<a href="{{asset('company/list')}}">Company Manage</a></br>
            <a href="{{asset('project/list')}}">Project Manage</a>/<a href="{{asset('period/list')}}">Period Manage</a>/<a href="{{asset('applications/list')}}">Applications Manage</a></br>
            <a href="{{asset('positions/list')}}">Positions Manage</a>
        </p>
    </body>
</html>
