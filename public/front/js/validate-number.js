$(document).ready(function () {
    // Handler for .ready() called.
    RegisterKeyEvents();
});

function keych(event) {

    if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 ||
            // Allow: Ctrl+A
        (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
        (event.keyCode >= 35 && event.keyCode <= 39)) {

        return;
    }
    else {
        // Ensure that it is a number and stop the keypress

        if (event.shiftKey == 1) {
            event.preventDefault();
        }

        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
            event.preventDefault();
        }
    }

}


function RegisterKeyEvents() {

    $(".number-only").keydown(function (e) {
        keych(e)
    });

    $(".currency-only").keydown(function (e) {
        keych(e)
    });
}