<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
    <div class="container">

        <div>
            <a href="{{ url('/en') }}">English</a>
            <a href="{{ url('/nep') }}">नेपाली</a>
        </div>
        @if (session()->has('user_name'))
            <h2>@lang('lang.welcome') {{ session()->get('user_name') }}</h2>
        @else
            <h2>@lang('lang.welcome') Guest</h2>
        @endif
    </div>
</body>

</html>
