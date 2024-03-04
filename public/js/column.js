document.addEventListener('DOMContentLoaded', function () {
    var tableHeaders = document.querySelectorAll('th');

    tableHeaders.forEach(function (header, index) {
        header.addEventListener('mouseover', function () {
            var cells = document.querySelectorAll('td:nth-child(' + (index + 1) + ')');
            cells.forEach(function (cell) {
                cell.classList.add('highlight-column');
            });
        });

        header.addEventListener('mouseout', function () {
            var cells = document.querySelectorAll('td:nth-child(' + (index + 1) + ')');
            cells.forEach(function (cell) {
                cell.classList.remove('highlight-column');
            });
        });
    });
});