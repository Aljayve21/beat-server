document.addEventListener('DOMContentLoaded', function () {
    flatpickr('.flatpickr', {
        dateFormat: "Y/m/d",
        enableTime: false,
        time_24hr: false,
    });

    console.log('Flatpickr initialized');
});