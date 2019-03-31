$(document)
    .ajaxStart(function () {
        $('.ajax_container').css('display', 'block');
    })
    .ajaxStop(function () {
        $('.ajax_container').css('display', 'none');
    });