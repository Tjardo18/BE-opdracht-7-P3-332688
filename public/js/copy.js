document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('table tbody tr');
    var body = document.body;

    // Create modal elements
    var modal = document.createElement('div');
    modal.id = 'copyModal';
    modal.className = 'modal';

    var title = document.createElement('div');
    title.className = 'title';
    title.innerHTML = '<h1>Gegevens Gekopieerd</h1>';

    var main = document.createElement('div');
    main.className = 'main';

    var buttonDiv = document.createElement('div');
    buttonDiv.className = 'button';
    var closeButton = document.createElement('button');
    closeButton.id = 'closeModalBtn';
    closeButton.textContent = 'COPY';
    buttonDiv.appendChild(closeButton);

    // Append elements to modal
    modal.appendChild(title);
    modal.appendChild(main);
    modal.appendChild(buttonDiv);

    // Append modal to body
    body.appendChild(modal);

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

                    var dataForModal = `<p>Barcode: <span>${barcode}</span></p><p>Naam: <span>${naam}</span></p><p>Verpakkingseenheid: <span>${verpakkingseenheid}</span></p><p>Aantal Aanwezig: <span>${aantalAanwezig}</span></p>`;
                    var dataToCopy = `Barcode: ${barcode}\nNaam: ${naam}\nVerpakkingseenheid: ${verpakkingseenheid}\nAantal Aanwezig: ${aantalAanwezig}`;

                } else if (isLeverancierTable) {
                    // Handle Leverancier table
                    var naamProduct = row.querySelector('td:nth-child(1)').innerText;
                    var DatumLL = row.querySelector('td:nth-child(2)').innerText;
                    var aantal = row.querySelector('td:nth-child(3)').innerText;
                    var evLevering = row.querySelector('td:nth-child(4)').innerText;

                    var dataForModal = `<p>Naam Product: <span>${naamProduct}</span></p><p>Datum Laatste Levering: <span>${DatumLL}</span></p><p>Aantal: <span>${aantal}</span></p><p>Eerstvolgende Levering: <span>${evLevering}</span></p>`;
                    var dataToCopy = `Naam Product: ${naamProduct}\nDatum Laatste Levering: ${DatumLL}\nAantal: ${aantal}\nEerstvolgende Levering: ${evLevering}`;
                } else {
                    // Handle Allergie table
                    var naam = row.querySelector('td:nth-child(1)').innerText;
                    var omschrijving = row.querySelector('td:nth-child(2)').innerText;

                    var dataForModal = `<p>Naam: <span>${naam}</span></p><p>Omschrijving: <span>${omschrijving}</span></p>`;
                    var dataToCopy = `Naam: ${naam}\nOmschrijving: ${omschrijving}`;
                }

                var textarea = document.createElement('textarea');
                textarea.value = dataToCopy;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);

                // Modal vullen met data
                main.innerHTML = dataForModal;

                // Modal laten zien
                modal.style.display = 'flex';
            }
        });
    });

    var closeModalBtn = document.getElementById('closeModalBtn');

    // Modal sluiten als gebruiker op de button klikt
    closeModalBtn.onclick = function () {
        modal.style.display = 'none';
    }

    // Modal sluiten als gebruiker buiten het modal klikt
    window.addEventListener('mousedown', function (event) {
        if (!modal.contains(event.target)) {
            modal.style.display = 'none';
        }
    });
});
