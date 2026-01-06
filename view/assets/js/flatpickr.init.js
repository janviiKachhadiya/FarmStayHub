//Flatpickr
var today = new Date();
var tomorrow = new Date();
tomorrow.setDate(today.getDate() + 1);

$("#checkin-date").flatpickr({
    defaultDate: today
});

$("#checkout-date").flatpickr({
    defaultDate: tomorrow
});
$('#confirm_btn').click(function () {
    if ($("#checkin-date").val() === "") {
        $('#alert-date').addClass('mt-20 alert alert-danger').fadeIn().html('Please select datetime!');
    } else {    
        $('#alert-date').hide();
        $('#step-1').hide();
        $('#step-2').slideDown('slow').show('slow');
    }
});