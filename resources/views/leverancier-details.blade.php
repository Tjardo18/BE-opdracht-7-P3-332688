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
    <form method="post" action="{{ route('leverancier-details.store') }}">
        @csrf
        @method('POST')

        <input type="hidden" name="leverancierId" value="{{ $LId }}">
        <input type="hidden" name="contactId" value="{{ $CId }}">

        <label for="naam">Naam</label>
        <input type="text" name="naam" id="naam"
               value="{{ $naam }}" required>
        <label for="contactPersoon">Contactpersoon</label>
        <input type="text" name="contactPersoon" id="contactPersoon"
               value="{{ $contactPersoon }}" required>
        <label for="leverancierNummer">Leveranciernummer</label>
        <input type="text" name="leverancierNummer" id="leverancierNummer"
               value="{{ $leverancierNummer }}" required>
        <label for="mobiel">Mobiel</label>
        <input type="text" name="mobiel" id="mobiel"
               value="{{ $mobiel }}" required>
        <label for="straatnaam">Straatnaam</label>
        <input type="text" name="straatnaam" id="straatnaam"
               value="{{ $straatnaam }}" required>
        <label for="huisnummer">Huisnummer</label>
        <input type="text" name="huisnummer" id="huisnummer"
               value="{{ $huisnummer }}" required>
        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode"
               value="{{ $postcode }}" required>
        <label for="stad">Stad</label>
        <input type="text" name="stad" id="stad"
               value="{{ $stad }}" required>

        <div class="snel">
            <a class="button" href="/leverancier-overzicht">Terug</a>
            <input type="submit" value="Wijzig">
        </div>
    </form>

</div>

<script src="{{ asset('js/column.js') }}"></script>

</body>

</html>
