<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if(app()->getLocale() == 'ar')
        <h1>Arabic</h1>
    @else
        <h2>English</h2>
    @endif
</body>
</html>
