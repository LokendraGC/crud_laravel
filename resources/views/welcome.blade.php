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
        @if (session()->has('user_name'))
            <h2>Welocme to Laravel {{session()->get('user_name')}}</h2>
            @else
            <h2>Welcome to Laravel Guest</h2>
            @endif
    </div>
</body>
</html>