document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('table tbody tr');

    rows.forEach(function (row) {
        row.addEventListener('click', function (event) {
            // Controleer of gebruiker niet op icon klikt
            if (!event.target.closest('i')) {
                var isOverzichtTable = row.querySelector('td:nth-child(5) a i') !== null;
                var isLeverancierTable = row.querySelector('td:nth-child(4)') !== null;

                if (isOverzichtTable) {
                    // Handle Overzicht table
                    var barcode = row.querySelector('td:nth-child(1)').innerText;
                    var naam = row.querySelector('td:nth-child(2)').innerText;
                    var verpakkingseenheid = row.querySelector('td:nth-child(3)').innerText;
                    var aantalAanwezig = row.querySelector('td:nth-child(4)').innerText;

                    var dataToCopy = `Barcode: ${barcode}\nNaam: ${naam}\nVerpakkingseenheid: ${verpakkingseenheid}\nAantal Aanwezig: ${aantalAanwezig}`;
                } else if (isLeverancierTable) {
                    // Handle Leverancier table
                    var naamProduct = row.querySelector('td:nth-child(1)').innerText;
                    var DatumLL = row.querySelector('td:nth-child(2)').innerText;
                    var aantal = row.querySelector('td:nth-child(3)').innerText;
                    var evLevering = row.querySelector('td:nth-child(4)').innerText;

                    var dataToCopy = `Naam Product: ${naamProduct}\nDatum Laatste Levering: ${DatumLL}\nAantal: ${aantal}\nEerstvolgende Levering: ${evLevering}`;
                } else {
                    // Handle Allergie table
                    var naam = row.querySelector('td:nth-child(1)').innerText;
                    var omschrijving = row.querySelector('td:nth-child(2)').innerText;

                    var dataToCopy = `Naam: ${naam}\nOmschrijving: ${omschrijving}`;
                }

                // Maak een tijdelijk textarea om het kopiëren naar het klembord makkelijker te maken
                var textarea = document.createElement('textarea');
                textarea.value = dataToCopy;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);

                alert('Gegevens gekopieerd naar klembord:\n\n' + dataToCopy);
            }
        });
    });
});
