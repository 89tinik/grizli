$(function () {
    var myModalAlternative = new bootstrap.Modal('#exampleModalToggle');
    if ($.cookie('accept-cookies') != 1) {
        myModalAlternative.show();
    }
    $('#accept-cookies').on('click', function () {
        $.cookie('accept-cookies', '1', {expires: 1});
        myModalAlternative.hide();
    });

});