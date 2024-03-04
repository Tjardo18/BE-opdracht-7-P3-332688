<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/store-avatar.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title }}</title>
</head>

<body>

<div class="logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/logo-wit.png') }}">
    </a>
</div>

<div class="card">
    <div class="title">
        <h1>
            {{ $title }}
        </h1>
    </div>
    <h3>
        Naam Leverancier: <span>{{ $naamLeverancier }}</span>
    </h3>
    <h3>
        Contactpersoon Leverancier: <span>{{ $contactPersoon }}</span>
    </h3>
    <h3>
        Leveranciernummer: <span>{{ $leverancierNummer }}</span>
    </h3>
    <h3>
        Mobiel: <span>{{ $mobiel }}</span>
    </h3>
    <table>
        <thead>
        {!! $th !!}
        </thead>
        <tbody>
        {!! $rows !!}
        </tbody>
    </table>
</div>

<script src="{{ asset('js/column.js') }}"></script>
<script src="{{ asset('js/copy.js') }}"></script>

</body>

</html>
