<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    what is this
    <ul>
        @foreach ($company as $comp)
        <li>
            {{$comp->email}}
        </li>
        @endforeach


    </ul>
</body>
</html>
