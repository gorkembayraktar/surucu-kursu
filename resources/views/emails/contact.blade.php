<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>

    <h3>{{ $title }}</h3>
    <p>
        {{ $body }}
    </p>
    <p>
        Gönderen: {{ $mail }}
    </p>
    <p>
        Gönderilme tarih: {{ $date }}
    </p>
    <p>
        İp Adresi: {{ $ip }}
    </p>
</body>
</html>