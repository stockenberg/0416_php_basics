/**
 * Created by workstation on 16.03.17.
 */


$(document).ready(function() {
    $('select').material_select();

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        labelMonthNext: 'Nexter Monat',
        labelMonthPrev: 'Vorheriger Monat',
        labelMonthSelect: 'Monat wählen',
        labelYearSelect: 'Jahr wählen',
        monthsFull: [ 'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember' ],
        monthsShort: [ 'Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez' ],
        weekdaysFull: [ 'Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag' ],
        weekdaysShort: [ 'So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa' ],
        weekdaysLetter: [ 'S', 'M', 'D', 'M', 'D', 'F', 'S' ],
        today: 'Heute',
        clear: 'Löschen',
        close: 'CLOSE',
        format: 'd.m.yyyy',
        firstDay: 1
    });

    $(".collection-item i.show").click(function () {
        $(this).parent().parent().next().slideToggle(500);
    });

    $(".dropdown-button").dropdown();

    $(".delete").click(function (e) {
        var confirm = window.confirm("Wollen sie das wirklich löschen ? ");
        if(!confirm){
            e.preventDefault();
        }
    });

    $(".toggleFiles").click(function (e){
        e.preventDefault();
        $(".files").slideToggle();
    });

});



