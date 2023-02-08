<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hai un nuovo messaggio</h1>
    <ul>
        <li>Utente: {{ $data['name'] }}</li>
        <li>Indirizzo email: {{ $data['email'] }}</li>
        <li>{{ $data['message'] }}</li>
    </ul>
</body>
</html>
