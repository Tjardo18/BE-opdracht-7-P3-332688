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
            Leverancier: <span>{{ $naamLeverancier }}</span>
        </h3>
        <h3>
            Contactpersoon: <span>{{ $contactPersoon }}</span>
        </h3>
        <h3 style="margin-bottom: 20px">
            Mobiel: <span>{{ $mobiel }}</span>
        </h3>
        <form method="post" action="{{ route('nieuwe-leveringen.store') }}">
            @csrf
            @method('POST')

            <input type="hidden" name="leverancierId" value="{{ $leverancierId }}">
            <input type="hidden" name="productId" value="{{ $productId }}">
            <input type="hidden" name="datumLevering" value="{{ date('Y-m-d') }}">


            <label for="aantal">Aantal producteenheden</label>
            <input type="number" name="aantal" id="aantal" min="1" value="10" required><br>
            <label for="datumEerstvolgendeLevering">Datum eerstvolgende levering</label>
            <input type="date" name="datumEerstvolgendeLevering" id="datumEerstvolgendeLevering"
                value="{{ date('Y-m-d') }}" required>

            <input type="submit" value="Sla op" id="add">
        </form>

    </div>

    <script src="{{ asset('js/column.js') }}"></script>

    <script>
        var today = new Date().toISOString().split('T')[0];
        document.getElementsByName("datumEerstvolgendeLevering")[0].setAttribute('min', today);
    </script>

</body>

</html>
