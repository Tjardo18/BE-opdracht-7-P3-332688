<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/store-avatar.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Jamin Overzicht</title>
</head>

<body>

<div class="logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/logo-wit.png') }}">
    </a>
</div>

<div class="title">
    <a href="/overzicht">
        <h1 style="cursor: pointer">Jamin Overzicht</h1>
    </a>
</div>
<div class="title">
    <a href="/leverancier-overzicht">
        <h1 style="cursor: pointer">Leverancier Overzicht</h1>
    </a>
</div>

<script>
    // window.location.href = '/overzicht';
</script>

</body>

</html>
