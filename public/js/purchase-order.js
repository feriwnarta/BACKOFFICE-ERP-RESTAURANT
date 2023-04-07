$(window).on('load', function() {
    changeInputDatePlaceHolder();
});


function changeInputDatePlaceHolder() {
    var today = new Date().toISOString().split('T')[0];
    $('#dateInput').val(today);
}